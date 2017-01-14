<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Session;
use Hash;
use Mail;
use Event;
use Reminder;
use Sentinel;
use App\Events\Backend\ResetPasswordEvent;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Activation;
use App\Http\Requests\Frontend\ProfileRequest;
use App\Http\Requests\Frontend\PictureRequest;
use App\Http\Requests\Frontend\FollowRequest;
use App\Http\Requests\Frontend\ChangePasswordRequest;
use DB;
use App\Models\User;
use App\Models\Generation;
use App\Models\LogActivity;
use App\Models\AutoresponseEmail;
use App\Models\UserStatusAccountLog;
use App\Models\UserPlanIdLog;
use Validator;
use Image;
use File;
use App\Helpers\Base64;

class UsersController extends Controller
{

    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
    * update user.
    * paths url    : user/{id}/update
    * methode      : POST
    * @param            $username           Username User
    * @param            $bio                Bio User
    * @param            $country_id         Country id User
    * @param            $province_id        Province id User
    * @param            $city_id            City id User
    * @param            $web                Link web user
    * @return Response
    */
    public function updateProfile(ProfileRequest $req, $id)
    {
        $param = $req->all();

        $updateData = $this->model->UpdateProfileUser($param,$id);
        if(!empty($updateData)) {

            $data['user_id'] = $id;
            $data['description'] = 'Update profile '.$id;
            $insertLog = new LogActivity();
            $insertLog->insertLogActivity($data);

            return response()->json([
                'code' => 200,
                'status' => 'success',
                'message' => $updateData->username.' '.trans('general.update_success'),
                'data' => $updateData
            ],200);

        } else {

            return response()->json([
                'code' => 400,
                'status' => 'error',
                'message' => trans('general.update_error')
            ],400);

        }

    }

    public function updatePicture(PictureRequest $req,$id)
    {
        $param = $req->all();
        try {

            $user = $this->model->find($id);
            if($user->id == $this->currentUser->id){
                $pathDest = public_path().'/uploads/users/'.$user->id.'/'.$param['type'];
                File::makeDirectory($pathDest, $mode=0777,true,true);

                //decode image base64
                $decodeImage = Base64::decodeImage($param['base64']);
                $image = $decodeImage['image'];
                $ext = $decodeImage['ext'];

                $filename = $param['type'].time().$user->id.$ext;
                $path = $pathDest.$filename;
                $img = Image::make($image);
                $img->save($pathDest.'/'.$filename);

                if($param['type'] == 'cover') {

                    $data['description'] = 'Update image cover '.$id;

                    if (!empty($user->cover_image)) {
                        $oldImage = $user->cover_image;
                        File::delete($pathDest.'/'.$oldImage);
                    }
                    $user->cover_image = $filename;
                } else {

                    $data['description'] = 'Update image profile '.$id;

                    if (!empty($user->avatar)) {
                        $oldImage = $user->avatar;
                        File::delete($pathDest.'/'.$oldImage);
                    }
                    $user->avatar = $filename;
                }

                $data['user_id'] = $id;
                $insertLog = new LogActivity();
                $insertLog->insertLogActivity($data);

                $user->save();

                return response()->json([
                    'code' => 200,
                    'status' => 'success',
                    'message' => $user->username.' '.trans('general.update_success'),
                    'data' => $user
                ],200);
            } else {

                return response()->json([
                    'code' => 400,
                    'status' => 'error',
                    'message' => trans('general.access_forbiden')
                ],400);

            }

        } catch (\Exception $e) {
            return response()->json([
                'code' => 400,
                'status' => 'error',
                'message' => trans('general.update_error').', '.$e->getMessage()
            ],400);
        }

    }

    /**
    * follow user.
    * paths url    : user/follow
    * methode      : POST
    * @param            $type           Type follow or unfollow
    * @param            $id             User id
    * @return Response
    */
    public function postFollow(FollowRequest $req)
    {
        $param = $req->all();
        $user_id = $param['id'];
        $type = $param['type'];
        $user_id_follower = $this->currentUser->id;
        $follow = $this->model->followUser($user_id,$user_id_follower,$type);

        if(!empty($follow)) {

            $data['user_id'] = $user_id_follower;
            $data['description'] = ucwords($type).' user id '.$user_id;
            $insertLog = new LogActivity();
            $insertLog->insertLogActivity($data);

            return response()->json([
                    'code' => 200,
                    'status' => 'success',
                    'data' => $follow->countFollower($follow)
                ],200);

        } else {
            return response()->json([
                'code' => 400,
                'status' => 'error',
                'message' => trans('general.following_failed')
            ],400);
        }

    }

