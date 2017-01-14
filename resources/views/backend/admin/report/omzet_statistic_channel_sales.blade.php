@extends('layout.backend.admin.master.master')

@section('title', 'Omzet Statistic Channel Sales Report')

@section('page-header', 'Omzet Statistic Channel Sales Report')

@section('breadcrumb')
	<ol class="breadcrumbs">
	  <li>
	      <a href="#">
	          <i class="fa fa-home"></i> Home
	      </a>
	  </li>
	  <li><span>Omzet Statistic Channel Sales Report</span></li>
	</ol>
@endsection

@section('content')
<ul class="nav nav-pills">
  <li role="presentation"><a href="{{ route('admin-hq-omzet-statistic', ['filter' => "year"]) }}">MemberShip</a></li>
  <li role="presentation" class="active"><a href="#">Channel Sales</a></li>
  <li role="presentation"><a href="{{ route('admin-hq-omzet-statistic-fee-based-income', ['filter' => "year"]) }}">Fee Based Income</a></li>
</ul>
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal form-bordered" action="#">
                <div class="form-group">
                    <label class="col-md-10 control-label">filter by:</label>
                    <div class="col-md-2">
                        <select data-plugin-selectTwo class="form-control" onchange="location = this.value;">                                               
                                <option value="{{ route('admin-hq-omzet-statistic-channel-sales', ['filter' => "year"]) }}" @if($filter == "year") selected @endif>Year</option>
                                <option value="{{ route('admin-hq-omzet-statistic-channel-sales', ['filter' => "month"]) }}" @if($filter == "month") selected @endif>Month</option>
                                <option value="{{ route('admin-hq-omzet-statistic-channel-sales', ['filter' => "day"]) }}" @if($filter == "day") selected @endif>Day</option>                                                    
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br>
    <div class="panel panel-default">
        <div class="panel-heading">
            Omzet Statistic Channel Sales Report
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">

                    <div class="chart chart-md" id="FlotCoinStatistic"></div>
                    <script>

                        var FlotCoinStatisticData = {!! $JsonChartCoinStatistic !!};

                        // See: assets/javascripts/dashboard/examples.dashboard.js for more settings.

                    </script>
                </div>
                <div class="col-md-12">
                {!! $ContentDataCoinStatistic !!}
                </div>
            </div>
        </div>
    </div>
    <div class="form-group tab-content area-insert-update">
        <div class="row">
            <div class="col-md-7">
                <label class="col-md-3 control-label"><b>Filter By Date</b> </label>                    
                <div class="col-md-9">
                    <div class = "input-group">
                        <span class ="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="text" name="filter_start" class="form-control datepicker">
                            <span class = "input-group-addon">To</span>
                        <input type="text" name="filter_end" class="form-control datepicker">
                    </div>
                </div>
            </div>
        </div>    
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading"><h3 class="panel-title">Transactions</h3></div>
        <div class="panel-body">
            <table id="list-transactions-table" class="table table-hover table-bordered table-condensed table-responsive dt-responsiv" data-tables="true">
                <thead>
                    <tr>
                        <th class="center-align">No Transaction</th>
                        <th class="center-align">Transaction</th>
                        <th class="center-align">Value</th>
                        <th class="center-align">Date</th>
                        <th class="center-align">Status</th>
                </thead>
            </table>
        </div>
    </div>

@endsection

@section('header')

    {!! Html::style('assets/plugins/datatables/dataTables.bootstrap.css') !!}
    {!! Html::style('assets/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css') !!}
    <link media="all" type="text/css" rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">
    

@endsection
@section('scripts')
    {!! Html::script('assets/plugins/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('assets/plugins/datatables/dataTables.bootstrap.min.js') !!}
    {!! Html::script('assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js') !!}
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
$('html').addClass(' sidebar-left-collapsed');
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });
        $('.datepicker').on('change',function(){
            filter_start = $( 'input[name=filter_start]').val();
            filter_end = $( 'input[name=filter_end]' ).val();
            if(filter_start != '' && filter_end != ''){
                list_commission_table.draw();                           
            }
        });
       var list_commission_table = $('#list-transactions-table').DataTable({
            // "sDom": '<"toolbr">frtip',

            // "searching": false,
            processing: true,
            serverSide: true,
            ajax: {
                url : "{!! route('admin-datatables-omzet-statistic-channel-sales') !!}",
                data: function(d){
                   d.filterCoin = $('#filterCoin').val();
                   d.filter_start = $( 'input[name=filter_start]').val();
                   d.filter_end = $( 'input[name=filter_end]' ).val();
                }
            },
            order: [[ 0, 'desc' ]],
            columns: [
                {data: 'order_id', name: 'order_id'},
                {data: 'code', name: 'code'},
                {data: 'value', name: 'value'},
                {data: 'created_at', name: 'created_at'},
                /*{data: 'payment_method', name: 'payment_method'},*/
                {data: 'status', name: 'status'},
            ],
            "order": [[ 3, "desc" ]],
            dom: 'Bfrtip',
            buttons: [
            {
                    extend: 'pdf',
                    title: 'List Coin Data export',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                },{
                    extend: 'excel',
                    title: 'List Coin Data export',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                }, {
                    extend: 'csv',
                    title: 'List Coin Data export',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                },{
                text: 'Text',
                action: function ( e, dt, node, config ) {
                    list_commission_table.column( 10 ).visible( false );
                    $('#list-commission-table').tableExport({type:'txt',escape:'false',tableName:'list-commission'});
                    list_commission_table.column( 10 ).visible( true );
                },
                    exportOptions: {
                    columns: 'thead th:not(.noExport)'
                    }
                }
            ]
        });

        $("div.toolbr").append('<b style="margin-left:400px" >Custom tool bar! Text/images etc.</b>');

        if($("[name='status_account']").val() == 'active'){
            $("[name='activeCoin']").prop('checked', true);
        }
        function showDataTablesOnChange(){
            list_commission_table.draw();
        }
        function hide_user_details(){
            $('#detail_users').modal('hide');
        }
        function show_user(id){
            $.ajax({
                type: "POST",
                url: "{!! route('hq-admin-dashboard-post') !!}",
                data: {
                    'action': 'show_user_details',
                    'user_id': id
                },
                dataType: 'json',
                success: function(response)
                {
                    $("[name='plan']").val(response.plan);
                    $("[name='member_id']").val(response.member_id);
                    $("[name='upline_id']").val(response.upline_id);
                    $("[name='mover_id']").val(response.mover_id);
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
                    $("[name='knowing_scoido_of']").val(response.knowing_scoido_of);
                    $("[name='default_rotation']").val(response.default_rotation);
                    $("[name='funnels_name']").val(response.funnels_name);
                    $("[name='bank']").val(response.bank);
                    $("[name='bank_account_number']").val(response.bank_account_number);
                    $("[name='account_name_holder']").val(response.account_name_holder);
                    $("[name='branch']").val(response.branch);
                    $("[name='rotation_privilage']").val(response.rotation_privilage);
                    $("[name='number_rotations']").val(response.number_rotations);
                    $("[name='created_at']").val(response.created_at);
                    $("[name='last_due_date']").val(response.last_due_date);
                    $("[name='start_paid_commission']").val(response.start_paid_commission);
                    $(".list-funnels").html(response.list_funnels);
                    
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
	var FlotCoinStatistic = $.plot('#FlotCoinStatistic', FlotCoinStatisticData, {
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

    </script>
@endsection
