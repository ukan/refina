@extends('layout.backend.admin.master.master')

@section('title', 'Profile Completion')

@section('page-header', 'Profile Completion')

@section('breadcrumb')
	<ol class="breadcrumbs">
	  <li>
	      <a href="{!! action('Frontend\Member\DashboardController@index') !!}">
	          <i class="fa fa-home"></i> Home
	      </a>
	  </li>
	  <li><a href="{!! action('Frontend\Member\ProfileController@index') !!}">Profile</a></li>
	  <li><span>Profile Completion</span></li>
	</ol>
@endsection
@section('content')


	@include('frontend.member.profile.partials.cover')

	<div class="tabs tabs-primary">
		<ul class="nav nav-tabs">
			<li>
				<a href="{{ route('member-profile') }}"><i class="fa fa-info"></i> Personal Information</a>
			</li>
			<li class="active">
				<a><i class="fa fa-check"></i> Billing & Plan</a>
			</li>
			<li>
				<a href="{{ route('member-profile-change-password') }}"><i class="fa fa-edit"></i> Change Password</a>
			</li>
			<li>
				<a href="{{ route('member-general-setting-smtp') }}"><i class="fa fa-wrench"></i> Smtp</a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="toggle" data-plugin-toggle data-plugin-options='{ "isAccordion": true }'>
				<section class="toggle active">
					<label>My Billing</label>
					<div class="toggle-content custom-completion" style="display: block;"	>

<div class="clearfix">&nbsp;</div>
						<div class="table-responsive col-md-8 col-md-offset-2">
							<div class="table-responsive myplan-tab">
								<table class="table table-striped tblspace">
									<tbody style="width:100%">
										<tr>
											<td style="width:50%">Bank</td>
											<td style="width:50%">{{ user_info('bank') }}</td>
										</tr>
										<tr>
											<td style="width:50%">Bank Account Number</td>
											<td style="width:50%">{{ user_info('bank_account_number') }}</td>
										</tr>
										<tr>
											<td style="width:50%">Branch</td>
											<td style="width:50%">{{ user_info('bank_branch') }}</td>
										</tr>
										<tr>
											<td style="width:50%">Account Name Holder</td>
											<td style="width:50%">{{ user_info('account_name_holder') }} <i class="fa fa-question-circle pull-right" rel="tooltip" title="Nama harus sesuai dengan KTP pemilik account yang masih berlaku."></i></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="btn-editbank">
							<a class="modal-with-form btn btn-warning" style="margin-left:5px" data-toggle="modal" data-target="#editBankAccount">Edit My Bank Information</a>
						</div>
					</div>
				</section>
				<section class="toggle">
					<label>My Plan</label>
					<div class="toggle-content">

						<div class="row">
	        				<div class="col-md-4">
	        					<div class="table-responsive">
									<label>Plan</label>
									<table class="table mb-none borderless">

										<tbody>
											<tr>
												<td><b>Scoid Plan</b></td>
												<td>{{ user_info('plan') }}</td>
											</tr>
											<tr>
												<td><b>Funnels</b></td>
												<td>{{ get_funnel_status('funnel_limit') }}</td>
											</tr>
											<tr>
												<td><b>Pages</b></td>
												<td>{{ get_funnel_status('page_limit') }}</td>
											</tr>
										</tbody>

									</table>
								</div>
								<hr>
					        </div>

					        <div class="col-md-4">
	        					<div class="table-responsive">
									<label>Autoresponder</label>
									<table class="table mb-none borderless">

										<tbody>
											<tr>
												<td><b>Subscribers/month</b></td>
												<td>{{ get_funnel_status('subscriber_limit') }}</td>
											</tr>
											<tr>
												<td><b>Email/month</b></td>
												<td>{{ get_funnel_status('email_limit') }}</td>
											</tr>
										</tbody>

									</table>
								</div>
								<hr>
					        </div>

					        <div class="col-md-4">
	        					<div class="table-responsive">
									<label>Visitor</label>
									<table class="table mb-none borderless">

										<tbody>
											<tr>
												<td><b>Unique Visitor/month</b></b></td>
												<td>{{ get_funnel_status('visitor_limit') }}</td>
											</tr>
										</tbody>

									</table>
								</div>
								<hr>
					        </div>
					        <br><br><br><br><br><br><br><br>

					        <div class="col-md-4 pull-left">
	        					<div class="table-responsive">
									<label>Status Watermark</label>
									<span class="stats-title"><h5>Watermark Removal : {{ get_funnel_status('status_watermark') }}</h5></span>
									<span class="stats-title"><h5>Affiliate Rotation : {{ get_funnel_status('status_affiliate_rotation') }} <i class="fa fa-question-circle" rel="tooltip" title="Affiliate Rotation digunakan untuk merotasi affiliate id apabila visitor mengunjungi scoido.com/tanpa_id
