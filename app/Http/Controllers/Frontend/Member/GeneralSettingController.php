<?php

namespace App\Http\Controllers\Frontend\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sentinel;
use App\Models\User;
use Input;
use Image;
use Validator;
use DB;
use Carbon\Carbon;
use App\Models\MailSmtp;
use Mail;
use Config;

class GeneralSettingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('sentinel_access:dashboard');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index_smtp()
    {      
        $mail_smtp = MailSmtp::where('user_id',user_info('id'));        
        if($mail_smtp->count() > 0){
            $mail_smtp = $mail_smtp->get()->first();
            $mail_smtp_id = $mail_smtp->id;
            $mail_smtp_sender_name = $mail_smtp->sender_name;
            $mail_smtp_driver = $mail_smtp->driver;
            $mail_smtp_host = $mail_smtp->host;
            $mail_smtp_port = $mail_smtp->port;
            $mail_smtp_username = $mail_smtp->username;
            $mail_smtp_password = $mail_smtp->password;
            $mail_smtp_status = $mail_smtp->status;
            $mail_smtp_domain = $mail_smtp->domain;
            $mail_smtp_key = $mail_smtp->key;
            $mail_smtp_secret = $mail_smtp->secret;
        }else{
            $mail_smtp_id = '';
            $mail_smtp_sender_name = 'No Reply';
            $mail_smtp_driver = 'smtp';
            $mail_smtp_host = 'smtp.gmail.com';
            $mail_smtp_port = '587';
            $mail_smtp_username = '';
            $mail_smtp_password = '';
            $mail_smtp_status = '';
            $mail_smtp_domain = '';
            $mail_smtp_key = '';
            $mail_smtp_secret = '';
        }
        $data = array(
            'mail_smtp_id' => $mail_smtp_id,
            'sender_name' => $mail_smtp_sender_name,
            'driver' => $mail_smtp_driver,
            'host' => $mail_smtp_host,
            'port'   => $mail_smtp_port,
            'username'   => $mail_smtp_username,
            'password'   => $mail_smtp_password,
            'status'   => $mail_smtp_status,
            'domain'   => $mail_smtp_domain,
            'key'   => $mail_smtp_key,
            'secret'   => $mail_smtp_secret,
        );
        
        return view('frontend.member.general_setting.smtp.index')->with($data);
        
    }
    public function DatatablesSmtp(Request $request){
        return datatables(MailSmtp::where('user_id','=',user_info('id'))->get())
                ->addColumn('action', function ($mail_smtp) {
                    $action_edit = "javascript:show_form_edit('".$mail_smtp->id."')";
                    $action_delete = "javascript:show_form_delete('".$mail_smtp->id."')";
                    return '<a onclick="'.$action_edit.'" class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-pencil-square-o fa-fw"></i></a>&nbsp;<a onclick="'.$action_delete.'" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash-o fa-fw"></i></a>';
                })
                ->make(true);
    }
    public function post_smtp(Request $request)
    {
        $response = array();
        if($request->action == 'get-data'){
            $mail_smtp = MailSmtp::find($request->id);
            $response['sender_name'] = $mail_smtp->sender_name;
            $response['host'] = $mail_smtp->host;
            $response['port'] = $mail_smtp->port;
            $response['username'] = $mail_smtp->username;
            $response['password'] = $mail_smtp->password;
            $response['status'] = $mail_smtp->status;
            $response['driver'] = $mail_smtp->driver;            
            $response['key'] = $mail_smtp->key;
            $response['secret'] = $mail_smtp->secret;
            $response['domain'] = $mail_smtp->domain;
        }else if($request->action != 'delete'){
            if($request->mail_smtp_id == ''){
                $mail_smtp = new MailSmtp;
            }else{
                $mail_smtp = MailSmtp::find($request->mail_smtp_id);
            }
            $mail_smtp->user_id = user_info('id');
            $mail_smtp->sender_name = $request->sender_name;
            $mail_smtp->driver = $request->driver;
            $mail_smtp->host = $request->host;
            $mail_smtp->port = $request->port;
            $mail_smtp->username = $request->username;
            $mail_smtp->password = $request->password;
            $mail_smtp->status = $request->status;  
            $mail_smtp->domain = $request->domain;
            $mail_smtp->key = $request->key;
            $mail_smtp->secret = $request->secret;  
            $AutoresponseEmail['title'] = 'Notification From SMTP Configuration Success';
            $AutoresponseEmail['content'] = 'Congratulations, Your SMTP Configuration Success';
            $AutoresponseEmail['email'] = user_info('email');
            $AutoresponseEmail['first_name'] = user_info('first_name'); 
            Config::set('mail.driver', $request->driver);
            Config::set('mail.host', $request->host);
            Config::set('mail.port', $request->port);
            Config::set('mail.username', $request->username);
            Config::set('mail.password', $request->password);
            if($request->driver == 'mandrill'){
                Config::set('services.mandrill.secret', $request->secret);
            }else if($request->driver == 'mailgun'){
                Config::set('services.mailgun.domain', $request->domain);
                Config::set('services.mailgun.secret', $request->secret);
            }else if($request->driver == 'ses'){
                Config::set('services.ses.key', $request->key);
                Config::set('services.ses.secret', $request->secret);
            }else if($request->driver == 'sparkpost'){
                Config::set('services.sparkpost.secret', $request->secret);                
            }
            Mail::send(['html' => 'emails.content_from_autoresponse_email'], $AutoresponseEmail, function($message) use($AutoresponseEmail) {
                $message->from("noreply@scoido.com", 'No-Reply');
                $message->to($AutoresponseEmail['email'], $AutoresponseEmail['first_name'])->subject($AutoresponseEmail['title']);
            });
            if (Mail::failures()) {
                    // return response showing failed emails  
                    $response['status_email'] = 'failed';
            }else{
                $response['status_email'] = 'success';
            }      
            if($request->status == 'on'){
                MailSmtp::where('user_id','=',user_info('id'))->update(['status' => 'off']);                
            }
            $mail_smtp->save();
            $response['mail_smtp_id'] = $mail_smtp->id;
            $response['sender_name'] = $request->sender_name;
            $response['driver'] = $request->driver;
            $response['host'] = $request->host;
            $response['port'] = $request->port;
            $response['username'] = $request->username;
            $response['password'] = $request->password;
            $response['smtp_status'] = $request->status;
            $response['notification'] = 'Saving Data Success';
            $response['status'] = 'success';
        }else{
            $mail_smtp = MailSmtp::find($request->mail_smtp_id);
            if ($mail_smtp->delete()) {
                        $response['notification'] = 'Delete Data Success';
                        $response['status'] = 'success';
            } else {
                        $response['notification'] = 'Delete Data Failed';
                        $response['status'] = 'failed';
            }
        }
        echo json_encode($response);
    }
}
