<?php

namespace App\Http\Controllers\Backend\Admin\Hq;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Backend\Admin\BaseController;
use App\Models\AuthLog;
use App\Models\CoinTransaction;
use App\Models\Coin;
use App\Models\Plan;
use App\Models\FunnelOrder;
use App\Models\Quota;
use Carbon\Carbon;


class HistoryLogsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        return view('backend.admin.hq.member-and-genealogy.log_history');
    }

    public function datatablesLogin(Request $request){
        if(empty($request->filter_start) or $request->filter_start == "Y-m-d"){
            $eloq = AuthLog::selectRaw('users.email, auth_logs.ip_address, auth_logs.login, auth_logs.logout,auth_logs.created_at')
                 ->leftJoin('users','users.id','=','auth_logs.user_id')
                 ->orderBy('auth_logs.id')->get();
        }else{
            $eloq = AuthLog::selectRaw('users.email, auth_logs.ip_address, auth_logs.login, auth_logs.logout,auth_logs.created_at')
                 ->leftJoin('users','users.id','=','auth_logs.user_id')
                 ->whereBetween('auth_logs.created_at', array($request->filter_start.' 00:00:00', $request->filter_end.' 23:59:59'))
                 ->orderBy('auth_logs.id')->get();
        }

        return datatables($eloq)->make(true);
    }

    public function datatablesTransaction(Request $request)
    {
        if(empty($request->filter_start) or $request->filter_start == "Y-m-d"){
            $eloq = CoinTransaction::where('user_id','>','0')->get();
        }else{
            $eloq = CoinTransaction::where('user_id','>','0')->whereBetween('created_at', array($request->filter_start.' 00:00:00', $request->filter_end.' 23:59:59'))->get();
        }
         return datatables($eloq)
                ->editColumn('code', function ($transaction) {
                        $code = $transaction->code;
                        if(strpos($code, 'plan')){
                            $result = ucfirst(str_replace('_plan','',$code)).' '.Plan::find($transaction->plan_id)->name;
                        }else if($code == 'quota'){
                            $result = ucfirst($code).' '.ucfirst(Quota::find($transaction->quota_id)->type).' ('.Quota::find($transaction->quota_id)->number_quota.')';
                        }else{
                            $result = ucwords(str_replace('_',' ',$code));
                        }
                        return $result;
                })
                ->addColumn('value', function ($transaction) {
                        $value_type = $transaction->value_type;
                        if($value_type == "coin"){
                            $result = Coin::Format($transaction->coin);
                        }else{
                            $result = idr_format($transaction->nominal);
                        }
                        return $result;
                })
                ->editColumn('payment_method', function ($transaction) {
                        return ucwords(str_replace('_',' ',$transaction->payment_method));
                })
                ->editColumn('status', function ($transaction) {

                        return ucwords($transaction->status);
                })
                ->editColumn('created_at', function ($transaction) {
                        return Carbon::createFromFormat('Y-m-d H:i:s', $transaction->created_at)->format('d-m-Y H:i');
                })
                ->make(true);
    }
    public function datatablesOrder(Request $request)
    {
        if(empty($request->filter_start) or $request->filter_start == "Y-m-d"){
            $eloq = FunnelOrder::selectRaw('funnel_orders.id, funnel_orders.shipping_method_service_cost, funnel_orders.created_at, CONCAT(billing_address_first_name, billing_address_first_name) AS full_name, funnel_orders.status,funnels.title')
                 ->leftJoin('funnels','funnels.id','=','funnel_orders.funnel_id')
                 ->get();
        }else{
            $eloq = FunnelOrder::where('funnel_id','>','0')->whereBetween('created_at', array($request->filter_start.' 00:00:00', $request->filter_end.' 23:59:59'))->get();
        }
         return datatables($eloq)
                /*->editColumn('code', function ($transaction) {
                        $code = $transaction->code;
                        if(strpos($code, 'plan')){
                            $result = ucfirst(str_replace('_plan','',$code)).' '.Plan::find($transaction->plan_id)->name;
                        }else if($code == 'quota'){
                            $result = ucfirst($code).' '.ucfirst(Quota::find($transaction->quota_id)->type).' ('.Quota::find($transaction->quota_id)->number_quota.')';
                        }else{
                            $result = ucwords(str_replace('_',' ',$code));
                        }
                        return $result;
                })
                ->addColumn('value', function ($transaction) {
                        $value_type = $transaction->value_type;
                        if($value_type == "coin"){
                            $result = Coin::Format($transaction->coin);
                        }else{
                            $result = idr_format($transaction->nominal);
                        }
                        return $result;
                })
                ->editColumn('payment_method', function ($transaction) {
                        return ucwords(str_replace('_',' ',$transaction->payment_method));
                })
                ->editColumn('status', function ($transaction) {

                        return ucwords($transaction->status);
                })*/
                ->editColumn('created_at', function ($order) {
                        return Carbon::createFromFormat('Y-m-d H:i:s', $order->created_at)->format('d-m-Y H:i');
                })
                ->make(true);
    }
}
