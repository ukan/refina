@extends('layout.backend.admin.master.master')

@section('title', 'BankAccounts')

@section('breadcrumb')
    <ol class="breadcrumbs">
        <li><a href="{!! action('Backend\Admin\DashboardController@index') !!}"><i class="fa fa-home"></i> Home</a></li>
        <li><span>BankAccounts</span></li>
    </ol>
@endsection
@section('page-header', 'BankAccounts')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Bank Accounts</h3>
        </div>
        <div class="panel-body">
            @include('flash::message')
            <a class="btn btn-primary pull-right"onclick="javascript:show_form_create()" title="Create"><i class="fa fa-plus fa-fw"></i></a>
            <br><br>
                <table id="bank-accounts-table" class="table table-hover table-bordered table-condensed table-responsive" data-tables="true">
                    <thead>
                        <tr>
                            <th class="center-align">Bank</th>
                            <th class="center-align">Bank Account Number</th>
                            <th class="center-align">Name Holder</th>
                            <th width="12%">&nbsp;</th>
                        </tr>
                    </thead>
                </table>
        </div>
    </div>
    
    <!-- modal register -->
  <div class="modal fade modal-getstart" id="modalFormBankAccount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title FormBankAccount-title" id="myModalLabel">Create</h4>
        </div>
        <div class="modal-body">
        {!! Form::open(['route'=>'admin-post-bank-account', 'files'=>true, 'class' => 'form-horizontal jquery-form-bank_account']) !!}
                <input type="hidden" name="action" id="action" value="">      
                <input type="hidden" name="bank_account_id" value=""> 

                <div class="form-group area-insert-update">
                    {!! Form::label('bank', 'Bank', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        <select class="select-bank" name="bank" style="width:100%">
							<option value="Mandiri" data-image="{{ asset('assets/general/images/bank/mandiri.png') }}">Mandiri</option>
							<option value="Bank Rakyat Indonesia (BRI)" data-image="{{ asset('assets/general/images/bank/bri.png') }}">Bank Rakyat Indonesia (BRI)</option>
							<option value="BRI Syariah" data-image="{{ asset('assets/general/images/bank/bri_syariah.png') }}">BRI Syariah</option>
							<option value="Bank Central Asia (BCA)" data-image="{{ asset('assets/general/images/bank/bca.jpeg') }}">Bank Central Asia (BCA)</option>
							<option value="BCA syariah" data-image="{{ asset('assets/general/images/bank/bca_syariah.png') }}">BCA syariah</option>
							<option value="Bank Negara Indonesia (BNI)" data-image="{{ asset('assets/general/images/bank/bni.jpeg') }}">Bank Negara Indonesia (BNI)</option>
							<option value="BNI Syariah" data-image="{{ asset('assets/general/images/bank/bni_syariah.png') }}">BNI Syariah</option>
							<option value="CIMB Niaga" data-image="{{ asset('assets/general/images/bank/cimb_niaga.jpg') }}">CIMB Niaga</option>
							<option value="Danamon" data-image="{{ asset('assets/general/images/bank/danamon.jpg') }}">Danamon</option>
							<option value="Permata" data-image="{{ asset('assets/general/images/bank/permata_bank.gif') }}">Permata</option>
							<option value="Panin" data-image="{{ asset('assets/general/images/bank/panin_bank.png') }}">Panin</option>
							<option value="Bank Jabar Banten (BJB)" data-image="{{ asset('assets/general/images/bank/bjb.png') }}">Bank Jabar Banten (BJB)</option>
							<option value="Panin Syariah" data-image="{{ asset('assets/general/images/bank/panin_bank_syariah.jpeg') }}">Panin Syariah</option>
							<option value="Bank Mega" data-image="{{ asset('assets/general/images/bank/bank_mega.png') }}">Bank Mega</option>
							<option value="Bank Mega Syariah" data-image="{{ asset('assets/general/images/bank/bank_mega_syariah.png') }}">Bank Mega Syariah</option>
						</select>
                        <p class="has-error text-danger error-bank"></p>
                    </div>
                </div>
                
                <div class="form-group area-insert-update">
                    {!! Form::label('bank_account_number', 'Bank Account Number', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::text('bank_account_number', '', ['class' => 'form-control']) !!}
                        <p class="has-error text-danger error-bank_account_number"></p>
                    </div>
                </div>

                <div class="form-group area-insert-update">
                    {!! Form::label('account_name_holder', 'Name Holder', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::text('account_name_holder', '', ['class' => 'form-control']) !!}
                        <p class="has-error text-danger error-account_name_holder"></p>
                    </div>
                </div>

                <div class="form-group area-delete">                    
                    <div class="col-md-12">
                         <center>Are You Sure for Delete This Data ?</center>
                    </div>
                </div>

                <div class="form-group area-insert-update">
                    <center>
                        {!! Form::submit('Save', ['class' => 'btn btn-primary btn-submit', 'title' => 'Save']) !!}&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-warning btn-reset" type="reset">Reset</button>&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-default btn-cancel modal-dismiss" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
                    </center>
                </div>
                <div class="form-group area-delete">
                    <center>
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-submit', 'title' => 'Delete']) !!}
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

    <style>
        .center-align {
            text-align: center;
        }
    </style>
        
@endsection
@section('scripts')
<script>
$(".select2").select2();
$('html').addClass(' sidebar-left-collapsed');
</script>
    {!! Html::script('assets/plugins/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('assets/plugins/datatables/dataTables.bootstrap.min.js') !!}

    <script>
        $(document).ready(function() {
        });

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
       var table = $('#bank-accounts-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{!! route('datatables-bank-accounts') !!}",
            columns: [
                {data: 'bank', name: 'bank'},
                {data: 'bank_account_number', name: 'bank_account_number'},
                {data: 'account_name_holder', name: 'account_name_holder'},
                {data: 'action', name: 'action', class: 'center-align', searchable: false, orderable: false}
            ]
        });
        function show_form_create(){           
            $('.FormBankAccount-title').html('Create Bank Account');
            $("[name='action']").val('create');
            $("[name='bank']").val('');
            $("[name='bank_account_number']").val('');
            $("[name='account_name_holder']").val('');
            $('.area-insert-update').show();
            $('.area-delete').hide();
            $('#modalFormBankAccount').modal({backdrop: 'static', keyboard: false});
            $('#modalFormBankAccount').modal('show');
        }
        function show_form_update(id){          
            $.ajax({
                type: "POST",
                url: "{{ route('admin-post-bank-account')}}",
                data: {
                    'id': id,
                    'action': 'get-data'
                },
                dataType: 'json',
                success: function(response)
                {
                    $("[name='bank_account_id']").val(response.id);
                    $("[name='bank']").val(response.bank).change();
                    $("[name='bank_account_number']").val(response.bank_account_number);
                    $("[name='account_name_holder']").val(response.account_name_holder);
                }
            });
            $('.area-insert-update').show();
            $('.area-delete').hide();
            $('.FormBankAccount-title').html('Update Bank Account');
            $("[name='action']").val('edit');
            $('#modalFormBankAccount').modal({backdrop: 'static', keyboard: false});
            $('#modalFormBankAccount').modal('show');
        }
        function show_form_delete(id){  
            $("[name='bank_account_id']").val(id);
            $('.area-insert-update').hide();
            $('.area-delete').show();
            $('.FormBankAccount-title').html('Delete Bank Account');
            $("[name='action']").val('delete');
            $('#modalFormBankAccount').modal({backdrop: 'static', keyboard: false});
            $('#modalFormBankAccount').modal('show');
        }

            $('.jquery-form-bank_account').ajaxForm({
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
                    table.ajax.reload();    
                    $('#modalFormBankAccount').modal('hide'); 
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
                    $("#modalFormBankAccount").scrollTop(0);
                  } else {
                      $('.error').addClass('alert alert-danger').html(response.responseJSON.message);
                  }
                }
            }); 
    </script>
    @include('backend.delete-modal-datatables')
@endsection