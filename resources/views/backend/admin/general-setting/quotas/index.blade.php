@extends('layout.backend.admin.master.master')

@section('title', 'Quotas')

@section('breadcrumb')
    <ol class="breadcrumbs">
        <li><a href="{!! action('Backend\Admin\DashboardController@index') !!}"><i class="fa fa-home"></i> Home</a></li>
        <li><span>Quotas</span></li>
    </ol>
@endsection
@section('page-header', 'Quotas')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Quotas</h3>
        </div>
        <div class="panel-body">
            @include('flash::message')
            <a class="btn btn-primary pull-right"onclick="javascript:show_form_add()" title="Add"><i class="fa fa-plus fa-fw"></i></a>
            <br><br>
            <div class="table-responsive">
            <table id="quotas-table" class="table table-hover table-bordered table-condensed table-responsive" data-tables="true">
                <thead>
                    <tr>
                        <th class="center-align">Type</th>
                        <th class="center-align">Number Quota</th>
                        <th class="center-align">Coin</th>
                        <th width="12%">&nbsp;</th>
                    </tr>
                </thead>
            </table>
            </div>
        </div>
    </div>
    
    <!-- modal register -->
  <div class="modal fade modal-getstart" id="modalFormQuota" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title FormQuota-title" id="myModalLabel">Add</h4>
        </div>
        <div class="modal-body">
        {!! Form::open(['route'=>'admin-post-quota', 'files'=>true, 'class' => 'form-horizontal jquery-form-quota']) !!}
                <input type="hidden" name="method" id="method" value="">      
                <input type="hidden" name="quota_id" value=""> 
                <div class="form-group area-insert-update">
                    {!! Form::label('type', 'Type', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        <div class="radio-custom">
                            <input id="radioExample1" name="type" type="radio" value="funnels">
                            <label for="radioExample1">Funnels</label>
                        </div>
                        <div class="radio-custom">
                            <input id="radioExample1" name="type" type="radio" value="pages">
                            <label for="radioExample1">Pages</label>
                        </div>
                        <p class="has-error text-danger error-type"></p>
                    </div>
                </div>
                <div class="form-group area-insert-update">
                    {!! Form::label('number_quota', 'Number Quota', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::text('number_quota', '', ['class' => 'form-control']) !!}
                        <p class="has-error text-danger error-number_quota"></p>
                    </div>
                </div>
                <div class="form-group area-insert-update">
                    {!! Form::label('value', 'Coin', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::text('value', '', ['class' => 'form-control']) !!}
                        <p class="has-error text-danger error-value"></p>
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
       var table = $('#quotas-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{!! route('datatables-quotas') !!}",
            columns: [
                {data: 'type', name: 'type'},
                {data: 'number_quota', name: 'number_quota'},
                {data: 'value', name: 'value'},
                {data: 'action', name: 'action', class: 'center-align', searchable: false, orderable: false}
            ]
        });
        function show_form_add(){           
            $('.FormQuota-title').html('Add Quota');
            $("[name='method']").val('add');
            $("[name='value']").val('');
            $('.area-insert-update').show();
            $('.area-delete').hide();
            $('#modalFormQuota').modal({backdrop: 'static', keyboard: false});
            $('#modalFormQuota').modal('show');
        }
        function show_form_edit(id){          
            $.ajax({
                type: "POST",
                url: "{{ route('admin-post-quota')}}",
                data: {
                    'id': id,
                    'method': 'get-data'
                },
                dataType: 'json',
                success: function(response)
                {
                    $("[name='quota_id']").val(response.id);
                    $("[name='type'][value='"+response.type+"']").attr('checked',true);
                    $("[name='number_quota']").val(response.number_quota);
                    $("[name='value']").val(response.value);
                }
            });
            $('.area-insert-update').show();
            $('.area-delete').hide();
            $('.FormQuota-title').html('Edit Quota');
            $("[name='method']").val('edit');
            $('#modalFormQuota').modal({backdrop: 'static', keyboard: false});
            $('#modalFormQuota').modal('show');
        }
        function show_form_delete(id){          
            $("[name='quota_id']").val(id);
            $('.area-insert-update').hide();
            $('.area-delete').show();
            $('.FormQuota-title').html('Delete Quota');
            $("[name='method']").val('delete');
            $('#modalFormQuota').modal({backdrop: 'static', keyboard: false});
            $('#modalFormQuota').modal('show');
        }

            $('.jquery-form-quota').ajaxForm({
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
                    $('#modalFormQuota').modal('hide'); 
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
                    $("#modalFormQuota").scrollTop(0);
                  } else {
                      $('.error').addClass('alert alert-danger').html(response.responseJSON.message);
                  }
                }
            }); 
    </script>
    @include('backend.delete-modal-datatables')
@endsection