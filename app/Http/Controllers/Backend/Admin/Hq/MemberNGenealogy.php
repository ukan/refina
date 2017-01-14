<?php

namespace App\Http\Controllers\Backend\Admin\Hq;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Backend\Admin\BaseController;
use App\Models\User;
use App\Models\Role;
use App\Models\Generation;
use App\Models\BackendHqMemberNGenealogy;
use Image;
use Input;
use Validator;
use Sentinel;
use Carbon\Carbon;
use Mail;
use Excel;
use Session;
use stdClass;
use DB;

class MemberNGenealogy extends BaseController
{
    /**
     * {@inheritDoc}
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list_member_index(Request $request)
    {
        $var_view = array(
            'ceo' => '',
        );

        return view('backend.admin.hq.member-and-genealogy.list_member')->with($var_view);
    }
    public function datatables_list_member(Request $request)
    {   
        if(empty($request->filter_start) or $request->filter_start == "Y-m-d"){
            $eloq = User::selectRaw("users.id,users.plan_id,CONCAT(first_name,' ', last_name) As name,member_id,email,gender,phone,users.reason_banned,status_account,users.created_at, plans.name As plan_name, users.banned_by")
                ->distinct()
                ->leftJoin('transactions','transactions.user_id','=','users.id')
                ->leftJoin('plans','plans.id','=','users.plan_id')
                ->whereHas( 'roles', function( $role ) {
                    $role->whereSlug( 'member' );
                })->get();
        }else{
            $eloq = User::selectRaw("users.id,users.plan_id,CONCAT(first_name,' ', last_name) As name,member_id,email,gender,phone,city_or_district,status_account,users.created_at, plans.name As plan_name")
                ->distinct()
                ->leftJoin('transactions','transactions.user_id','=','users.id')
                ->leftJoin('plans','plans.id','=','users.plan_id')
                ->whereBetween('users.created_at', array($request->filter_start.' 00:00:00', $request->filter_end.' 23:59:59'))
                ->whereHas( 'roles', function( $role ) {
                    $role->whereSlug( 'member' );
                })->get();
        }     

            return datatables($eloq)        
                ->addColumn('upline_id', function ($user) {
                    $eloq = Generation::where('user_id',$user->id);
                    if($eloq->count() > 0) {
                        return User::getUser($eloq->get()->first()->upline_id,'member_id');
                    }else{
                        return '';
                    }
                })
                ->addColumn('upline_name', function ($user) {
                    $eloq = Generation::where('user_id',$user->id);
                    if($eloq->count() > 0) {
                        return User::getUser($eloq->get()->first()->upline_id,'first_name').' '.User::getUser($eloq->get()->first()->upline_id,'last_name');
                    }else{
                        return '';
                    }
                })  
                ->addColumn('mover_id', function ($user) {
                    $eloq = Generation::where('user_id',$user->id);
                    if($eloq->count() > 0) {
                        return User::getUser($eloq->get()->first()->mover_id,'member_id');
                    }else{
                        return '';
                    }
                })  
                ->addColumn('action', function ($user) {
                    $statusBanned = "";
                    $statusActive = "";
                    
                        $action_active = "javascript:execute_active('".$user->id."')";
                        $action_banned = "javascript:execute_banned('".$user->id."')";
                        $action_reset = "javascript:execute_reset('".$user->id."')";

                        return $user->status_account == 'active' ? 
                        '<a onclick="javascript:show_user('.quotes.$user->id.quotes.')" class="btn btn-primary btn-xs" title="Show User"><i class="fa fa-eye fa-fw"></i></a>
                        <a href="'.$action_banned.'" class="btn btn-danger btn-xs" id="banned" name="banned" title="Banned"><i class="fa fa-ban fa-fw"></i></a>
                        <br><a href="'.$action_reset.'" class="btn btn-warning btn-xs" id="resetPass" name="resetPass" title="Reset Password"><i class="fa fa-key fa-fw"></i></a>' : 
                        '<a onclick="javascript:show_user('.quotes.$user->id.quotes.')" class="btn btn-primary btn-xs" title="Show User"><i class="fa fa-eye fa-fw"></i></a>
                        <a href="'.$action_active.'" class="btn btn-success btn-xs" id="activeMember" name="activeMember" title="Active"><i class="fa fa-check-circle fa-fw"></i></a>
                        <br><a href="'.$action_reset.'" class="btn btn-warning btn-xs" id="resetPass" name="resetPass" title="Reset Password"><i class="fa fa-key fa-fw"></i></a>
                        ';
                })
                // ->filter(function ($query) use ($request) {
                //     if ($request->has('name')) {
                //         $query->where('name', 'like', "%{$request->get('name')}%");
                //     }

                //     if ($request->has('email')) {
                //         $query->where('email', 'like', "%{$request->get('email')}%");
                //     }
                // })
                ->make(true);
    }

    public function get_data_member(Request $req){
        
        $response = array();
        $userData = User::find($req->id);   

        $response['id'] = $userData->id;
        $response['email'] = $userData->email;
        $response['status'] = 'success';
        echo json_encode($response);   
    }

    public function post_list_member(Request $request)
    {
        $response = array();
        $action = $request->action;        
        $user_id = $request->user_id;
        if($action == "show_user"){
        }

    }
    public function forgot_password_request_index(Request $request)
    {
        $var_view = array(
            'ceo' => '',
        );
        return view('backend.admin.hq.member-and-genealogy.forgot_password_request')->with($var_view);
    }
    public function datatables_forgot_password_request(Request $request)
    {        
    }
    public function post_forgot_password_request(Request $request)
    {
    }
    public function genealogy_index(Request $request)
    {
        $ceo = Sentinel::findRoleBySlug('member')->users()->orderBy('created_at','asc')->first()->id;
        $var_view = array(
            'ceo' => $ceo,
        );

        return view('backend.admin.hq.member-and-genealogy.genealogy')->with($var_view);
    }
    public function datatables_genealogy($code,Request $request)
    {        
        $eloq = User::selectRaw("id,plan_id,CONCAT(first_name,' ', last_name) As name,member_id")->whereHas( 'roles', function( $role ) {
           $role->whereSlug( 'member' );
        } );
        if($code == 'list_member'){
            return datatables($eloq->get())       
                ->addColumn('action', function ($user) {
                    return '<a onclick="javascript:show_genealogy('.quotes.$user->id.quotes.')" class="btn btn-warning btn-xs" title="Show Genealogy"><i class="fa fa-eye fa-fw"></i></a>';
                })
                ->make(true);
        }else if($code == 'active_member'){
            $eloq = $eloq->where('status_account','=','active');            
            return datatables($eloq->get())       
                ->addColumn('action', function ($user) {
                    return '<a onclick="javascript:show_form_spillover('.quotes.$user->id.quotes.')" class="btn btn-primary btn-xs" title="Show Genealogy">Spillover</a>';
                })
                ->make(true);
        }else if($code == 'non_active'){
            $eloq = $eloq->where('status_account','!=','active');            
            return datatables($eloq->get())       
                ->make(true);
        }
    }

    public function post_member(Request $req){
        $response = array();
    
        if($req->method == 'active'){
            $userData = User::find($req->id);                    
            
            $userData->status_account = "active";
            $userData->reason_banned = "";
            $userData->banned_by = "";
            $userData->save();
                
            $response['notification'] = "Success Active User";
            $response['status'] = "success";
        
        }else if($req->method == 'banned'){            
            $response = array();

            $param = $req->all();
            $rules = array(
                'reason'   => 'required',
            );
            $validate = Validator::make($param,$rules);
            if($validate->fails()) {
                $this->validate($req,$rules);
            }else{
                User::ActionStatus($req->id,'banned');
                $userData = User::find($req->id);                    
                $userData->status_account = "banned";
                $userData->reason_banned = $req->reason;
                $userData->banned_by = user_info('first_name').' '.user_info('last_name');
                $userData->save();
                    
                $response['notification'] = "Success Banned User";
                $response['status'] = "success";
            }
        }else{

            $find_data = User::where('email','=', $req->email)->first();
            $find_data->forgot_token = str_random(10);
            $find_data->save();
            Mail::send('emails.instructionresetpassword', $find_data->toArray(), function($message) use($find_data) {
                $message->from("noreply@scoido.com", 'No-Reply');
                $message->to($find_data->email, $find_data->first_name)->subject('Reset Password Instruction to Scoido');
            });
            
            $response['notification'] = "Success Sent Instruction Reset password";
            $response['status'] = "success";
        }

        echo json_encode($response);
    }

    public function post_genealogy(Request $request)
    {
        $response = array();
        $action = $request->action;        
        $user_id = $request->user_id;
        if($action == "show_genealogy"){
            $content_genealogy = BackendHqMemberNGenealogy::ShowGenealogy($request);
            $response['scoido_id'] = User::getUser($request->id,'member_id');
            $response['name'] = User::getUser($request->id,'name');
            $response['content_genealogy'] = $content_genealogy;
            echo json_encode($response);
        }else if($action == "getOptionRecord"){
            $getOptionRecord = '';
            $data_squad = User::selectRaw("id,plan_id,CONCAT(first_name,' ', last_name) As name,member_id")->whereHas( 'roles', function( $role ) {
           $role->whereSlug( 'member' );
        } )->where('status_account','=','active')->where('id','!=',$request->id)->get();
            foreach($data_squad as $row){            
                $getOptionRecord .= '<option value="'.$row['id'].'">'.$row['member_id'].' - '.$row['name'].'('.User::getUser($row['id'],'plan').')</option>';
            }
            $response['getOptionRecord'] = $getOptionRecord;
            echo json_encode($response);
        }else if($action == "get-data-form-spillover"){
            $response['scoido_id'] = User::getUser($request->id,'member_id');
            $response['name'] = User::getUser($request->id,'name');
            $response['generation_id'] = Generation::where('user_id',$request->id)->get()->first()->id;
            echo json_encode($response);
        }else if($action == "move-action"){            
            $param = $request->all();
            $rules = array(
                'to_user_id'   => 'required',
            );
            $validate = Validator::make($param,$rules);
            if($validate->fails()) {
                    $this->validate($request,$rules);
            } else {
                $generation = Generation::find($request->generation_id);
                $generation->upline_id = $request->to_user_id;
                $generation->mover_id = user_info('id');
                $generation->save();
                $response['notification'] = 'Success Move Upline ID';
                $response['status'] = 'success';
            }
            echo json_encode($response);
        }
    }
}
