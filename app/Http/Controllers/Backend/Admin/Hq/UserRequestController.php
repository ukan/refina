<?php

namespace App\Http\Controllers\Backend\Admin\Hq;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Backend\Admin\BaseController;
use App\Models\UserRequest;
use App\Models\User;
use Input;
use Validator;
use Carbon\Carbon;
class UserRequestController extends BaseController
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
    public function index(Request $req)
    {
            $plans = Plan::all();
            return view('backend.admin.hq.requests.index')->with('plans',$plans);
    }

   
    public function datatables(Request $request)
    {

        if(empty($request->filter_start) or $request->filter_start == "Y-m-d"){
            $eloq = UserRequest::all();
        }else{
            $eloq = UserRequest::whereBetween('created_at', array($request->filter_start.' 00:00:00', $request->filter_end.' 23:59:59'))->get();
        }
         return datatables($eloq)       
                ->addColumn('user', function ($user_request) {
                        $user = "ID : ".User::getUser($user_request->user_id,'member_id')."<br>";
                        $user .= "Name : ".User::getUser($user_request->user_id,'name')."<br>";
                        $user .= "Email : ".User::getUser($user_request->user_id,'email')."<br>";
                        $user .= "Phone : ".User::getUser($user_request->user_id,'phone')."<br>";
                        return $user;  
                })    
                ->editColumn('code', function ($user_request) {
                        if($user_request->code == 'close_account'){
                            $result = 'Account Closure';
                        }else{
                            $result = '';
                        }
                        return $result;  
                })  
                ->addColumn('date', function ($user_request) {
                    return 'Created : '.Carbon::createFromFormat('Y-m-d H:i:s', $user_request->created_at)->format('M d, Y').'<br>Updated : '.Carbon::createFromFormat('Y-m-d H:i:s', $user_request->updated_at)->format('M d, Y');  
                })  
                
                ->addColumn('action', function ($user_request) {
                        //show_form_approval_request
                        if($user_request->status == 'pending'){
                            $btn_confirm = '<a onclick="javascript:show_form_approval_request('.quotes.$user_request->id.quotes.')" title="Confirmation" class="cursor-pointer btn btn-success btn-xs"> <i class="fa fa-check"></i></a>';
                        }else{
                            $btn_confirm = '<a title="Confirmation" class="cursor-pointer btn btn-success btn-xs" disabled> <i class="fa fa-check"></i></a>';   
                        }
                        return $btn_confirm;  
                })  
                ->make(true);
    }
    public function post(Request $request){
        $response = array();
        $action = $request->action;
        $user_request = UserRequest::find($request->id);
        if($action == "get-data"){        
            $response['id'] = $user_request->id;
            $response['code'] = $user_request->code;           
        }else if($action == "approval_request"){
            if($request->code == "close_account"){
                $user_id = $user_request->user_id;
                User::ActionStatus($user_id,'account_closure');                
            }
            $response['notification'] = 'Request Has Been Approved';
            $response['status'] = 'success';
        }
        echo json_encode($response);
    }
}
