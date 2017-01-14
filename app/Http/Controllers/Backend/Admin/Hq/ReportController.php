<?php

namespace App\Http\Controllers\Backend\Admin\Hq;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\BackendFinanceDashboard;
use App\Models\CoinTransaction;
use App\Models\User;
use App\Models\Plan;
use App\Models\Roles;
use App\Models\Coin;

use App\Models\UserPlanIdLog;
use App\Models\UserStatusAccountLog;
use App\Models\BackendHqReport;
use App\Models\Generation;

use Input;
use Carbon\Carbon;
use Mail;
use Excel;
use Session;
use stdClass;
use DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function member_statistic_index($code="year")
    {
      return BackendHqReport::MemberStatisticIndex($code);
    }

    public function datatables_member_statistic(Request $request)
    {   
      return BackendHqReport::DatatablesMemberStatistic($request);
    }
    public function commission_statistic_index($code="year")
    {
      return BackendHqReport::CommissionStatisticIndex($code);
    }
    public function datatables_commission_statistic(Request $request)
    {         
      return BackendHqReport::DatatablesCommissionStatistic($request);
    }
    public function coin_statistic_index($code="year")
    {
      return BackendHqReport::CoinStatisticIndex($code);
    }
    public function datatables_coin_statistic(Request $request)
    {
      return BackendHqReport::DatatablesCoinStatistic($request);
    }
    public function omzet_statistic_index($code="year")
    {
      return BackendHqReport::OmzetStatisticIndex($code);
    }
    public function datatables_omzet_statistic(Request $request)
    {
      // return BackendHqReport::DatatablesCoinStatistic($request);
    }    
    public function omzet_statistic_upgrade_tools()
    {
      echo 'omzet statistic';
    }
    public function datatables_omzet_statistic_subcription(Request $request)
    {
      return BackendHqReport::DatatablesOmzetStatisticSubcription($request);
    }   
    public function datatables_omzet_statistic_new_member(Request $request)
    {
      return BackendHqReport::DatatablesOmzetStatisticNewMember($request);
    }   
    public function datatables_omzet_statistic_upgrade(Request $request)
    {
      return BackendHqReport::DatatablesOmzetStatisticUpgrade($request);
    }   
    public function omzet_statistic_channel_sales($code="year")
    {
      return BackendHqReport::OmzetStatisticChannelSales($code);
    }
    public function datatables_omzet_statistic_channel_sales(Request $request)
    {
      return BackendHqReport::DatatablesOmzetStatisticChannelSales($request); 
    }   
    public function omzet_statistic_fee_based_income($code="year")
    {
      return BackendHqReport::OmzetStatisticFeeBasedIncome($code);
    }
    public function datatables_omzet_statistic_fee_based_income(Request $request)
    {
      return BackendHqReport::DatatablesOmzetStatisticFeeBasedIncome($request); 
    }
}
