<?php

namespace App\Http\Controllers\Frontend\Member;

use App\Http\Controllers\Controller;
use App\Models\Funnel;
use App\Models\BulletinBoard;
use App\Models\FrontendMemberDashboard;
use App\Models\VisitorStatistic;
use App\Models\FunnelOrder;
use App\Models\CoinTransaction;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Sentinel;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('sentinel_access:dashboard');
        unset($_COOKIE['upline_id']);   
        unset($_COOKIE['MemberAuth']);          
        setcookie('upline_id', '');
        setcookie('upline_id', base64_encode(user_info('id')));
        setcookie('MemberAuth', true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($filter="year")
    {  
        try {
            $visitorReport = FrontendMemberDashboard::visitorReport($filter); 
            $funnelReport = FrontendMemberDashboard::funnelReport($filter); 
            $todayOrders = FrontendMemberDashboard::TodayOrders();
            $todayVisitors = FrontendMemberDashboard::TodayVisitors();
            $commission = User::getUser(user_info('id'),'commission');
            $funnel_limit_percent = 100 - get_funnel_status('funnel_limit_percent');
            $page_limit_percent = 100 - get_funnel_status('page_limit_percent');
            $subscriber_limit_percent = 100 - get_funnel_status('subscriber_limit_percent');
            $visitor_limit_percent = 100 - get_funnel_status('visitor_limit_percent');
            $email_limit_percent = 100 - get_funnel_status('email_limit_percent');

            $avg_commission = CoinTransaction::selectRaw('AVG(coin) as coin')
                                                ->where('user_id',user_info('id'))
                                                ->where('code', 'withdrawal_coin_monthly')
                                                ->get()->first()->coin;
            // dd($avg_commission);


            return view('frontend.member.dashboard.dashboard',
                ['filter' => $filter,                
                'commission' => $avg_commission,
                'visitorReport' => $visitorReport,
                'funnelReport' => $funnelReport,
                'todayOrders' => $todayOrders,
                'todayVisitors' => $todayVisitors,
                'funnel_limit_percent' => $funnel_limit_percent,
                'page_limit_percent' => $page_limit_percent,
                'subscriber_limit_percent' => $subscriber_limit_percent,
                'email_limit_percent' => $email_limit_percent,
                ]);   
        } catch (\Exception $e) {
            echo $e;
        }
    }

   public function ajax_pagination_bulletin_board(Request $request)
    {   

        $bulletin_boards = BulletinBoard::where([
                            ['publish_status','=','on'],
                            ['plan_id', '=', 0]
                        ])->orWhere([
                            ['publish_status','=','on'],
                            ['plan_id', '=', user_info('plan_id')]
                        ])->orderBy('created_at', 'desc')->paginate(3);
        return view('frontend.member.dashboard.ajax_page_bulletin_boards')->with('bulletin_boards', $bulletin_boards);
          
    }

   public function datatables_orders(Request $request)
    {   

         return datatables(FunnelOrder::whereHas('Funnel.User',function($user){$user->whereId(user_info('id'));})->orderBy('funnel_orders.id', 'asc')->get())
                ->addColumn('action', function ($funnel_orders) {
                    $quotes = "'";
                    return '<center><a onclick="window.location.href='.$quotes.route('member-funnel-steps',[$funnel_orders->funnel_id,'order_list',$funnel_orders->id]).$quotes.'" class="btn btn-primary btn-xs" title="Direct To Funnel"> <i class="fa fa-arrow-right"></i></a></center>';
                })
                ->addColumn('funnel_name', function ($funnel_orders) {
                    $quotes = "'";
                    return Funnel::find($funnel_orders->funnel_id)->title;  
                })
                ->editColumn('image_proof_of_payment', function ($funnel_orders) {                    
                     if ($funnel_orders->image_proof_of_payment != ""){
                    $quotes = "'";
                    return '<center><img src="'.asset('storage/'.$funnel_orders->image_proof_of_payment).'" class="cursor-pointer img-responsive" width="50px" onclick="javascript:show_image('.$quotes.asset('storage/'.$funnel_orders->image_proof_of_payment).$quotes.')"></center>';  
                    }
                })
                ->editColumn('created_at', function ($funnel_orders) {    
                    return Carbon::createFromFormat('Y-m-d H:i:s', $funnel_orders->created_at)->format('M d, Y');  
                })
                ->addColumn('due_date', function ($funnel_orders) {    
                    return Carbon::createFromFormat('Y-m-d H:i:s', $funnel_orders->created_at)->addDays(2)->format('M d, Y');  
                })
                ->editColumn('status', function ($funnel_orders) {    
                    return FunnelOrder::get_data($funnel_orders->id,'transaction_status');  
                })
                ->addColumn('status_details', function ($funnel_orders) {    
                    $transaction = CoinTransaction::where('order_id',$funnel_orders->id);
                    if($transaction->count() > 0){
                        if($funnel_orders->status_shipping == ""){
                            if($transaction->get()->first()->status == 'success'){
                                $sta = 'accepted';
                            }else{
                                $sta = 'rejected';
                            }
                            $status_transaction = $transaction->get()->first()->status.' ('.$sta.')';                            
                        }else{
                            $status_transaction = $transaction->get()->first()->status;                            
                            
                        }
                    }else{
                        $status_transaction = 'failed';
                    }
                    return 'Payment : '.FunnelOrder::get_data($funnel_orders->id,'transaction_status','only_status').'<br>Shipping : '.ucwords(str_replace('_',' ',$funnel_orders->status_shipping)).'<br>Transaction : '.ucwords(str_replace('_',' ',$status_transaction));  
                })
                ->addColumn('payment_status', function ($funnel_orders) {    
                    return FunnelOrder::get_data($funnel_orders->id,'transaction_status','only_status');  
                })
                ->addColumn('shipping_status', function ($funnel_orders) {    
                    return ucwords(str_replace('_',' ',$funnel_orders->status_shipping));  
                })
                ->addColumn('transaction_status', function ($funnel_orders) {    
                    $transaction = CoinTransaction::where('order_id',$funnel_orders->id);
                    if($transaction->count() > 0){
                        if($funnel_orders->status_shipping == ""){
                            if($transaction->get()->first()->status == 'success'){
                                $sta = 'accepted';
                            }else{
                                $sta = 'rejected';
                            }
                            $status_transaction = $transaction->get()->first()->status.' ('.$sta.')';                            
                        }else{
                            $status_transaction = $transaction->get()->first()->status;                            
                            
                        }
                    }else{
                        $status_transaction = 'failed';
                    }
                    return ucwords(str_replace('_',' ',$status_transaction));  
                })
                ->addColumn('admin_fee', function ($funnel_orders) {    
                    return idr_format($funnel_orders->admin_fee);  
                })
                ->addColumn('date_details', function ($funnel_orders) { 
                    if($funnel_orders->status_shipping == 'already_sent'){
                        $due_date = Carbon::createFromFormat('Y-m-d H:i:s', $funnel_orders->already_sent_date)->addDays(10)->format('M d, Y');
                    }else{
                        $due_date = Carbon::createFromFormat('Y-m-d H:i:s', $funnel_orders->created_at)->addDays(2)->format('M d, Y');
                        
                    }
                    return 'Created : '.Carbon::createFromFormat('Y-m-d H:i:s', $funnel_orders->created_at)->format('M d, Y').'<br>Due : '.$due_date;  
                })
                ->editColumn('funnel_id', function ($funnel_orders) {                    
                    return idr_format(FunnelOrder::get_data($funnel_orders->id,'grandtotal'));
                })
         
                ->make(true);
          
    }
}
