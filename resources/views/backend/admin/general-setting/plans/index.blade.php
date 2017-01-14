@extends('layout.backend.admin.master.master')

@section('title', 'Plans')

@section('breadcrumb')
    <ol class="breadcrumbs">
        <li><a href="{!! action('Backend\Admin\DashboardController@index') !!}"><i class="fa fa-home"></i> Home</a></li>
        <li><span>Plans</span></li>
    </ol>
@endsection
@section('page-header', 'Plans')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Plans</h3>
        </div>
        <div class="panel-body">
            @include('flash::message')
            <a class="btn btn-primary pull-right"onclick="javascript:show_form_add()" title="Add"><i class="fa fa-plus fa-fw"></i></a>
            <br><br>
            <div class="table-responsive">
            <table id="plans-table" class="table table-hover table-bordered table-condensed table-responsive" data-tables="true">
                <thead>
                    <tr>
                        <th class="center-align">Name</th>
                        <th class="center-align">Price</th>
                        <th class="center-align">Usages</th>
                        <th class="center-align">Per Month</th>
<!--                         <th class="center-align">Hosting</th>
                        <th class="center-align">Product</th> -->
                        <th class="center-align">Status</th>
                        <th class="center-align">Membership Fee</th>
                        <th class="center-align">Generation</th>

                        <th width="12%">&nbsp;</th>
                    </tr>
                </thead>
            </table>
            </div>
        </div>
    </div>
    
    <!-- modal register -->
  <div class="modal fade modal-getstart" id="modalFormPlan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title FormPlan-title" id="myModalLabel">Add</h4>
        </div>
        <div class="modal-body">
        {!! Form::open(['route'=>'admin-post-plan', 'files'=>true, 'class' => 'form-horizontal jquery-form-plan']) !!}
                <input type="hidden" name="method" id="method" value="">      
                <input type="hidden" name="plan_id" value=""> 
                <div class="form-group area-insert-update">
                    <label class="col-md-3 control-label">Image <b class="text-danger">*</b></label>
                    <div class="col-md-9">
                        {!! form_input_file_img('file','image') !!}
                        <p class="has-error text-danger error-image"></p>
                    </div>
                </div>
                <div class="form-group area-insert-update">
                    {!! Form::label('name', 'Name', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::text('name', '', ['class' => 'form-control']) !!}
                        <p class="has-error text-danger error-name"></p>
                    </div>
                </div>

                <div class="form-group area-insert-update">
                    {!! Form::label('price', 'Price', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::text('price', '', ['class' => 'form-control']) !!}
                        <p class="has-error text-danger error-price"></p>
                    </div>
                </div>

                <div class="form-group area-insert-update">
                    {!! Form::label('funnel_usage', 'Funnel Usage', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::text('funnel_usage', '', ['class' => 'form-control','maxlength' => 5,'style' => 'width:100px']) !!}
                        <p class="has-error text-danger error-funnel_usage"></p>
                    </div>
                </div>

                <div class="form-group area-insert-update">
                    {!! Form::label('page_usage', 'Page Usage', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::text('page_usage', '', ['class' => 'form-control','maxlength' => 5,'style' => 'width:100px']) !!}
                        <p class="has-error text-danger error-page_usage"></p>
                    </div>
                </div>

                <div class="form-group area-insert-update">
                    {!! Form::label('visitors_per_month', 'Visitors Per Month', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::text('visitors_per_month', '', ['class' => 'form-control','maxlength' => 5,'style' => 'width:100px']) !!}
                        <p class="has-error text-danger error-visitors_per_month"></p>
                    </div>
                </div>

                <div class="form-group area-insert-update">
                    {!! Form::label('label_view_visitors_per_month', 'Label View Visitors Per Month', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::text('label_view_visitors_per_month', '', ['class' => 'form-control','style' => 'width:100px']) !!}
                        <p class="has-error text-danger error-label_view_visitors_per_month"></p>
                    </div>
                </div>

                <div class="form-group area-insert-update">
                    {!! Form::label('leads_per_month', 'Leads Per Month', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::text('leads_per_month', '', ['class' => 'form-control','maxlength' => 5,'style' => 'width:100px']) !!}
                        <p class="has-error text-danger error-leads_per_month"></p>
                    </div>
                </div>

                <div class="form-group area-insert-update">
                    {!! Form::label('broadcasts_per_month', 'BroadCast Per Month', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::text('broadcasts_per_month', '', ['class' => 'form-control','maxlength' => 5,'style' => 'width:100px']) !!}
                        <p class="has-error text-danger error-broadcasts_per_month"></p>
                    </div>
                </div>                

                <div class="form-group area-insert-update">
                    {!! Form::label('hosting', 'Hosting', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::text('hosting', '', ['class' => 'form-control','style' => 'width:100px']) !!}
                        <p class="has-error text-danger error-hosting"></p>
                    </div>
                </div>
                
                <div class="form-group area-insert-update">
                    {!! Form::label('product', 'Product', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::text('product', '', ['class' => 'form-control','maxlength' => 5,'style' => 'width:100px']) !!}
                        <p class="has-error text-danger error-product"></p>
                    </div>
                </div>
                
                <div class="form-group area-insert-update">
                    {!! Form::label('status_watermark', 'Status Watermark', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        <select name="status_watermark" class="select2" style="width:100px">
                            <option value="on">Yes</option>
                            <option value="off">No</option>
                        </select>   
                        <p class="has-error text-danger error-status_watermark"></p>
                    </div>
                </div>
                
                <div class="form-group area-insert-update">
                    {!! Form::label('status_affiliate_rotation', 'Status Affiliate Rotation', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        <select name="status_affiliate_rotation" class="select2" style="width:100px">
                            <option value="on">Yes</option>
                            <option value="off">No</option>
                        </select>   
                        <p class="has-error text-danger error-status_affiliate_rotation"></p>
                    </div>
                </div>
                
                <div class="form-group area-insert-update">
                    {!! Form::label('membership_fee', 'Membership Fee', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9"> 
                        {!! Form::text('membership_fee', '', ['class' => 'form-control','maxlength' => 10,'style' => 'width:100px']) !!}
                        <p class="has-error text-danger error-membership_fee"></p>
                    </div>
                </div>                

                <div class="form-group area-insert-update">
                    {!! Form::label('one_gen', 'One Gen', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::text('one_gen', '', ['class' => 'form-control','maxlength' => 5,'style' => 'width:100px']) !!}
                        <p class="has-error text-danger error-one_gen"></p>
                    </div>
                </div>
                
                <div class="form-group area-insert-update">
                    {!! Form::label('two_gen', 'Two Gen', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::text('two_gen', '', ['class' => 'form-control','maxlength' => 5,'style' => 'width:100px']) !!}
                        <p class="has-error text-danger error-two_gen"></p>
                    </div>
                </div>
                
                <div class="form-group area-insert-update">
                    {!! Form::label('three_gen', 'Three Gen', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::text('three_gen', '', ['class' => 'form-control','maxlength' => 5,'style' => 'width:100px']) !!}
                        <p class="has-error text-danger error-three_gen"></p>
                    </div>
                </div>

                <div class="form-group area-insert-update">
                    {!! Form::label('four_gen', 'Four Gen', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::text('four_gen', '', ['class' => 'form-control','maxlength' => 5,'style' => 'width:100px']) !!}
                        <p class="has-error text-danger error-four_gen"></p>
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
       var table = $('#plans-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{!! route('datatables-plans') !!}",
            columns: [
                {data: 'name', name: 'name'},
                {data: 'price', name: 'price'},
                {data: 'usages', name: 'usages'},
                {data: 'per_month', name: 'per_month'},
                // {data: 'hosting', name: 'hosting'},
                // {data: 'product', name: 'product'},
                {data: 'status', name: 'status'},
                {data: 'membership_fee', name: 'membership_fee'},
                {data: 'generation', name: 'generation'},
                {data: 'action', name: 'action', class: 'center-align', searchable: false, orderable: false}
            ]
        });
        function show_form_add(){           
            $('.FormPlan-title').html('Add Plan');
            $("[name='method']").val('add');
            $("[name='title']").val('');
            $("[name='content']").val('');
            $("[name='number_days']").val('');
            $("[name='time']").val('');
            $('.area-insert-update').show();
            $('.area-delete').hide();
            $('#modalFormPlan').modal({backdrop: 'static', keyboard: false});
            $('#modalFormPlan').modal('show');
        }
        function show_form_edit(id){          
            $.ajax({
                type: "POST",
                url: "{{ route('admin-post-plan')}}",
                data: {
                    'id': id,
                    'method': 'get-data'
                },
                dataType: 'json',
                success: function(response)
                {
                    if(response.img_url != ''){
                        $('.fileinput-new.thumbnail.image').html('<img src="'+ response.img_url +'" style="width:100px;height:auto" class="img-circle img-responsive">');
                    }else{
                        $('.fileinput-new.thumbnail.image').html('<img src="{{ asset("assets/backend/porto-admin/images/!logged-user.jpg") }}" style="width:100px;height:auto" class="img-circle img-responsive">');
                    }
                    $("[name='plan_id']").val(response.id);
                    $("[name='name']").val(response.name);
                    $("[name='price']").val(response.price);
                    $("[name='funnel_usage']").val(response.funnel_usage);
                    $("[name='page_usage']").val(response.page_usage);
                    $("[name='visitors_per_month']").val(response.visitors_per_month);
                    $("[name='leads_per_month']").val(response.leads_per_month);
                    $("[name='broadcasts_per_month']").val(response.broadcasts_per_month);
                    $("[name='hosting']").val(response.hosting);
                    $("[name='product']").val(response.product);
                    // $('select[name=status_watermark] option').removeAttr('selected');
                    // $('select[name=status_watermark] option[value='+response.status_watermark+']').attr('selected','selected');  
                    $('select[name=status_watermark]').val(response.status_watermark).change();
                    $('select[name=status_affiliate_rotation]').val(response.status_affiliate_rotation).change();
                    $("[name='membership_fee']").val(response.membership_fee);
                    $("[name='one_gen']").val(response.one_gen);
                    $("[name='two_gen']").val(response.two_gen);
                    $("[name='three_gen']").val(response.three_gen);
                    $("[name='four_gen']").val(response.four_gen);
                    $("[name='label_view_visitors_per_month']").val(response.label_view_visitors_per_month);

                }
            });
            $('.area-insert-update').show();
            $('.area-delete').hide();
            $('.FormPlan-title').html('Edit Plan');
            $("[name='method']").val('edit');
            $('#modalFormPlan').modal({backdrop: 'static', keyboard: false});
            $('#modalFormPlan').modal('show');
        }
        function show_form_delete(id){         
            $("[name='plan_id']").val(id);
            $('.area-insert-update').hide();
            $('.area-delete').show();
            $('.FormPlan-title').html('Delete Plan');
            $("[name='method']").val('delete');
            $('#modalFormPlan').modal({backdrop: 'static', keyboard: false});
            $('#modalFormPlan').modal('show');
        }

            $('.jquery-form-plan').ajaxForm({
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
                    $('#modalFormPlan').modal('hide'); 
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
                    $("#modalFormPlan").scrollTop(0);
                  } else {
                      $('.error').addClass('alert alert-danger').html(response.responseJSON.message);
                  }
                }
            }); 
    </script>
    @include('backend.delete-modal-datatables')
@endsection