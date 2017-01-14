<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Cookie\CookieJar;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Activation;
use App\Models\User;
use App\Models\SocialMedia;
use App\Models\VisitorStatistics;
use App\Models\Option;
use App\Models\Funnel;
use App\Models\FunnelOrder;
use App\Models\CoinOrder;
use App\Models\FunnelOrderDetail;
use App\Models\AutoresponseEmail;
use App\Models\AutoresponseCache;
use App\Models\Contact;
use App\Models\Generation;
use App\Models\Plan;
use App\Models\Landing;
use App\Models\Commission;
use App\Models\FrontendMemberDashboard;
use App\Models\CoinTransaction;
use App\Models\UserPlanIdLog;
use App\Models\UserStatusAccountLog;
use App\Models\VeritransTransaction;
use App\Models\ManageLcw;
use App\Models\HomeMenu;
use App\Models\Ticket;
use App\Models\UserNotification;


use Redirect;
use View;
use Cookie;
use Sentinel;
use Mail;
use Session;
use GuzzleHttp\Client;
use App\Veritrans\Veritrans;
use Carbon\Carbon;
use Input;
use Validator;
use Image;
use DB;
use URL;

class HomeController extends Controller
{
    public $mailchimp;

    public $listId = '138d3c9174';

    public function index()
    {   
        
        $form = [
            'url' => route('post-sign-up'),
            'class' => 'form-horizontal form-bordered jquery-form-sign-up',
            'autocomplete' => 'off',
            'files' => true,
        ];

        return view('frontend.partials.home', compact('form'));

        // return view('frontend.partials.home', compact('form'))->with('datas', $datas)->with('upline_id',$upline_id);
    }
    public function destroy_cookie(){
        unset($_COOKIE['upline_id']);
        setcookie('upline_id', '');
        echo base64_decode('null');
    }
    public function sign_in(){

        if(!empty($_COOKIE['MemberAuth'])){
        //dd($_COOKIE);
            unset($_COOKIE['upline_id']);   
            unset($_COOKIE['MemberAuth']);          
            setcookie('upline_id', '');
            $upline_id = generate_cookies_upline_id();
        }else{
            $upline_id = generate_cookies_upline_id();
        }
            $form = [
                'url' => route('admin-login'),
                'autocomplete' => 'off',
            ];

            $menu = DB::table('home_menus')
                ->select('id','display_name','href','new_tab')
                ->orderBy('index','asc')
                ->get();

            return view('frontend.partials.sign_in', compact('form'))->with('upline_id',$upline_id)->with('menus',$menu);
    }
    public function sign_up(){
        if(user_info('id') != null){
            return redirect()->route('admin-dashboard-member');
        }else{
        $upline_id = generate_cookies_upline_id();
        $form = [
            'url' => route('post-sign-up'),
            'id' => 'myForm',
            'autocomplete' => 'off',
        ];

        $menu = DB::table('home_menus')
                ->select('id','display_name','href','new_tab')
                ->orderBy('index','asc')
                ->get();
                
        return view('frontend.partials.sign_up', compact('form'))->with('upline_id',$upline_id)->with('menus',$menu);
        }
    }
    public function subscribe(){
        $upline_id = generate_cookies_upline_id();
        return view('frontend.partials.subscribe')->with('upline_id',$upline_id);
    }
    public function about(){
        $upline_id = generate_cookies_upline_id();
        return view('frontend.partials.about')->with('upline_id',$upline_id);
    }
    public function payment_confirmation_form($funnel_id="",$order_id=""){
        $funnel_id = base64_decode($funnel_id);
        $order_id = base64_decode($order_id);
        if(FunnelOrder::where('id',$order_id)->count() > 0 or CoinOrder::where('id',$order_id)->count() > 0){     
        
            $menu = DB::table('home_menus')
                ->select('id','display_name','href','new_tab')
                ->orderBy('index','asc')
                ->get();       
            return view('frontend.partials.payment_confirmation_form')->with('funnel_id',$funnel_id)->with('order_id',$order_id)->with('menus',$menu);
        }else{
            return view('errors.404');
        }
    }
    public function payment_confirmation_form_action(Request $request){
        $order_id = $request->order_id;
        $param = $request->all();
        $response = array();
        $rules = array(
            'file_image'   => 'required|image|mimes:jpeg,jpg,png',
        );
        $validate = Validator::make($param,$rules);
        if($validate->fails()) {
                $this->validate($request,$rules);
        } else {
                if(FunnelOrder::where('id',$order_id)->count() > 0){
                    $order = FunnelOrder::find($request->order_id);
                    $code_order = 'funnel_order';
                    $name_order = 'Funnel Order';
                }else if(CoinOrder::where('id',$order_id)->count() > 0){
                    $order = CoinOrder::find($request->order_id);                    
                    $code_order = 'coin_order';
                    $name_order = 'Coin Order';
                }
                $user_id = $order->user_id;
                if( $request->hasFile('file_image') ){
                    if($order->image_proof_of_payment != ""){  
                    $image_path = public_path().'/storage/'.$order->image_proof_of_payment;
                    unlink($image_path);
                    }
                    createdirYmd('storage');
                    $file = Input::file('file_image');      
                    $name = str_random(20). '-' .$file->getClientOriginalName();            
                                        
                    $file->move(public_path().'/storage/'.date("Y")."/".date("m")."/".date("d")."/",$name);
                    $order->image_proof_of_payment = date("Y")."/".date("m")."/".date("d")."/".$name; 
                    
                }else{                            
                    $order->image_proof_of_payment = $order->image_proof_of_payment;                        
                }
                $order->save();
                $response['status'] = 'success';

                UserNotification::CreateNotification("string",$order_id,'',$code_order.'_confirmation_success','showmodal', $name_order.", Invoice Code : ".$order_id, "Immediately Doing Approval BY Invoice Code : ".$order_id, "","finance-admin");                
                echo json_encode($response);
        }
    }
    public function tester()
    {

    }
    public function tester2(Request $request)
    {
        echo public_path();
    }

}
;