    /**
    * list-follow user.
    * paths url    : user/follow/list
    * methode      : POST
    * @param            $type           Type following or follower
    * @param            $id             User id
    * @return Response
    */
    public function listFollow(Request $req)
    {
        $param = $req->all();
        $user_id = $param['user_id'];
        $type = $param['type'];
        $page = $param['page'];
        $limit = 6;
        $user = $this->model->find($user_id);
        if(count($user) > 0) {

            $listFollowing = $this->model->getListFollowing($user,$page,$type,$this->currentUser,$limit);

            return response()->json([
                'code' => 200,
                'status' => 'success',
                'data' => $listFollowing
            ],200);

        } else {
            return response()->json([
                'code' => 400,
                'status' => 'error',
                'data' => array(),
                'message' => trans('general.data_not_found')
            ],400);
        }


    }

    // /**
    // * Change password user.
    // * paths url    : user/change-password
    // * methode      : POST
    // * @param      string      $password                 New password user
    // * @param      string      $password_confirmation    New password confirmation user
    // * @return Response
    // */
    // public function changePassword(ChangePasswordRequest $req)
    // {
    //     $param = $req->all();
    //     $id = $this->currentUser->id;
    //     $updatePassword = $this->model->UpdatePasswordByID($id,$param['password']);
    //     if($updatePassword) {

    //         return response()->json([
    //             'code' => 200,
    //             'status' => 'success',
    //             'message' => trans('general.change_password_success'),
    //             'data' => $updatePassword
    //         ],200);

    //     } else {
    //         return response()->json([
    //             'code' => 400,
    //             'status' => 'error',
    //             'data' => array(),
    //             'message' => trans('general.change_password_error')
    //         ],400);
    //     }
    // }
    public function resetPassword() 
    {
        $menu = DB::table('home_menus')
                ->select('id','display_name','href','new_tab')
                ->orderBy('index','asc')
                ->get();

        return view('frontend.partials.reset_password')->with('menus', $menu);
    }


    public function processResetPassword(Request $request) 
    {
        $valid = array(
          'email' => 'required|email'
        );

        $data = $request->all();
        $validate = Validator::make($data, $valid);
        $find_data = User::where('email','=', $request->email)->first();
        if($validate->fails()) {

          return redirect('reset-password')
          ->withErrors($validate)
          ->withInput();

        }elseif(empty($find_data)) {

          Session::flash('error', 'Email not found ' . $request->email);
          return redirect('reset-password')
            ->withErrors($validate)
            ->withInput();

        }else{

            $find_data->forgot_token = str_random(10);
            $find_data->save();
            Mail::send('emails.instructionresetpassword', $find_data->toArray(), function($message) use($find_data) {
                $message->from("noreply@scoido.com", 'No-Reply');
                $message->to($find_data->email, $find_data->first_name)->subject('Reset Password Instruction to Scoido');
            });
            Session::flash('notice', 'Check your email, the reset password instruction has sent to '.$find_data->email);
            return redirect(route('admin-login-member'));

        }
    }


    public function changePassword($forgot_token) 
    {
        $menu = DB::table('home_menus')
                ->select('id','display_name','href','new_tab')
                ->orderBy('index','asc')
                ->get();

        $find_user = User::where('forgot_token','=', $forgot_token)->first();
        if(empty($find_user)) {

          Session::flash('error', 'Token not valid');
            return redirect(route('reset-password'));

        } else {
          Session::flash('notice', 'Token valid Lets Change Your Password');

          return view('frontend.partials.change_password')
            ->with( 'forgot_token', $find_user->forgot_token)->with('menus', $menu);

        }
    }


