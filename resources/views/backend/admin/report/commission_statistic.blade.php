@extends('layout.backend.admin.master.master')

@section('title', 'Report Commission Statistic')

@section('page-header', 'Report Commission Statistic')

@section('breadcrumb')
	<ol class="breadcrumbs">
	  <li>
	      <a href="#">
	          <i class="fa fa-home"></i> Home
	      </a>
	  </li>
	  <li><span>Report Commission Statistic</span></li>
	</ol>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal form-bordered" action="#">
                <div class="form-group">
                    <label class="col-md-10 control-label">filter by:</label>
                    <div class="col-md-2">
                        <select data-plugin-selectTwo class="form-control" onchange="location = this.value;">                                               
                                <option value="{{ route('admin-hq-commission-statistic', ['filter' => "year"]) }}" @if($filter == "year") selected @endif>Year</option>
                                <option value="{{ route('admin-hq-commission-statistic', ['filter' => "month"]) }}" @if($filter == "month") selected @endif>Month</option>                                                    
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br>
	<div class="panel panel-default">
		<div class="panel-heading">
			Commission Statistic Report
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12">

					<div class="chart chart-md" id="FlotCommissionStatistic"></div>
					<script>

						var FlotCommissionStatisticData = {!! $JsonChartCommissionStatistic !!};

						// See: assets/javascripts/dashboard/examples.dashboard.js for more settings.

					</script>
				</div>
				<div class="col-md-12">
				{!! $ContentDataCommissionStatistic !!}
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
            <div class="panel-heading"><h3 class="panel-title">Commission</h3></div>
            <div class="panel-body">
                <table id="list-commission-table" class="table table-hover table-bordered table-condensed table-responsive dt-responsiv" data-tables="true">
                    <thead>
                        <tr>
                            <th class="center-align">Plan ID</th>
                            <th class="center-align">Member ID</th>
                            <th class="center-align">Name</th>
                            <th class="center-align">Plan</th>
                            <th class="center-align">Email</th>
                            <!-- <th class="center-align">Gender</th> -->
                            <th class="center-align">Phone</th>
                            <th class="center-align">City Or District</th>
                            <th class="center-align">Status</th>
                            <th class="center-align">Commission</th>
                            <!-- <th class="center-align">Created At</th>
                            <th class="center-align">Plan Name</th> -->
                            <th class="center-align noExport">Action</th>
                    </thead>
                </table>
            </div>
        </div>

<div class="modal fade modal-getstart detail_users" id="detail_users" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" onclick="javascript:hide_user_details()"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Detail Users</h4>
        </div>
        <div class="modal-body">
                <div class="form-group">
                    <div class="col-sm-12 img-avatar-area" align="center">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="inputReadOnly">Scoido ID</label>
                    <div class="col-md-6">
                        <input type="text" name="member_id" class="form-control" readonly>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-4 control-label">Plan</label>
                    <div class="col-md-6">
                        <input type="text" name="plan" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">First Name</label>
                    <div class="col-md-6">
                        <input type="text" name="first_name" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Last Name</label>
                    <div class="col-md-6">
                        <input type="text" name="last_name" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                        <input type="text" name="email" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('pin_bbm', 'Pin BBm', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                        <input type="text" name="pin_bbm" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Phone</label>
                    <div class="col-md-6">
                        <input type="text" name="phone" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Address</label>
                    <div class="col-md-6">
                        <textarea name="address" class="form-control" readonly></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Province</label>
                    <div class="col-md-6">
                        <input type="text" name="province" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">City / District</label>
                    <div class="col-md-6">
                        <input type="text" name="city" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Sub District</label>
                    <div class="col-md-6">
                        <input type="text" name="district" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Postal Code</label>
                    <div class="col-md-6">
                        <input type="text" name="postal_code" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Ktp Number</label>
                    <div class="col-md-6">
                        <input type="text" name="ktp_number" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Ktp Photo</label>
                    <div class="col-md-offset-3 img-ktp-photo-area"></div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Npwp Number</label>
                    <div class="col-md-6">
                        <input type="text" name="ktp_number" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Npwp Photo</label>
                    <div class="col-md-offset-3 img-npwp-photo-area"></div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Default Rotation</label>
                    <div class="col-md-6">
                        <input type="text" name="default_rotation" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Funnel Path Name</label>
                    <div class="col-md-6">
                        <input type="text" name="funnels_name" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Bank</label>
                    <div class="col-md-6">
                        <input type="text" name="bank" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Bank Acount Number</label>
                    <div class="col-md-6">
                        <input type="text" name="bank_account_number" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Account Name Holder</label>
                    <div class="col-md-6">
                        <input type="text" name="account_name_holder" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Branch</label>
                    <div class="col-md-6">
                        <input type="text" name="branch" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Rotation</label>
                    <div class="col-md-6">
                        <input type="text" name="rotation_privilage" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Number Of Rotation</label>
                    <div class="col-md-6">
                        <input type="text" name="number_rotations" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Knowing Scoido Of</label>
                    <div class="col-md-6">
                        <input type="text" name="knowing_scoido_of" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Start Date</label>
                    <div class="col-md-6">
                        <input type="text" name="created_at" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Start Paid Commission</label>
                    <div class="col-md-6">
                        <input type="text" name="start_paid_commission" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Last Due Date</label>
                    <div class="col-md-6">
                        <input type="text" name="last_due_date" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Funnels</label>
                    <div class="col-md-8">
                        <div class="list-funnels" readonly></div>
                    </div>
                </div>
        </div>

      </div>
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
       var list_commission_table = $('#list-commission-table').DataTable({
            // "sDom": '<"toolbr">frtip',

            // "searching": false,
            processing: true,
            serverSide: true,
            ajax: {
                url : "{!! route('admin-datatables-commission-statistic') !!}",
                data: function(d){
                   d.filterCommission = $('#filterCommission').val();
                   d.filter_start = $( 'input[name=filter_start]').val();
                   d.filter_end = $( 'input[name=filter_end]' ).val();
                }
            },
            order: [[ 0, 'desc' ]],
            columns: [
                {data: 'plan_id', name: 'plan_id',visible:false},
                {data: 'member_id', name: 'member_id'},
                {data: 'name', name: 'name'},
                {data: 'plan_name', name: 'plan_name'},
                {data: 'email', name: 'email'},
                // {data: 'gender', name: 'gender'},
                {data: 'phone', name: 'phone'},
                {data: 'city_or_district', name: 'city_or_district'},
                {data: 'status_account', name: 'status_account'},
                {data: 'commission', name: 'commission'},
                {data: 'action', name: 'action', searchable: false, orderable: false},
                {data: 'created_at', name: 'created_at',visible:false},
                {data: 'plan_name', name: 'plan_name',visible:false}
            ],
            "order": [[ 3, "desc" ]],
            dom: 'Bfrtip',
            buttons: [
            {
                    extend: 'pdf',
                    title: 'List Commission Data export',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                },{
                    extend: 'excel',
                    title: 'List Commission Data export',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                }, {
                    extend: 'csv',
                    title: 'List Commission Data export',
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
            $("[name='activeCommission']").prop('checked', true);
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
	var FlotCommissionStatistic = $.plot('#FlotCommissionStatistic', FlotCommissionStatisticData, {
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