Fasilitas ini hanya tersedia untuk Scoido Master keatas."></i></h5></span>
								</div>
								<hr>
					        </div>

				       		<div class="col-md-4">
	        					<div class="table-responsive">
									<label>Affiliate Commission</label>
									<table class="table mb-none borderless">
										<tbody>
											<tr>
												<td><b>1st Gen</b></td>
												<td>{{ get_funnel_status('gen_one') }}</td>
											</tr>
											<tr>
												<td><b>2nd Gen</b></td>
												<td>{{ get_funnel_status('gen_two') }}</td>
											</tr>
											<tr>
												<td><b>3rd Gen</b></td>
												<td>{{ get_funnel_status('gen_three') }}</td>
											</tr>
											<tr>
												<td><b>4th Gen</b></td>
												<td>{{ get_funnel_status('gen_four') }}</td>
											</tr>
										</tbody>
									</table>
								</div>
								<hr>
					        </div>

				        </div>
				        {!! $content_upgrade_or_downgrade_plan !!}

					</div>
				</section>
				<section class="toggle">
					<label>Account Closure</label>
					<div class="toggle-content">
						<h3>Cancel My Account</h3>
						<p><span class="text-danger">Note</span> : Apabila Anda menutup account Anda, harap diperhatikan bahwa penutupan bersifat permanen.</p>
						<p>Funnels Name Anda akan ikut hilang dan dapat di claim oleh customer yang lain. Setiap Project Funnels dan pages yang telah dibuat akan hilang, begitu pula asset-asset seperti leads database, histori pembelian, video dan lain-lain didalamny</p>
						<p><a class="modal-with-form btn btn-danger" data-toggle="modal" data-target="#editCloseAccount">Close Account</a></p>
					</div>
				</section>
				<section class="toggle">
					<label>Invoice History</label>
					<div class="toggle-content">			            
			            <div class="form-group area-insert-update">
			                <div class="row">
			                    <div class="col-md-7">
			                        <label class="col-md-3 control-label">Filter By Date</label>
			                        <div class="col-md-9">
			                          <div class = " input-group">
			                             <span class ="input-group-addon"><i class="fa fa-calendar"></i></span>
			                            <input type="text" name="filter_start" class="form-control datepicker">
			                             <span class = "input-group-addon">To</span>
			                            <input type="text" name="filter_end" class="form-control datepicker">
			                          </div>
			                        </div>
			                    </div>
			                    <div class="col-md-3">
			                        <select class="col-md-2 dropdown form-control input-sm pull-left" id="filterCode" name="filterCode" onchange="javascript:showDataTablesOnChange()" required>
			                            <option value="all">All</option>
			                            @foreach($items as $item)
			                                <option value="{{$item->code}}">{{ucwords(str_replace('_', ' ', $item->code))}}</option>
			                            @endforeach
			                        </select>
			                    </div>
			                </div>
			            </div>
			            <table id="transaction-historys-table" class="table table-hover table-bordered table-condensed table-responsive" data-tables="true">
			                <thead>
			                    <tr>
			                        <th class="center-align">No Transaction</th>
			                        <th class="center-align">Transaction</th>
			                        <th class="center-align">Value</th>
			                        <th class="center-align">Admin Fee</th>
			                        <th class="center-align">Date</th>
			                        <!-- <th class="center-align">Payment</th> -->
			                        <th class="center-align">Status</th>
			                    </tr>
			                </thead>
			            </table>
					</div>
				</section>
			</div>
		</div>
	</div>

  <!-- modal register -->
  <div class="modal fade modal-getstart" id="editBankAccount" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Edit Bank Account</h4>
        </div>
        <div class="modal-body">
		{!! Form::open($form) !!}

                <div class="errorsMessageEditBankAccount">

                </div>
                <div class="alert-sending-otp">
                </div>
                <div class="form-group{{ Form::hasError('bank') }}">
                    <label class="col-md-4 control-label">Bank <b class="text-danger">*</b></label>
                    <div class="col-md-8">
                        <select class="select-bank" name="bank" style="width:100%">
							{!! $content_bank_option !!}
						</select>
                        <p class="has-error text-danger bank"></p>
                    </div>
                </div>

                <div class="form-group{{ Form::hasError('bank_account_number') }}">
                    <label class="col-md-4 control-label">Bank Account Number <b class="text-danger">*</b></label>
                    <div class="col-md-8">
                        {!! Form::text('bank_account_number', user_info('bank_account_number'), ['class' => 'form-control']) !!}
                        <p class="has-error text-danger bank_account_number"></p>
                    </div>
                </div>

                <div class="form-group{{ Form::hasError('bank_branch') }}">
                    <label class="col-md-4 control-label">Branch <b class="text-danger">*</b></label>
                    <div class="col-md-8">
                        {!! Form::text('bank_branch', user_info('bank_branch'), ['class' => 'form-control']) !!}
                        <p class="has-error text-danger bank_branch"></p>
                    </div>
                </div>

                <div class="form-group{{ Form::hasError('account_name_holder') }}">
                    <label class="col-md-4 control-label">Account Name Holder <b class="text-danger">*</b></label>
                    <div class="col-md-8">
                      <div class = "input-group">
                        {!! Form::text('account_name_holder', user_info('account_name_holder'), ['class' => 'form-control']) !!}
                         <span class = "input-group-addon"><i class="fa fa-question-circle" rel="tooltip" title="Nama harus sesuai dengan KTP pemilik account yang masih berlaku."></i></span>
                      </div>
                        <p class="has-error text-danger account_name_holder"></p>
                    </div>
                </div>

                <div class="form-group">
                    <center>
                        {!! Form::submit('Save', ['class' => 'btn btn-primary', 'title' => 'Save']) !!}&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-default modal-dismiss" type="button" data-dismiss="modal" aria-label="Close" styl>Cancel</button>
                    </center>
                </div>
            {!! Form::close() !!}
        </div>

      </div>
    </div>
  </div>
  <!-- modal register -->
  <div class="modal fade modal-getstart" id="editCloseAccount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
        </div>
        		<div class="modal-body">
			{!! Form::open($form) !!}
					<input type="hidden" name="close_account" value="true">
		           	<p class="text-center"> <b>Are you sure</b> you want to <b>close your account</b>?</p>
					<p class="text-center">This <b>will</b> result in all your projects and stats being deleted,
					and this action cannot be undone!</p>

                <div class="form-group">
                    <label class="col-md-3 control-label">Reason <b class="text-danger">*</b></label>
                    <div class="col-md-9">
                        {!! Form::textarea('reason', '', ['class' => 'form-control']) !!}
                        <p class="has-error text-danger reason"></p>
                    </div>
                </div>	
                <div class="form-group" style="margin-bottm:15px">
					<div class="row">
						<div class="col-md-12 text-center">
								{!! Form::submit('Yes', ['class' => 'btn btn-danger', 'title' => 'Close','data'=>'']) !!}
                   				<button class="btn btn-default modal-dismiss" type="button" data-dismiss="modal" aria-label="Close">No</button>
						</div>
					</div>
                </div>
            {!! Form::close() !!}
				</div>
        </div>

      </div>
    </div>
  </div>
  <!-- modal register -->
  <div class="modal fade modal-with-form-otp" id="modal-with-form-otp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Please fill your OTP code to continue</h4>
        </div>
        <div class="modal-body">
			{!! Form::open($form) !!}
                <div class="errorsMessageOtpCode">

                </div>

                <div class="form-group{{ Form::hasError('email') }}">
                    <label class="col-md-3 control-label">OTP Code <b class="text-danger">*</b></label>
                    <div class="col-md-6">
                        {!! Form::text('otp_code', '', ['class' => 'form-control']) !!}
                    	<p class="text-danger"><small>Please Check Your Email</small></p>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('', '', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">

                    {!! Form::submit('Confirm', ['class' => 'btn btn-primary', 'title' => 'Confirm']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>

      </div>
    </div>
  </div>
  <!-- modal register -->
  <div class="modal fade modal-getstart" id="modalFormOrder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title-order" id="myModalLabel">Top Up Coin</h4>
        </div>
        <div class="modal-body">
			{!! Form::open(['route'=>'member-scoido-market-post', 'files'=>true, 'class' => 'form-horizontal jquery-form-top-up-coin']) !!}
                <input type="hidden" name="method" id="method" value="create">
                <input type="hidden" name="code">
                <input type="hidden" name="value">
                <input type="hidden" name="coin_id">
                <input type="hidden" name="plan_id">
                <input type="hidden" name="quota_id">
                <div class="form-group payment-method-coin-area">
                    <center>Press Save Button For Ok.</center>
                </div>
                <div class="form-group payment-method-area">
                    <label class="col-md-3 control-label">Payment Method <b class="text-danger">*</b></label>
                    <div class="col-md-6">
                        <div class="radio-custom">
                            <input id="radioExample1" name="payment_method" type="radio" value="doku">
                            <label for="radioExample1">Doku</label>
                        </div>
                        <div class="radio-custom">
                            <input id="radioExample1" name="payment_method" type="radio" value="veritrans" checked>
                            <label for="radioExample1">Veritrans</label>
                        </div>
                        <p class="has-error text-danger edit-payment_method"></p>
                    </div>
                </div>


                <div class="form-group">
                    <center>
                        <button class="btn btn-primary btn-submit" type="button" onclick="javascript:order_submit()">Save</button>&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-default modal-dismiss" type="button" data-dismiss="modal" aria-label="Close" styl>Cancel</button>
                    </center>
                </div>
            {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@endsection

@section('header')
<style>

.pricing-table .most-popular {
	border-color: #0088cc;
}

.pricing-table .most-popular h3 {
	background-color: #0088cc !important;
}

.pricing-table.princig-table-flat .plan h3 {
	background-color: #0088cc;
}

.pricing-table.princig-table-flat .plan h3 span {
	background: #0088cc;
}
</style>
    {!! Html::style('assets/plugins/datatables/dataTables.bootstrap.css') !!}
    <link media="all" type="text/css" rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">
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

<script type="text/javascript">

   var transaction_history_table = $('#transaction-historys-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url : "{!! route('datatables-coin-transaction') !!}",
            data: function ( d ) {
               d.filter_start = $( 'input[name=filter_start]').val();
               d.filter_end = $( 'input[name=filter_end]' ).val();
               d.filterCode = $('#filterCode').val();
            }
        },
        columns: [
            {data: 'order_id', name: 'order_id'},
            {data: 'code', name: 'code'},
            {data: 'value', name: 'value'},
            {data: 'admin_fee', name: 'admin_fee'},
            {data: 'created_at', name: 'created_at'},/*
            {data: 'payment_method', name: 'payment_method'},*/
            {data: 'status', name: 'status'},

        ],
        "order": [[ 3, "desc" ]],
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print',{
            text: 'Text',
            action: function ( e, dt, node, config ) {
                $('#transaction-historys-table').tableExport({type:'txt',escape:'false',tableName:'Transaction-History'});
            }
        }
        ]
    });
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd'
    });
    $('.datepicker').on('change',function(){
        filter_start = $( 'input[name=filter_start]').val();
        filter_end = $( 'input[name=filter_end]' ).val();
        $("[name='link_top_up_coin_transaction_history_export_to_text']").val("{{ URL::to('coin/export') }}/txt/top_up_coin_transaction_history/"+filter_start+"/"+filter_end);
        if(filter_start != '' && filter_end != ''){
            transaction_history_table.draw();
        }
    });

    function showDataTablesOnChange(){
        transaction_history_table.draw();
    }
   	function show_form_upgrade_or_downgrade_plan(plan_id,value,code){
        $('[name=coin_id]').val(''),
        $('[name=plan_id]').val(plan_id),
        $('[name=quota_id]').val(''),
        $("[name='value']").val(value);
        $("[name='code']").val(code);
        if(code == "downgrade_plan"){
            var title = "Downgrade";
        }else{
            var title = "Upgrade";
        }
        $(".upgrade-downgrade-plan-area").show();
        $(".payment-method-coin-area").html('<center>Are You Sure Want To '+title+' Your Plan ?</center>');
        $(".payment-method-area").hide();
	    $('.modal-title-order').html(title);
	    $('.btn-submit').html(title);
		$('#modalFormOrder').modal({backdrop: 'static', keyboard: false});
		$('#modalFormOrder').modal('show');
   	}
		function order_submit(){
			$.ajax({
		        type: "POST",
		        url: "{{route('member-scoido-market-post')}}",
		        dataType:'json',
		        data: {
		        	action:"order_submit",
		        	payment_method : $('[name=payment_method]:checked').val(),
		        	value : $('[name=value]').val(),
		        	code : $('[name=code]').val(),
                    coin_id : $('[name=coin_id]').val(),
                    plan_id : $('[name=plan_id]').val(),
                    quota_id : $('[name=quota_id]').val(),
		        },
		        success: function(response)
		        {
		            if(response.status == 'success_veritrans'){
		            	window.location.href = response.redirect_url;
		            }else if(response.status == 'success_transfer'){
                        var myStack = {"dir1":"down", "dir2":"right", "push":"top"};
                        new PNotify({
                            title: "Success",
                            text: response.message,
                            type: 'success',
                            addclass: "stack-custom",
                            stack: myStack
                        });
                        window.location.reload();
                    }else{
                        var myStack = {"dir1":"down", "dir2":"right", "push":"top"};
                        new PNotify({
                            title: "Failed",
                            text: response.message,
                            type: 'danger',
                            addclass: "stack-custom",
                            stack: myStack
                        });
		            }
		        }
		    });
		}