    public function processChangePassword(Request $request, $forgot_token) 
    {
        $valid = array(
        'password' => ('required|min: 8|confirmed')
        );

        $data = $request->all();
        $find_data = Sentinel::findRoleBySlug('member')->users()->where('forgot_token','=', $forgot_token)->first();
        $validate = Validator::make($data, $valid);

        if($validate->fails()) {

          return redirect('change-password/'.$find_data->forgot_token)
            ->withErrors($validate);

        } else {

          $find_data->password = Hash::make($request->password);
          $find_data->forgot_token = null;
          $find_data->save();
          Session::flash('notice', 'Password has change, lets login');
          return redirect()->route('admin-login-member');

        }
    }

    public function postSignUp(Request $request, $id = 0)
    {   
        $plan_id = plan_id('code','ghost');
        $param = $request->all();
        $rules = array(
            'first_name'   => 'required',
            'email'   => 'required|email|unique:users,email',
            'password'   => 'required|min: 8',
            'phone'   => 'required|numeric|digits_between:6,13',            
            'g-recaptcha-response' => 'required|recaptcha',
            'gender'   => 'required',
            'date_of_birth'   => 'required',
        );
        $validate = Validator::make($param,$rules);
        if($validate->fails()) {
            if($request->ajax == TRUE){
                $this->validate($request,$rules);
                    // echo '<div class="alert alert-danger">';
                    // foreach ($validate->messages()->all() as $message) {
                    //     echo '<span class="text-danger">'.$message.'</span><br>';
                    // }
                    // echo '</div>';

            }else{
                return back()->withErrors($validate->messages())->withInput();;
            }
        } else {
                do{
                    $member_id = mt_rand(10000000, 99999999);
                } while (Sentinel::findRoleBySlug('member')->users()->where('member_id', '=', $member_id)->count() == 1);
                $upline_id = $request->upline_id;

                // Saving to database users

                 $user = Sentinel::register([
                    'email' => $request->email,
                    'password' => $request->password,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'phone' => $request->phone,
                    'is_admin' => true,
                ]);
                
                Sentinel::findRoleBySlug('member')->users()->attach($user);

                $users = User::find($user->id);
                $users->member_id = $member_id;
                $users->status_account = 'active';
                $users->plan_status = 'active';
                $users->gender = $request->gender;
                $users->date_of_birth = $request->date_of_birth;
                $users->plan_id = $plan_id;
                $users->is_completed = 0;
                $users->save();

                // Saving to database generations ...
                
                $userstatusaccountlogs = new UserStatusAccountLog;
                $userstatusaccountlogs->user_id = $user->id;
                $userstatusaccountlogs->status_account = 'active';
                $userstatusaccountlogs->save();

                $userplanidlogs = new UserPlanIdLog;
                $userplanidlogs->user_id = $user->id;
                $userplanidlogs->plan_id = $plan_id;
                $userplanidlogs->save();

                $generations = new Generation;
                $generations->user_id = $user->id;
                $generations->upline_id = $upline_id;
                $generations->save();

                $user_data =  Sentinel::findRoleBySlug('member')->users()->where('id','=',$user->id)->first();
                $activation = Activation::create($user);
                $find_data = $user_data->toArray();
                $find_data['code'] = $activation->code;
                Mail::send('emails.instructionactivation', $find_data, function($message) use($find_data) {
                    $message->from("noreply@scoido.com", 'No-Reply');
                    $message->to($find_data['email'], $find_data['first_name'])->subject('Activation Instruction to Scoido');
                });

                flash()->success('Registration Success, check your email for activate your account');
            if($request->ajax == TRUE){
                echo 'success_sign_up';
            }else{                
                return redirect()->route('admin-login-member');
            }
        }
    }

    public function processActivation(Request $request, $register_token) 
    {
        $user_id = Activation::where('code','=',$register_token)->first()->user_id;
        $user = Sentinel::findById($user_id);
        $email = $user->email;
        $first_name = $user->first_name;
        if (Activation::complete($user, $register_token))
        {
            // Activation was successfull
                    $user = User::find($user_id);
                    $user->plan_status = 'active';
                    $user->save();
                    AutoresponseEmail::get_first_email($first_name,$email,'register');
                    Session::flash('notice', 'User Has Activated, Lets Login');
                    return redirect()->route('admin-login-member');
        }
        else
        {
            // Activation not found or not completed.
                  Session::flash('notice', 'Sorry, Token Wrong Or User Already Active');
                  return redirect()->route('admin-login-member');
        }
    }

}
