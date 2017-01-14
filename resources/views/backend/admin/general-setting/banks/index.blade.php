@extends('layout.backend.admin.master.master')

@section('title', 'Banks')

@section('breadcrumb')
    <ol class="breadcrumbs">
        <li><a href="{!! action('Backend\Admin\DashboardController@index') !!}"><i class="fa fa-home"></i> Home</a></li>
        <li><span>Banks</span></li>
    </ol>
@endsection
@section('page-header', 'Banks')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Bank s</h3>
        </div>
        <div class="panel-body">
            @include('flash::message')
            <a class="btn btn-primary pull-right"onclick="javascript:show_form_create()" title="Create"><i class="fa fa-plus fa-fw"></i></a>
            <br><br>
                <table id="banks-table" class="table table-hover table-bordered table-condensed table-responsive" data-tables="true">
                    <thead>
                        <tr>
                            <th class="center-align">Image</th>
                            <th class="center-align">Bank</th>
                            <th class="center-align">Clearing Code</th>
                            <th width="12%">&nbsp;</th>
                        </tr>
                    </thead>
                </table>
        </div>
    </div>
    
    <!-- modal register -->
  <div class="modal fade modal-getstart" id="modalFormBank" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title FormBank-title" id="myModalLabel">Create</h4>
        </div>
        <div class="modal-body">
        {!! Form::open(['route'=>'admin-post-bank', 'files'=>true, 'class' => 'form-horizontal jquery-form-bank']) !!}
                <input type="hidden" name="action" id="action" value="">      
                <input type="hidden" name="bank_id" value=""> 

                <div class="form-group area-insert-update">
                    <label class="col-md-3 control-label">Image <b class="text-danger">*</b></label>
                    <div class="col-md-9">
                        {!! form_input_file_img('file','image') !!}
                        <p class="has-error text-danger error-image"></p>
                    </div>
                </div>

                <div class="form-group area-insert-update">
                    {!! Form::label('bank', 'Bank', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::text('bank', '', ['class' => 'form-control']) !!}
                        <p class="has-error text-danger error-bank"></p>
                    </div>
                </div>
                
                <div class="form-group area-insert-update">
                    {!! Form::label('bank_clearing_code', 'Bank Clearing Code', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::text('bank_clearing_code', '', ['class' => 'form-control']) !!}
                        <p class="has-error text-danger error-bank_clearing_code"></p>
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
       var table = $('#banks-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{!! route('datatables-banks') !!}",
            columns: [
                {data: 'img_url', name: 'img_url'},
                {data: 'bank', name: 'bank'},
                {data: 'bank_clearing_code', name: 'bank_clearing_code'},
                {data: 'action', name: 'action', class: 'center-align', searchable: false, orderable: false}
            ]
        });
        function show_form_create(){           
            $('.FormBank-title').html('Create Bank ');
            $("[name='action']").val('create');
            $("[name='bank']").val('');
            $("[name='bank_clearing_code']").val('');
            $('.area-insert-update').show();
            $('.area-delete').hide();
            $('#modalFormBank').modal({backdrop: 'static', keyboard: false});
            $('#modalFormBank').modal('show');
        }
        function show_form_update(id){          
            $.ajax({
                type: "POST",
                url: "{{ route('admin-post-bank')}}",
                data: {
                    'id': id,
                    'action': 'get-data'
                },
                dataType: 'json',
                success: function(response)
                {                    
                    if(response.img_url != ''){
                        $('.fileinput-new.thumbnail.image').html('<img src="'+ response.img_url +'" style="width:100px;height:auto" class="img-circle img-responsive">');
                    }else{
                        $('.fileinput-new.thumbnail.image').html('<img src="{{ asset("assets/backend/porto-admin/images/!logged-user.jpg") }}" style="width:100px;height:auto" class="img-circle img-responsive">');
                    }
                    $("[name='bank_id']").val(response.id);
                    $("[name='bank']").val(response.bank);
                    $("[name='bank_clearing_code']").val(response.bank_clearing_code);
                }
            });
            $('.area-insert-update').show();
            $('.area-delete').hide();
            $('.FormBank-title').html('Update Bank ');
            $("[name='action']").val('edit');
            $('#modalFormBank').modal({backdrop: 'static', keyboard: false});
            $('#modalFormBank').modal('show');
        }
        function show_form_delete(id){  
            $("[name='bank_id']").val(id);
            $('.area-insert-update').hide();
            $('.area-delete').show();
            $('.FormBank-title').html('Delete Bank ');
            $("[name='action']").val('delete');
            $('#modalFormBank').modal({backdrop: 'static', keyboard: false});
            $('#modalFormBank').modal('show');
        }

            $('.jquery-form-bank').ajaxForm({
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
                    $('#modalFormBank').modal('hide'); 
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
                    $("#modalFormBank").scrollTop(0);
                  } else {
                      $('.error').addClass('alert alert-danger').html(response.responseJSON.message);
                  }
                }
            }); 
    </script>
    @include('backend.delete-modal-datatables')
@endsection