</script>
<script>
	$('.jquery-form-edit-profile-completion').ajaxForm({
	    success: function(response) {
	    	if(response.indexOf('fill_otp_code_mode') >= 0){
		      		$('#modal-with-form-otp').modal('show');
		      		$('#editBankAccount').modal('hide');
		      		$('#editCloseAccount').modal('hide');
					var myStack = {"dir1":"down", "dir2":"right", "push":"top"};
						new PNotify({
						    title: "Success",
						    text: "Open Your Email For Get Otp Code",
							type: 'success',
						    addclass: "stack-custom",
						    stack: myStack
						});

	    	}else{
		      	if(response.indexOf('success_edit_bank_account') >= 0){
					$('.errorsMessageOtpCode').html('');
					$('.errorsMessageEditBankAccount').html('');
					$('.alert-sending-otp').html('');
		      		$('#modal-with-form-otp').modal('show');
		      		$('#editBankAccount').modal('hide');
				}else if(response.indexOf('success_close_account') >= 0){
					$('.errorsMessageOtpCode').html('');
					$('.errorsMessageCloseAccount').html('');
					$('.alert-sending-otp').html('');
		      		$('#modal-with-form-otp').modal('show');
		      		$('#editCloseAccount').modal('hide');
				}else if(response.indexOf('success_otp_code') >= 0){
					if(response.indexOf('success_otp_code_close_account') >= 0){
						var text_success = "Your Account Will Bee Closed, Wait Approval From Admin";
					}else if(response.indexOf('success_otp_code_edit_bank_account') >= 0){
						var text_success = "Bank Account Has Been Changed";
					}
					var myStack = {"dir1":"down", "dir2":"right", "push":"top"};
						new PNotify({
						    title: "Success",
						    text: text_success,
							type: 'success',
						    addclass: "stack-custom",
						    stack: myStack
						});
		       		$('#modal-with-form-otp').modal('hide');
					setTimeout(function(){
					   window.location.reload(1);
					}, 1500);
						$('.errorsMessageOtpCode').html('');
						$('.errorsMessageEditBankAccount').html('');
						$('.alert-sending-otp').html('');

				}else{

					if(response.indexOf('error_otp') >= 0){
						$('.errorsMessageOtpCode').html(response);
					}else{
						$('.errorsMessageEditBankAccount').html(response);
					}
				}
			}

	    },
		beforeSend: function() {
		  $('.has-error').html('');
		},
		error: function(response){
		  if (response.status === 422) {
		      var data = response.responseJSON;
		      $.each(data,function(key,val){
		          $('.'+key).html(val);
		      });
		  } else {
		      $('.error').addClass('alert alert-danger').html(response.responseJSON.message);
		  }
		}
	});

</script>

<script type="text/javascript">
$(".select-bank").val("{{ user_info('bank') }}");
$(".select-bank").select2({
            templateResult: formatState,
            templateSelection: formatState
        });
        function formatState (opt) {
            if (!opt.id) {
                return opt.text;
            }
            var optimage = $(opt.element).data('image');
            if(!optimage){
                return opt.text;
            } else {
                var $opt = $(
                    '<span><img src="' + optimage + '" width="23px" /> ' + opt.text + '</span>'
                );
                return $opt;
            }

        };
</script>
@endsection
