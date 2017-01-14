@extends('layout.backend.admin.master.master')

@section('title', 'Coins')

@section('breadcrumb')
    <ol class="breadcrumbs">
        <li><a href="{!! action('Backend\Admin\DashboardController@index') !!}"><i class="fa fa-home"></i> Home</a></li>
        <li><span>Coins</span></li>
    </ol>
@endsection
@section('page-header', 'Coins')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Coins</h3>
        </div>
        <div class="panel-body">
            @include('flash::message')
            <a class="btn btn-primary pull-right"onclick="javascript:show_form_add()" title="Add"><i class="fa fa-plus fa-fw"></i></a>
            <br><br>
                <table id="coins-table" class="table table-hover table-bordered table-condensed table-responsive" data-tables="true">
                    <thead>
                        <tr>
                            <th class="center-align">Name</th>
                            <th class="center-align">Number Coin</th>
                            <th class="center-align">Price</th>
                            <th width="12%">&nbsp;</th>
                        </tr>
                    </thead>
                </table>
        </div>
    </div>
    
    <!-- modal register -->
  <div class="modal fade modal-getstart" id="modalFormCoin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title FormCoin-title" id="myModalLabel">Add</h4>
        </div>
        <div class="modal-body">
        {!! Form::open(['route'=>'admin-post-coin', 'files'=>true, 'class' => 'form-horizontal jquery-form-coin']) !!}
                <input type="hidden" name="method" id="method" value="">      
                <input type="hidden" name="coin_id" value=""> 

                <div class="form-group area-insert-update">
                    {!! Form::label('name', 'Name', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::text('name', '', ['class' => 'form-control']) !!}
                        <p class="has-error text-danger error-name"></p>
                    </div>
                </div>
                
                <div class="form-group area-insert-update">
                    {!! Form::label('number_coin', 'Number Coin', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::text('number_coin', '', ['class' => 'form-control']) !!}
                        <p class="has-error text-danger error-number_coin"></p>
                    </div>
                </div>

                <div class="form-group area-insert-update">
                    {!! Form::label('value', 'Price (IDR)', ['class' => 'col-md-3 control-label']) !!}
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
       var table = $('#coins-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{!! route('datatables-coins') !!}",
            columns: [
                {data: 'name', name: 'name'},
                {data: 'number_coin', name: 'number_coin'},
                {data: 'value', name: 'value'},
                {data: 'action', name: 'action', class: 'center-align', searchable: false, orderable: false}
            ]
        });
        function show_form_add(){           
            $('.FormCoin-title').html('Add Coin');
            $("[name='method']").val('add');
            $("[name='name']").val('');
            $("[name='number_coin']").val('');
            $("[name='value']").val('');
            $('.area-insert-update').show();
            $('.area-delete').hide();
            $('#modalFormCoin').modal({backdrop: 'static', keyboard: false});
            $('#modalFormCoin').modal('show');
        }
        function show_form_edit(id){          
            $.ajax({
                type: "POST",
                url: "{{ route('admin-post-coin')}}",
                data: {
                    'id': id,
                    'method': 'get-data'
                },
                dataType: 'json',
                success: function(response)
                {
                    $("[name='coin_id']").val(response.id);
                    $("[name='name']").val(response.name);
                    $("[name='number_coin']").val(response.number_coin);
                    $("[name='value']").val(response.value);
                }
            });
            $('.area-insert-update').show();
            $('.area-delete').hide();
            $('.FormCoin-title').html('Edit Coin');
            $("[name='method']").val('edit');
            $('#modalFormCoin').modal({backdrop: 'static', keyboard: false});
            $('#modalFormCoin').modal('show');
        }
        function show_form_delete(id){  
            $("[name='coin_id']").val(id);
            $('.area-insert-update').hide();
            $('.area-delete').show();
            $('.FormCoin-title').html('Delete Coin');
            $("[name='method']").val('delete');
            $('#modalFormCoin').modal({backdrop: 'static', keyboard: false});
            $('#modalFormCoin').modal('show');
        }

            $('.jquery-form-coin').ajaxForm({
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
                    $('#modalFormCoin').modal('hide'); 
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
                    $("#modalFormCoin").scrollTop(0);
                  } else {
                      $('.error').addClass('alert alert-danger').html(response.responseJSON.message);
                  }
                }
            }); 
    </script>
    @include('backend.delete-modal-datatables')
@endsection