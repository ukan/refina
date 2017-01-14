@extends('layout.backend.admin.master.master')

@section('title', 'Genealogy')

@section('page-header', 'Genealogy')

@section('breadcrumb')
	<ol class="breadcrumbs">
	  <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
	  <li><span>Member And Genealogy</span></li>
      <li><span>List Member</span></li>
	</ol>
@endsection

@section('content')
        <div class="form-group tab-content area-insert-update">
        </div>
    	<div class="panel panel-primary">
    		<div class="panel-heading"><h3 class="panel-title">Member</h3></div>
    		<div class="panel-body">
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
                <br>    
                <table id="list-member-table" class="table table-hover table-bordered table-condensed table-responsive" data-tables="true">
                    <thead>
                        <tr>
                            <th class="center-align">Plan ID</th>
                            <th class="center-align">Member ID</th>
                            <th class="center-align">Upline ID</th>
                            <th class="center-align">Placement Upline ID</th>
                            <th class="center-align">Name</th>
                            <th class="center-align">Upline Name</th>
                            <th class="center-align">Plan</th>
                            <th class="center-align">Email</th>
                            <!-- <th class="center-align">Gender</th> -->
                            <th class="center-align">Phone</th>
                            <th class="center-align">Status</th>
                            <th class="center-align">Reason Banned</th>
                            <th class="center-align">Banned By</th>
                            <!-- <th class="center-align">Created At</th>
                            <th class="center-align">Plan Name</th> -->
                            <th width="100%" class="center-align noExport">Action</th>
                    </thead>
                </table>
    		</div>
        </div>
                <!-- modal action member -->
                <div class="modal fade modal-getstart" id="modalFormMemberAction" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title FormFunnelProduct-title" id="myModalLabel">Add</h4>
                        </div>
                        <div class="modal-body">

                        {!! Form::open(['route'=>'admin-post-status-member', 'files'=>true, 'class' => 'form-horizontal jquery-form-change-status']) !!}
                            <input type="hidden" name="id" value="">
                            <input type="hidden" name="email" value="">
                            <div class="form-group area-insert-update">
                                <div class="col-sm-12 image-block" align="center"></div>
                            </div>
                            <div class="form-group area-banned">
                                <label class="col-md-3 control-label">Banneds Reason</label>
                                <div class="col-md-6">
                                    <textarea name="reason" class="form-control" rows="4"></textarea>
                                    <p class="has-error text-danger error-reason"></p>
                                </div>
                            </div>
                            <div class="form-group area-active">
                                <div class="col-md-12">
                                    <center>Are you sure want to active for user ?</center>
                                </div>
                            </div>
                            <div class="form-group area-banned">
                                <div class="col-md-12">
                                    <center>Are you sure want to banned this user ?</center>
                                </div>
                            </div>
                            <div class="form-group area-reset-password">
                                <div class="col-md-12">
                                    <center>Are you sure want to reset password for this user ?</center>
                                </div>
                            </div>

                            <div class="form-group area-active">
                                <center>
                                    {!! Form::submit('Active', ['class' => 'btn btn-success btn-submit', 'title' => 'Active']) !!}
                                    <input type="hidden" name="method">
                                    <button class="btn btn-default btn-cancel modal-dismiss" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
                                </center>
                            </div>
                            <div class="form-group area-banned">
                                <center>
                                    {!! Form::submit('Banned', ['class' => 'btn btn-danger btn-submit', 'title' => 'Banned']) !!}
                                    <input type="hidden" name="method">
                                    <button class="btn btn-default btn-cancel modal-dismiss" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
                                </center>
                            </div>
                            <div class="form-group area-reset-password">
                                <center>
                                    {!! Form::submit('Reset', ['class' => 'btn btn-danger btn-submit', 'title' => 'Reset']) !!}
                                    <input type="hidden" name="method">
                                    <button class="btn btn-default btn-cancel modal-dismiss" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
                                </center>
                            </div>
                        </form>
                       </div>
                      </div>
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
                    <label class="col-md-4 control-label">Upline ID</label>
                    <div class="col-md-6">
                        <input type="text" name="upline_id" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Placement Upline ID</label>
                    <div class="col-md-6">
                        <input type="text" name="mover_id" class="form-control" readonly>
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
                    <label class="col-md-4 control-label">Know Scoido From</label>
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
                    <label class="col-md-4 control-label">Start Paid Member</label>
                    <div class="col-md-6">
                        <input type="text" name="start_paid_member" class="form-control" readonly>
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

        <div class="panel panel-primary">
            <div class="panel-heading"><h3 class="panel-title">User Request</h3></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-7">
                        <label class="col-md-3 control-label"><b>Filter By Date</b> </label>                    
                        <div class="col-md-9">
                            <div class = "input-group">
                                <span class ="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" name="filter_start_request" class="form-control datepicker">
                                    <span class = "input-group-addon">To</span>
                                <input type="text" name="filter_end_request" class="form-control datepicker">
                            </div>
                        </div>
                    </div>
                </div>    
                <br>
                <table id="user-request-table" class="table table-hover table-bordered table-condensed table-responsive" data-tables="true">
                    <thead>
                        <tr>
                            <th class="center-align">User</th>
                            <th class="center-align">Code</th>
                            <th class="center-align">Reason</th>
                            <th class="center-align">Date</th>
                            <th class="center-align">Status</th>
                            <th class="center-align noExport">Action</th>
                    </thead>
                </table>
            </div>
        </div>

