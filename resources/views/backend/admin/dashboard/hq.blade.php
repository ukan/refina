@extends('layout.backend.admin.master.master')

@section('title', 'Dashboard')

@section('page-header', 'Dashboard')

@section('breadcrumb')
	<ol class="breadcrumbs">
	  <li>
	      <a href="#">
	          <i class="fa fa-home"></i> Home
	      </a>
	  </li>
	  <li><span>Dashboard</span></li>
	</ol>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading bg-primary">
                   Total Coin Corporate
                </div>
                <div class="panel-body">
                    <section class="panel panel-featured-left panel-featured-secondary">
                        <div class="panel-body">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div style="background-color:#FFD700 " class="summary-icon bg-secondary">
                                    <i style="color:#fff" class="fa fa-dot-circle-o"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">&nbsp;</h4>
                                        <div class="info">
                                            <strong class="amount">{{ idr_format($coin_corporate,'null')}} Coin</strong> 
                                        </div>
                                    </div>
                                    <div class="summary-footer">
                                        <a class="text-muted text-uppercase"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
	<div class="panel panel-default">
		<div class="panel-heading">
			Member Statistic Report
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12">

					<div class="chart chart-md" id="FlotMemberStatistic"></div>
					<script>

						var FlotMemberStatisticData = {!! $JsonChartMemberStatistic !!};

						// See: assets/javascripts/dashboard/examples.dashboard.js for more settings.

					</script>
				</div>
				<div class="col-md-12">
				{!! $ContentDataMemberStatistic !!}
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			Transaction Report
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<div class="chart chart-md" id="FlotMemberTransaction"></div>
					<script>

						var FlotMemberTransactionData = {!! $JsonChartMemberTransaction !!};

						// See: assets/javascripts/dashboard/examples.dashboard.js for more settings.

					</script>

				</div>
				<div class="col-md-12">
				{!! $ContentDataMemberTransaction !!}

				</div>
			</div>

		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			Hall Of Fame
		</div>
		<div class="panel-body">
    		<select data-plugin-selectTwo class="form-control" name="select_filter_hall_of_fame" onchange="javascript:show_table_hall_of_fame()">
    				<option value="funnels_with_total_transaction">TOP 10 SCOIDO FUNNELS'S SELLER (
    BASED ON THE NUMBER OF TRANSACTIONS)</option>
    				<option value="funnels_with_total_price_transaction"">TOP 10 SCOIDO FUNNELS'S SELLER (BY VOLUME SALES)</option>
    				<option value="partnership_with_total_registration">TOP 10 SCOIDO PARTNERSHIP PROGRAM (BY NUMBER OF REGISTER)</option>
    				<option value="partnership_with_total_commission">TOP 10 SCOIDO PARTNERSHIP PROGRAM (BASED ON TOTAL COMMISSION)</option>
    		</select>
		<br>
            <div id="funnels_with_total_transaction-area">
	            <table id="funnels_with_total_transaction-table" class="table table-hover table-bordered table-condensed table-responsive" data-tables="true">
	                <thead>
	                    <tr>
	                        <th class="center-align">Name</th>
	                        <th class="center-align">Scoido ID</th>
	                        <th class="center-align">Funnel Name</th>
                            <th class="center-align">Funnel Address</th>
	                        <th class="center-align">Total Transaction</th>
	                    </tr>
	                </thead>
	            </table>
            </div>
            <div id="funnels_with_total_price_transaction-area">
	            <table id="funnels_with_total_price_transaction-table" class="table table-hover table-bordered table-condensed table-responsive" data-tables="true">
	                <thead>
	                    <tr>
	                        <th class="center-align">Name</th>
	                        <th class="center-align">Scoido ID</th>
	                        <th class="center-align">Funnel Name</th>
                            <th class="center-align">Funnel Address</th>
	                        <th class="center-align">Total Selling</th>
	                    </tr>
	                </thead>
	            </table>
            </div>
            <div id="partnership_with_total_registration-area">
	            <table id="partnership_with_total_registration-table" class="table table-hover table-bordered table-condensed table-responsive" data-tables="true">
	                <thead>
	                    <tr>
	                        <th class="center-align">Name</th>
	                        <th class="center-align">Scoido ID</th>
	                        <th class="center-align">Total Customer</th>
	                    </tr>
	                </thead>
	            </table>
            </div>
            <div id="partnership_with_total_commission-area">
	            <table id="partnership_with_total_commission-table" class="table table-hover table-bordered table-condensed table-responsive" data-tables="true">
	                <thead>
	                    <tr>
	                        <th class="center-align">Name</th>
	                        <th class="center-align">Scoido ID</th>
	                        <th class="center-align">Total Commission</th>
	                        <th class="center-align">Generation</th>
	                </thead>
	            </table>
            </div>
		</div>
	</div>
  <div class="modal fade modal-getstart" id="modalGeneration" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title Generation-title" id="myModalLabel">Add</h4>
        </div>
        <div class="modal-body generation-area">

        </div>
      </div>
    </div>
  </div>