<div class="modal fade modal-getstart" id="modalShowFormApprovalRequest" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title modalShowFormApprovalRequest-title" id="myModalLabel">Form Approval</h4>
            </div>
            <div class="modal-body">

            {!! Form::open(['route'=>'admin-hq-user-request-post', 'files'=>true, 'class' => 'form-horizontal jquery-form-approval-request']) !!}
                    <input type="hidden" name="id" class="user_request_id">
                    <input type="hidden" name="code" class="code">
                    <input type="hidden" name="action" value="approval_request">
                    <div class="form-group">
                        <center>
                            {!! Form::submit('Approve', ['class' => 'btn btn-success', 'title' => 'Approve']) !!}
                            <button class="btn btn-default btn-cancel modal-dismiss" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
                        </center>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

@section('header')

    {!! Html::style('assets/plugins/datatables/dataTables.bootstrap.css') !!}
    <link media="all" type="text/css" rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">
    <style type="text/css">
        .center-align{
            text-align: center;
        }
    </style>

@endsection
@section('scripts')
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
    {!! Html::script('assets/backend/porto-admin/vendor/bootstrap-confirmation/bootstrap-confirmation.js') !!}

    <script type="text/javascript">
$('html').addClass(' sidebar-left-collapsed');
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });
        $('.datepicker').on('change',function(){
            filter_start = $( 'input[name=filter_start]').val();
            filter_end = $( 'input[name=filter_end]' ).val();
            if(filter_start != '' && filter_end != ''){
                list_member_table.draw();                           
            }
        });
       var list_member_table = $('#list-member-table').DataTable({
            // "sDom": '<"toolbr">frtip',

            // "searching": false,
            processing: true,
            serverSide: true,
            ajax: {
                url : "{!! route('admin-datatables-list-member') !!}",
                data: function(d){
                   d.filterMember = $('#filterMember').val();
                   d.filter_start = $( 'input[name=filter_start]').val();
                   d.filter_end = $( 'input[name=filter_end]' ).val();
                }
            },
            // ajax: "{!! route('admin-datatables-list-member') !!}",
            order: [[ 0, 'desc' ]],
            columns: [
                {data: 'plan_id', name: 'plan_id',visible:false},
                {data: 'member_id', name: 'member_id'},
                {data: 'upline_id', name: 'upline_id'},
                {data: 'mover_id', name: 'mover_id'},
                {data: 'name', name: 'name'},
                {data: 'upline_name', name: 'upline_name'},
                {data: 'plan_name', name: 'plan_name'},
                {data: 'email', name: 'email'},
                // {data: 'gender', name: 'gender'},
                {data: 'phone', name: 'phone'},
                {data: 'status_account', name: 'status_account'},
                {data: 'reason_banned', name: 'reason_banned'},
                {data: 'banned_by', name: 'banned_by'},
                {data: 'action', name: 'action', searchable: false, orderable: false},
                {data: 'created_at', name: 'created_at',visible:false},
                {data: 'plan_name', name: 'plan_name',visible:false}
            ],
            "order": [[ 3, "desc" ]],
            dom: 'Bfrtip',
            buttons: [
            {
                    extend: 'pdf',
                    title: 'List Member Data export',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                },{
                    extend: 'excel',
                    title: 'List Member Data export',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                }, {
                    extend: 'csv',
                    title: 'List Member Data export',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                },{
                text: 'Text',
                action: function ( e, dt, node, config ) {
                    list_member_table.column( 10 ).visible( false );
                    $('#list-member-table').tableExport({type:'txt',escape:'false',tableName:'list-member'});
                    list_member_table.column( 10 ).visible( true );
                },
                    exportOptions: {
                    columns: 'thead th:not(.noExport)'
                    }
                }
            ]
        });

        $("div.toolbr").append('<b style="margin-left:400px" >Custom tool bar! Text/images etc.</b>');

        if($("[name='status_account']").val() == 'active'){
            $("[name='activeMember']").prop('checked', true);
        }
        function showDataTablesOnChange(){
            list_member_table.draw();
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
                    $("[name='start_paid_member']").val(response.start_paid_member);
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

        /*start show for active member*/
        function execute_active(id){
            $.ajax({
                type: "POST",
                url: "{{ route('admin-get-data-member')}}",
                data: {
                    'id': id
                },
                dataType: 'json',
                success: function(response)
                {
                    $("[name='id']").val(response.id);
                }
            });

            $('.area-banned').hide();
            $('.area-reset-password').hide();
            $('.area-active').show();
            $('.FormFunnelProduct-title').html('Active Member');
            $("[name='method']").val('active');
            $('#modalFormMemberAction').modal({backdrop: 'static', keyboard: false});
            $('#modalFormMemberAction').modal('show');
        }
        /*end show for active member*/

        /*start show for banned member*/
        function execute_banned(id){
            $.ajax({
                type: "POST",
                url: "{{ route('admin-get-data-member')}}",
                data: {
                    'id': id
                },
                dataType: 'json',
                success: function(response)
                {
                    $("[name='id']").val(response.id);
                }
            });
            $("[name='reason']").val('');
            $('.area-active').hide();
            $('.area-reset-password').hide();
            $('.area-banned').show();
            $('.FormFunnelProduct-title').html('Banned Member');
            $("[name='method']").val('banned');
            $('#modalFormMemberAction').modal({backdrop: 'static', keyboard: false});
            $('#modalFormMemberAction').modal('show');
        }
        /*end show for banned member*/

        /*start show for reset member*/
        function execute_reset(id){
            $.ajax({
                type: "POST",
                url: "{{ route('admin-get-data-member')}}",
                data: {
                    'id': id
                },
                dataType: 'json',
                success: function(response)
                {
                    $("[name='email']").val(response.email);
                }
            });

            $('.area-active').hide();
            $('.area-banned').hide();
            $('.area-reset-password').show();
            $('.FormFunnelProduct-title').html('Reset Password');
            $("[name='method']").val('reset');
            $('#modalFormMemberAction').modal({backdrop: 'static', keyboard: false});
            $('#modalFormMemberAction').modal('show');
        }
        /*end show for reset member*/

        /*start ajaxForm for notification insert-update-delete*/
        $('.jquery-form-change-status').ajaxForm({
            dataType : "json",

            success: function(response) {

                if(response.status == 'success'){
                    var title_not = 'Notification';
                    var type_not = 'success';

                    list_member_table.ajax.reload();
                    $('#modalFormMemberAction').modal('hide');
                    $('#modalFormMemberAction').modal('hide');
                }else{
                    var title_not = 'Notification';
                    var type_not = 'failed';
                }
                var myStack = {"dir1":"down", "dir2":"right", "push":"top"};
                new PNotify({
                    title: title_not,
                    text: response.notification,
                    type: type_not,
                    addclass: "stack-custom",
                    stack: myStack
                });
            },
            beforeSend: function() {
                $('.has-error').html('');
            },
            error: function(response){
                if (response.status === 422) {
                    var data = response.responseJSON;
                    $.each(data,function(key,val){
                        $('.error-'+key).html(val);
                    });
                    var myStack = {"dir1":"down", "dir2":"right", "push":"top"};
                    new PNotify({
                        title: "Failed",
                        text: "Validate Error, Check Your Data Again",
                        type: 'danger',
                        addclass: "stack-custom",
                        stack: myStack
                    });
                    $("#modalFormMemberAction").scrollTop(0);
                    $("#modalFormMemberAction").scrollTop(0);
                  } else {
                      $('.error').addClass('alert alert-danger').html(response.responseJSON.message);
                  }
            }
        });
        /*end ajaxForm for notification insert-update-delete*/







                /*start show data member in table*/
        var user_request_table = $('#user-request-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url : "{!! route('admin-hq-user-request-datatables') !!}",
                data: function(d){
                            d.filter_start = $( 'input[name=filter_start_request]').val();
                            d.filter_end = $( 'input[name=filter_end_request]' ).val();
                }
            },
            order: [[ 0, 'desc' ]],
            columns: [
                {data: 'user', name: 'user'},
                {data: 'code', name: 'code'},
                {data: 'reason', name: 'reason'},
                {data: 'date', name: 'date'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', class: 'center-align', searchable: false, orderable: false}
            ],
            "order": [[ 3, "desc" ]],
            dom: 'Bfrtip',
            buttons: [
            {
                    extend: 'pdf',
                    title: 'Funnel Order List Export',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                },{
                    extend: 'excel',
                    title: 'Funnel Order List Export',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                }, {
                    extend: 'csv',
                    title: 'Funnel Order List Export',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                },{
                text: 'Text',
                action: function ( e, dt, node, config ) {
                    coin_order_table.column(5).visible( false );
                    $('#funnel-table').tableExport({type:'txt',escape:'false',tableName:'Request'});
                    coin_order_table.column(5).visible( true );
                },
                    exportOptions: {
                    columns: 'thead th:not(.noExport)'
                    }
                }
            ]
        });

        function show_form_approval_request(id){
            $("[class=user_request_id]").val(id);
            $.ajax({
                type: "POST",
                url: "{{ route('admin-hq-user-request-post') }}",
                data: {
                    'id': id,
                    'action' : 'get-data'
                },
                dataType : 'json',
                success: function(response)
                {
                    $("[class=code]").val(response.code);
                    $("#modalShowFormApprovalRequest").modal("show");
                }
            });
        }
        $('.jquery-form-approval-request').ajaxForm({
            dataType : 'json',
            success: function(response) {
                if(response.status == 'success'){
                    var title_not = 'Notification';
                    var type_not = 'success';
                }else{
                    var title_not = 'Notification';
                    var type_not = 'failed';
                }
                var myStack = {"dir1":"down", "dir2":"right", "push":"top"};
                new PNotify({
                    title: response.status,
                    text: response.notification,
                    type: type_not,
                    addclass: "stack-custom",
                    stack: myStack
                });
                user_request_table.ajax.reload();
                $('#modalShowFormApprovalRequest').modal('hide');
            },
            beforeSend: function() {
              $('.has-error').html('');
            },
            error: function(response){
              if (response.status === 422) {
                  var data = response.responseJSON;
                  $.each(data,function(key,val){
                      $('.error-'+key).html(val);
                  });
                var myStack = {"dir1":"down", "dir2":"right", "push":"top"};
                    new PNotify({
                        title: "Failed",
                        text: "Validate Error, Check Your Data Again",
                        type: 'danger',
                        addclass: "stack-custom",
                        stack: myStack
                    });
                $("#modalShowFormApprovalRequest").scrollTop(0);
              } else {
                  $('.error').addClass('alert alert-danger').html(response.responseJSON.message);
              }
            }
        });
    </script>
@endsection