<div class="modal fade modal-getstart" id="detail_users" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Detail Users</h4>
        </div>
        <div class="modal-body">

                <div class="form-group">
                    <div class="col-sm-12 img-avatar-area" align="center">

                    </div>
                </div>

				<div class="form-group">
					<label class="col-md-3 control-label" for="inputReadOnly">Member ID</label>
					<div class="col-md-6">
                        <input type="text" name="member_id" class="form-control" readonly>
					</div>
				</div>

                <div class="form-group{{ Form::hasError('first_name') }}">
					<label class="col-md-3 control-label">Plan</label>
                    <div class="col-md-6">
                        <input type="text" name="plan" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group{{ Form::hasError('first_name') }}">
					<label class="col-md-3 control-label">First Name</label>
                    <div class="col-md-6">
                        <input type="text" name="first_name" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group{{ Form::hasError('last_name') }}">
					<label class="col-md-3 control-label">Last Name</label>
                    <div class="col-md-6">
                        <input type="text" name="last_name" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group{{ Form::hasError('email') }}">
                    {!! Form::label('email', 'Email', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-6">
                        <input type="text" name="email" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group{{ Form::hasError('address') }}">
					<label class="col-md-3 control-label">Address</label>
                    <div class="col-md-6">
                        <textarea name="address" class="form-control" readonly></textarea>
                    </div>
                </div>

                <div class="form-group{{ Form::hasError('pin_bbm') }}">
                    {!! Form::label('pin_bbm', 'Pin BBm', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-6">
                        <input type="text" name="pin_bbm" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group{{ Form::hasError('phone') }}">
					<label class="col-md-3 control-label">Phone</label>
                    <div class="col-md-6">
                        <input type="text" name="phone" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group{{ Form::hasError('province') }}">
					<label class="col-md-3 control-label">Province</label>
                    <div class="col-md-6">
                        <input type="text" name="province" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group{{ Form::hasError('city') }}">
					<label class="col-md-3 control-label">City / District</label>
                    <div class="col-md-6">
                        <input type="text" name="city" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group{{ Form::hasError('district') }}">
					<label class="col-md-3 control-label">Sub District</label>
                    <div class="col-md-6">
                        <input type="text" name="district" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Postal Code</label>
                    <div class="col-md-6">
                        <input type="text" name="postal_code" class="form-control" readonly>
                    </div>
                </div>
        </div>

      </div>
    </div>
</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			Info Demografi
		</div>
		<div class="panel-body">
            <div class="tabs tabs-primary">
                <ul class="nav nav-tabs">
                    <li class="active" style="width:25%">
                        <a data-toggle="tab" href="#gender" aria-expanded="true"><center>Gender</center></a>
                    </li>
                    <li class="" style="width:25%">
                        <a data-toggle="tab" href="#city" aria-expanded="false"><center>City</center></a>
                    </li>
                    <li class="" style="width:25%">
                        <a data-toggle="tab" href="#plan" aria-expanded="false"><center>Plan</center></a>
                    </li>
                    <li class="" style="width:25%">
                        <a data-toggle="tab" href="#age" aria-expanded="false"><center>Age</center></a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="gender" class="tab-pane active">
                    <div class="col-md-6">
                        <div class="chart chart-md" id="FlotMemberGender"></div>
                        <script type="text/javascript">
                            var FlotMemberGenderData = {!! $JsonChartMemberGender !!};
                        </script>
                    </div>
                    <div class="col-md-6">
                    {!! $ContentDataMemberGender !!}
                    </div>
                        <div class="clearfix">&nbsp;</div>
                    </div>
                    <div id="city" class="tab-pane">
                    <div class="col-md-6">
                        <div class="chart chart-md" id="FlotMemberCity"></div>
                        <script type="text/javascript">
                            var FlotMemberCityData = {!! $JsonChartMemberCity !!};
                        </script>
                    </div>
                    <div class="col-md-6">
                    {!! $ContentDataMemberCity !!}
                    </div>
                        <div class="clearfix">&nbsp;</div>

                    </div>
                    <div id="plan" class="tab-pane">
                    <div class="col-md-6">
                        <div class="chart chart-md" id="FlotMemberPlanId"></div>
                        <script type="text/javascript">
                            var FlotMemberPlanIdData = {!! $JsonChartMemberPlanId !!};
                        </script>
                    </div>
                    <div class="col-md-6">
                    {!! $ContentDataMemberPlanId !!}
                    </div>
                        <div class="clearfix">&nbsp;</div>

                    </div>
                    <div id="age" class="tab-pane">
                    <div class="col-md-6">
                        <div class="chart chart-md" id="FlotMemberAge"></div>
                        <script type="text/javascript">
                            var FlotMemberAgeData = {!! $JsonChartMemberAge !!};
                        </script>
                    </div>
                    <div class="col-md-6">
                    {!! $ContentDataMemberAge !!}
                    </div>
                        <div class="clearfix">&nbsp;</div>

                    </div>
                </div>
            </div>
		</div>
	</div>
    <div class="row">
        <div class="col-md-12">
        	<div class="panel panel-default">
        		<div class="panel-heading">
        			Last Order Information
        		</div>
        		<div class="panel-body">
                    <table id="order-table" class="table table-hover table-bordered table-condensed table-responsive" data-tables="true">
                        <thead>
                            <tr>
                                <th class="center-align">Order ID</th>
                                <th class="center-align">Date</th>
                                <th class="center-align">Scoido ID</th>
                                <th class="center-align">Member Name</th>
                                <th class="center-align">Status Order</th>
                                <th class="center-align">Total</th>
                                <th class="center-align">Action</th>
                        </thead>
                    </table>
        		</div>
        	</div>
            <div class="modal fade modal-getstart" id="modalFormFunnelOrderDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="" role="document" style="max-width:1027px;margin:10px auto">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title FormFunnelOrderDetails-title" id="myModalLabel">Add</h4>
                        </div>
                        <div class="modal-body">
                            <div class="order-details-area">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Last Order Information Overview
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="col-md-6 control-label">Filter By Year Month</label>
                                <div class="col-md-6">
                                  <input type="text" name="order_yearmonth" class="form-control yearmonth">
                                </div>
                            </div>
                            <hr>
                            <table class="table table-hover table-bordered table-condensed table-responsive" data-tables="true">
                                <tbody>
                                    <tr>
                                        <td>Total Sales</th>
                                        <td class="order_overview_total_sales"></th>
                                    </tr>
                                    <tr>
                                        <td>Total Sales On This Year</th>
                                        <td class="order_overview_total_sales_on_this_year"></th>
                                    </tr>
                                    <tr>
                                        <td>Total Orders</th>
                                        <td class="order_overview_total_orders"></th>
                                    </tr>
                                    <tr>
                                        <td>Total Orders On This Year</th>
                                        <td class="order_overview_total_orders_on_this_year"></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-7">
                          <center class="order_overview_chart">
                          </center>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" class="input-sm order_overview_year" value="{{ date('Y') }}">
            <input type="hidden" class="input-sm order_overview_month" value="{{ date('m') }}">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Last Withdrawal Request Information
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-7">
                                <label class="col-md-3 control-label">Filter By Date</label>
                                <div class="col-md-9">
                                  <div class = "input-group">
                                     <span class ="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" name="withdrawal_request_filter_start" class="form-control withdrawal-request-datepicker">
                                     <span class = "input-group-addon">To</span>
                                    <input type="text" name="withdrawal_request_filter_end" class="form-control withdrawal-request-datepicker">
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table id="withdrawal-request-table" class="table table-hover table-bordered table-condensed table-responsive" data-tables="true">
                        <thead>
                            <tr>
                                <th class="center-align">Created_at</th>
                                <th class="center-align">Withdrawal ID</th>
                                <th class="center-align">Date</th>
                                <th class="center-align">Scoido ID</th>
                                <th class="center-align">Member Name</th>
                                <th class="center-align">Bank Transfer Destinations</th>
                                <th class="center-align">Account Number</th>
                                <th class="center-align">Name Place Holder</th>
                                <th class="center-align">Status</th>
                                <th class="center-align">Total</th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Last Withdrawal Request Information Overview
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="col-md-6 control-label">Filter By Year Month</label>
                                <div class="col-md-6">
                                  <input type="text" name="withdrawal_yearmonth" class="form-control yearmonth">
                                </div>
                            </div>
                            <hr>
                            <table class="table table-hover table-bordered table-condensed table-responsive" data-tables="true">
                                <tbody>
                                    <tr>
                                        <td>Total Coin In Circulation</th>
                                        <td class="withdrawal_overview_total_coin_in_circulation"></th>
                                    </tr>
                                    <tr>
                                        <td>Total Withdrawal</th>
                                        <td class="withdrawal_overview_total_withdrawal"></th>
                                    </tr>
                                    <tr>
                                        <td>Total Withdrawal On This Year</th>
                                        <td class="withdrawal_overview_total_withdrawal_on_this_year"></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-7">
                          <center class="withdrawal_overview_chart">
                          </center>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" class="input-sm withdrawal_overview_year" value="{{ date('Y') }}">
            <input type="hidden" class="input-sm withdrawal_overview_month" value="{{ date('m') }}">
        </div>
    </div>

	<div class="panel panel-default">
		<div class="panel-heading">
			Buletin Board
		</div>
		<div class="panel-body">
            <div class="timeline timeline-simple mt-xlg mb-md" id="bulletin-boards-list">
                <div id="BulletinBoardsListContent">
                </div>
            </div>
		</div>
	</div>
@endsection

@section('header')

    {!! Html::style('assets/plugins/datatables/dataTables.bootstrap.css') !!}
    <link media="all" type="text/css" rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">

@endsection
@section('scripts')

<script type="text/javascript">
$( document ).ready(function() {
var Url = '/admin/admin_dashboard_ajax_bulletin_pagination';
$('#BulletinBoardsListContent').load(Url);
});
</script>
    {!! Html::script('assets/plugins/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('assets/plugins/datatables/dataTables.bootstrap.min.js') !!}
    {!! Html::script('assets/plugins/bootstrap-validator/bootstrap-validator.js') !!}
    {!! Html::script('assets/general/library/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') !!}
    {!! Html::script('assets/general/library/tableExport.jquery.plugin/tableExport.js') !!}
    {!! Html::script('assets/general/library/tableExport.jquery.plugin/jquery.base64.js') !!}

    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

        {!! Html::script('assets/backend/porto-admin/vendor/flot/jquery.flot.js') !!}
        {!! Html::script('assets/backend/porto-admin/vendor/flot.tooltip/flot.tooltip.js') !!}
        {!! Html::script('assets/backend/porto-admin/vendor/flot/jquery.flot.pie.js') !!}
        {!! Html::script('assets/backend/porto-admin/vendor/flot/jquery.flot.categories.js') !!}
        {!! Html::script('assets/backend/porto-admin/vendor/flot/jquery.flot.resize.js') !!}
    <script type="text/javascript">
		$('.select2').select2();
       var funnels_with_total_transaction_table = $('#funnels_with_total_transaction-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{!! route('datatables-hq-dashboard-hall-of-fame',['funnels_with_total_transaction',date('Y')]) !!}",
            order: [[ 3, 'desc' ]],
            columns: [
                {data: 'user_name', name: 'user_name'},
                {data: 'scoido_id', name: 'scoido_id'},
                {data: 'funnel_name', name: 'funnel_name'},
                {data: 'funnel_address', name: 'funnel_address'},
                {data: 'total_transaction', name: 'total_transaction'}
            ]
        });

       var funnels_with_total_price_transaction_table = $('#funnels_with_total_price_transaction-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{!! route('datatables-hq-dashboard-hall-of-fame',['funnels_with_total_price_transaction',date('Y')]) !!}",
            order: [[ 3, 'desc' ]],
            columns: [
                {data: 'user_name', name: 'user_name'},
                {data: 'scoido_id', name: 'scoido_id'},
                {data: 'funnel_name', name: 'funnel_name'},
                {data: 'funnel_address', name: 'funnel_address'},
                {data: 'total_price_transaction', name: 'total_price_transaction'}
            ]
        });

       var partnership_with_total_registration_table = $('#partnership_with_total_registration-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{!! route('datatables-hq-dashboard-hall-of-fame',['partnership_with_total_registration',date('Y')]) !!}",
            order: [[ 2, 'desc' ]],
            columns: [
                {data: 'user_name', name: 'user_name'},
                {data: 'scoido_id', name: 'scoido_id'},
                {data: 'total_customer', name: 'total_customer'}
            ]
        });

       var partnership_with_total_commission_table = $('#partnership_with_total_commission-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{!! route('datatables-hq-dashboard-hall-of-fame',['partnership_with_total_commission',date('Y')]) !!}",
            order: [[ 2, 'desc' ]],
            columns: [
                {data: 'user_name', name: 'user_name'},
                {data: 'scoido_id', name: 'scoido_id'},
                {data: 'total_commission', name: 'total_commission'},
                {data: 'generation', name: 'generation'}
            ]
        });
       	function hide_table_hall_of_fame(){
	    	$('#funnels_with_total_transaction-area').hide();
	    	$('#funnels_with_total_price_transaction-area').hide();
	    	$('#partnership_with_total_registration-area').hide();
	    	$('#partnership_with_total_commission-area').hide();
       	}
       	hide_table_hall_of_fame();
    	$('#funnels_with_total_transaction-area').show();

       	function show_table_hall_of_fame(){
	    	value = $("[name='select_filter_hall_of_fame']").val();
       		hide_table_hall_of_fame();
			$('#'+value+'-area').show();
       	}

       	function show_generation(user_id,year){
            $.ajax({
                type: "POST",
                url: "{{ route('hq-admin-dashboard-post')}}",
                data: {
                    'method': 'show_generation',
                    'user_id': user_id,
                    'year': year
                },
        		dataType: 'json',
                success: function(response)
                {
            		$(".generation-area").html(response.getRecordTableGeneration);
  					$('.Generation-title').html('Generation : '+response.scoido_id+'-'+response.user_name);
                }
            });
  			$('#modalGeneration').modal({backdrop: 'static', keyboard: false});
  			$('#modalGeneration').modal('show');
       	}

        function show_user(user_id){
            $.ajax({
                type: "POST",
                url: "{{ route('hq-admin-dashboard-post')}}",
                data: {
                    'action': 'show_user_details',
                    'user_id': user_id
                },
                dataType: 'json',
                success: function(response)
                {
                    $("[name='plan']").val(response.plan);
                    $("[name='member_id']").val(response.member_id);
                    $("[name='first_name']").val(response.first_name);
                    $("[name='last_name']").val(response.last_name);
                    $("[name='phone']").val(response.phone);
                    $("[name='email']").val(response.email);
                    $("[name='address']").val(response.address);
                    $("[name='pin_bbm']").val(response.pin_bbm);
                    $("[name='province']").val(response.province);
                    $("[name='city']").val(response.city);
                    $("[name='district']").val(response.district);
                    $("[name='postal_code']").val(response.postal_code);
                    $("[name='ktp_number']").val(response.ktp_number);
                    $("[name='npwp_number']").val(response.npwp_number);
                    $("[name='funnel_name']").val(response.funnel_name);
                    $(".img-avatar-area").html('<img src="'+ response.avatar +'" width="120" class="img-circle img-responsive">')
                    if(response.ktp_photo == null){
                        $(".img-ktp-photo-area").addClass('hidden');
                    }else{
                        $(".img-ktp-photo-area").removeClass('hidden');
                    }
                    $(".img-ktp-photo-area").html('<img src="'+ response.ktp_photo +'" class="img-responsive">')
                    if(response.npwp_photo == null){
                        $(".img-npwp-photo-area").addClass('hidden');
                    }else{
                        $(".img-npwp-photo-area").removeClass('hidden');
                    }
                    $(".img-npwp-photo-area").html('<img src="'+ response.npwp_photo +'" class="img-responsive">')
                }
            });
            $('#detail_users').modal({backdrop: 'static', keyboard: false});
            $('#detail_users').modal('show');
        }
	/*
	Flot: Basic
	*/
	var FlotMemberStatistic = $.plot('#FlotMemberStatistic', FlotMemberStatisticData, {
		series: {
			lines: {
				show: true,
				fill: true,
				lineWidth: 1,
				fillColor: {
					colors: [{
						opacity: 0.45
					}, {
						opacity: 0.45
					}]
				}
			},
			points: {
				show: true
			},
			shadowSize: 0
		},
		grid: {
			hoverable: true,
			clickable: true,
			borderColor: 'rgba(0,0,0,0.1)',
			borderWidth: 1,
			labelMargin: 15,
			backgroundColor: 'transparent'
		},
		yaxis: {
			min: 0,
			color: 'rgba(0,0,0,0.1)'
		},
		xaxis: {
			color: 'rgba(0,0,0,0)'
		},
		tooltip: true,
		tooltipOpts: {
			content: '%s: Value of %x is %y',
			shifts: {
				x: -60,
				y: 25
			},
			defaultTheme: false
		}
	});

	var FlotMemberTransaction = $.plot('#FlotMemberTransaction', FlotMemberTransactionData, {
		series: {
			lines: {
				show: true,
				fill: true,
				lineWidth: 1,
				fillColor: {
					colors: [{
						opacity: 0.45
					}, {
						opacity: 0.45
					}]
				}
			},
			points: {
				show: true
			},
			shadowSize: 0
		},
		grid: {
			hoverable: true,
			clickable: true,
			borderColor: 'rgba(0,0,0,0.1)',
			borderWidth: 1,
			labelMargin: 15,
			backgroundColor: 'transparent'
		},
		yaxis: {
			min: 0,
			color: 'rgba(0,0,0,0.1)'
		},
		xaxis: {
			color: 'rgba(0,0,0,0)'
		},
		tooltip: true,
		tooltipOpts: {
			content: '%s: Value of %x is %y',
			shifts: {
				x: -60,
				y: 25
			},
			defaultTheme: false
		}
	});

    (function() {
        var plot = $.plot('#FlotMemberGender', FlotMemberGenderData, {
            series: {
                pie: {
                    show: true,
                    combine: {
                        color: '#999',
                        threshold: 0.1
                    }
                }
            },
            legend: {
                show: false
            },
            grid: {
                hoverable: true,
                clickable: true
            }
        });
    })();

    (function() {
        var plot = $.plot('#FlotMemberCity', FlotMemberCityData, {
            series: {
                pie: {
                    show: true,
                    combine: {
                        color: '#999',
                        threshold: 0.1
                    }
                }
            },
            legend: {
                show: false
            },
            grid: {
                hoverable: true,
                clickable: true
            }
        });
    })();

    (function() {
        var plot = $.plot('#FlotMemberAge', FlotMemberAgeData, {
            series: {
                pie: {
                    show: true,
                    combine: {
                        color: '#999',
                        threshold: 0.1
                    }
                }
            },
            legend: {
                show: false
            },
            grid: {
                hoverable: true,
                clickable: true
            }
        });
    })();

    (function() {
        var plot = $.plot('#FlotMemberPlanId', FlotMemberPlanIdData, {
            series: {
                pie: {
                    show: true,
                    combine: {
                        color: '#999',
                        threshold: 0.1
                    }
                }
            },
            legend: {
                show: false
            },
            grid: {
                hoverable: true,
                clickable: true
            }
        });
    })();

        function hide_chart_demografi(){
            $('#FlotMemberGender-area').hide();
            $('#FlotMemberCity-area').hide();
            $('#FlotMemberPlanId-area').hide();
            $('#FlotMemberAge-area').hide();
        }
        hide_chart_demografi();
        $('#FlotMemberGender-area').show();

        function show_chart_demografi(){
            value = $("[name='select_filter_demografi']").val();
            hide_chart_demografi();
            $('#'+value+'-area').show();
        }

       var order_table = $('#order-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{!! route('datatables-hq-dashboard-order') !!}",
            order: [[ 0, 'desc' ]],
            columns: [
                {data: 'id', name: 'id'},
                {data: 'date', name: 'date'},
                {data: 'scoido_id', name: 'scoido_id'},
                {data: 'user_name', name: 'user_name'},
                {data: 'status_order', name: 'status_order'},
                {data: 'total', name: 'total'},
                {data: 'action', name: 'action', class: 'center-align', searchable: false, orderable: false}
            ]
        });
        function show_order_details(id){
            $.ajax({
                type: "POST",
                url: "{{ route('hq-admin-dashboard-post')}}",
                data: {
                    'id': id,
                    'action' : 'show_order_details'
                },
                dataType : 'json',
                success: function(response)
                {
                    $("#modalFormFunnelOrderDetails").modal("show");
                    $(".FormFunnelOrderDetails-title").html(response.order_details_title);
                    $(".order-details-area").html(response.order_details_area);
                    $(".btn-print").attr("onclick",response.script_action_print);
                }
            });
        }
        function show_order_overview(){
            var order_overview_month = $('.order_overview_month').val();
            var order_overview_year = $('.order_overview_year').val();
            $.ajax({
                type: "POST",
                url: "{{ route('hq-admin-dashboard-post')}}",
                data: {
                    'action' : 'show_order_overview_table',
                    'year' : order_overview_year,
                    'month' : order_overview_month,
                },
                dataType : 'json',
                success: function(response)
                {
                    $('.order_overview_total_sales').html(response.total_sales);
                    $('.order_overview_total_sales_on_this_year').html(response.total_sales_on_this_year);
                    $('.order_overview_total_orders').html(response.total_orders);
                    $('.order_overview_total_orders_on_this_year').html(response.total_orders_on_this_year);
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ route('hq-admin-dashboard-post')}}",
                data: {
                    'action' : 'show_order_overview_chart',
                    'year' : order_overview_year,
                    'month' : order_overview_month,
                },
                success: function(response)
                {
                    $('.order_overview_chart').html(response);

                }
            });
        }
        $("[name=order_yearmonth]").on("change",function(){
            split = $("[name=order_yearmonth]").val().split("-");
            $(".order_overview_month").val(split[0]);
            $(".order_overview_year").val(split[1]);
            show_order_overview();
        });
            show_order_overview();
       var withdrawal_request_table = $('#withdrawal-request-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url : "{!! route('datatables-hq-dashboard-withdrawal-request') !!}",
                data: function ( d ) {
                   d.filter_start = $( 'input[name=withdrawal_request_filter_start]').val();
                   d.filter_end = $( 'input[name=withdrawal_request_filter_end]' ).val();
                }
            },
            order: [[ 0, "desc" ]],
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print',{
                text: 'Text',
                action: function ( e, dt, node, config ) {
                    $('#withdrawal-request-table').tableExport({type:'txt',escape:'false',tableName:'Withdrawal Request'});
                }
            }],
            columns: [
                {data: 'created_at', name: 'created_at',visible:false},
                {data: 'withdrawal_id', name: 'withdrawal_id'},
                {data: 'date', name: 'date'},
                {data: 'scoido_id', name: 'scoido_id'},
                {data: 'user_name', name: 'user_name'},
                {data: 'bank_transfer_destination', name: 'bank_transfer_destination'},
                {data: 'account_number', name: 'account_number'},
                {data: 'name_place_holder', name: 'name_place_holder'},
                {data: 'status', name: 'status'},
                {data: 'total', name: 'total'}
            ]
        });
       
        $('.withdrawal-request-datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });
        $('.withdrawal-request-datepicker').on('change',function(){
            filter_start = $( 'input[name=withdrawal_request_filter_start]').val();
            filter_end = $( 'input[name=withdrawal_request_filter_end]' ).val();
            if(filter_start != '' && filter_end != ''){
                withdrawal_request_table.draw();
            }
        });



        function show_withdrawal_overview(){
            var withdrawal_overview_month = $('.withdrawal_overview_month').val();
            var withdrawal_overview_year = $('.withdrawal_overview_year').val();
            $.ajax({
                type: "POST",
                url: "{{ route('hq-admin-dashboard-post')}}",
                data: {
                    'action' : 'show_withdrawal_overview_table',
                    'year' : withdrawal_overview_year,
                    'month' : withdrawal_overview_month,
                },
                dataType : 'json',
                success: function(response)
                {
                    $('.withdrawal_overview_total_coin_in_circulation').html(response.total_coin_in_circulation);
                    $('.withdrawal_overview_total_withdrawal').html(response.total_withdrawal);
                    $('.withdrawal_overview_total_withdrawal_on_this_year').html(response.total_withdrawal_on_this_year);
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ route('hq-admin-dashboard-post')}}",
                data: {
                    'action' : 'show_withdrawal_overview_chart',
                    'year' : withdrawal_overview_year,
                    'month' : withdrawal_overview_month,
                },
                success: function(response)
                {
                    $('.withdrawal_overview_chart').html(response);
                }
            });
        }

        $(".yearmonth").datepicker( {
            format: "mm-yyyy",
            viewMode: "months",
            minViewMode: "months"
        });
        $("[name=withdrawal_yearmonth]").on("change",function(){
            split = $("[name=withdrawal_yearmonth]").val().split("-");
            $(".withdrawal_overview_month").val(split[0]);
            $(".withdrawal_overview_year").val(split[1]);
            show_withdrawal_overview();
        });
            show_withdrawal_overview();
    </script>
@endsection
