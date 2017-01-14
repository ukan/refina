@extends('layout.backend.admin.master.master')

@section('title', 'Email SMTP')

@section('breadcrumb')
    <ol class="breadcrumbs">
        <li><a href="{!! action('Backend\Admin\DashboardController@index') !!}"><i class="fa fa-home"></i> Home</a></li>
        <li><span>Config</span></li>
    </ol>
@endsection
@section('page-header', 'Email SMTP Config')

@section('content')
@include('frontend.member.profile.partials.cover')
<div class="tabs tabs-primary">
        <ul class="nav nav-tabs">
            <li>
                <a href="{{ route('member-profile') }}"><i class="fa fa-info"></i> Personal Information</a>
            </li>
            <li>
                <a href="{{ route('member-profile-profile-completion') }}"><i class="fa fa-check"></i> Billing & Plan</a>
            </li>           
            <li>
                <a href="{{ route('member-profile-change-password') }}"><i class="fa fa-edit"></i> Change Password</a>
            </li>
            <li class="active">
                <a><i class="fa fa-wrench"></i> Smtp</a>
            </li>
        </ul>
        <div class="tab-content">
        @if(user_info('plan_id') == plan_id('code','ghost'))
            <center><h4>Sorry, This feature not avaible for Ghost</h4></center>
        @else
            <a class="btn btn-primary pull-right" href="javascript:show_form_add()" title="Add"><i class="fa fa-plus fa-fw"></i></a>
            <br><br>
            <table id="mail-smtp-table" class="table table-hover table-bordered table-condensed table-responsive" data-tables="true">
                <thead>
                    <tr>
                        <th class="center-align">Host</th>
                        <th class="center-align">Port</th>
                        <th class="center-align">Username</th>
                        <th class="center-align">Status</th>
                        <th width="12%">&nbsp;</th>
                    </tr>
                </thead>
            </table>
            <div style="height:200px">&nbsp;</div>
        @endif
    </div>
</div>

<div class="modal fade modal-getstart" id="modalFormMailSmtp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title modalFormMailSmtp-title">Add</h4>
        </div>
        <div class="modal-body">
        {!! Form::open(['route'=>'member-general-setting-smtp-post', 'files'=>true, 'class' => 'form-horizontal jquery-form-general-setting-smtp']) !!}
                <input type="hidden" name="action" id="action" value="config">    
                <input type="hidden" name="mail_smtp_id" value="{{$mail_smtp_id}}"> 

                <div class="form-group area-insert-update">
                    {!! Form::label('status', 'Is Actived', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-6">
                        <select name="status" class="select2">
                            <option value="on"> On</option>
                            <!-- <option value="mail"> Mail</option> -->
                            <option value="off"> Off</option>
                            <!-- <option value="ses"> Ses</option> -->
                            <!-- <option value="sparkpost"> Sparkpost</option> -->
                            <!-- <option value="log"> log</option> -->
                        </select>                        
                        <p class="has-error text-danger error-status"></p>
                    </div>
                </div>
                <div class="form-group area-insert-update status-on">
                    {!! Form::label('driver', 'Driver', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-6">
                        <select name="driver" class="select2">
                            <option value="smtp"> Gmail Smtp</option>
                            <!-- <option value="mail"> Mail</option> -->
                            <option value="sendmail"> Sendmail</option>
                            <option value="mailgun"> Mailgun</option>
                            <option value="mandrill"> Mandrill</option>
                            <!-- <option value="ses"> Ses</option> -->
                            <!-- <option value="sparkpost"> Sparkpost</option> -->
                            <!-- <option value="log"> log</option> -->
                        </select>
                        <p class="has-error text-danger error-driver"></p>
                    </div>
                </div>

                <div class="form-group area-insert-update status-on">
                    {!! Form::label('sender_name', 'Sender Name', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::text('sender_name', $sender_name, ['class' => 'form-control']) !!}
                        <p class="has-error text-danger error-sender_name"></p>
                    </div>
                </div>

                <div class="form-group area-insert-update status-on">
                    {!! Form::label('host', 'Host', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::text('host', $host, ['class' => 'form-control']) !!}
                        <p class="has-error text-danger error-host"></p>
                    </div>
                </div>

                <div class="form-group area-insert-update status-on">
                    {!! Form::label('port', 'Port', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::text('port', $port, ['class' => 'form-control']) !!}
                        <p class="has-error text-danger error-port"></p>
                    </div>
                </div>

                <div class="form-group area-insert-update status-on">
                    {!! Form::label('username', 'Username', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::text('username', $username, ['class' => 'form-control']) !!}
                        <p class="has-error text-danger error-username"></p>
                    </div>
                </div>

                <div class="form-group area-insert-update status-on">
                    {!! Form::label('password', 'Password', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-6">
                        <input type="password" name="password" class="form-control" value="{{ $password }}">
                        <p class="has-error text-danger error-password"></p>
                    </div>
                </div>

                <div class="form-group area-insert-update status-on domain-area">
                    {!! Form::label('domain', 'Domain', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::text('domain', $domain, ['class' => 'form-control']) !!}
                        <p class="has-error text-danger error-domain"></p>
                    </div>
                </div>

                <div class="form-group area-insert-update status-on key-area">
                    {!! Form::label('key', 'Key', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::text('key', $key, ['class' => 'form-control']) !!}
                        <p class="has-error text-danger error-key"></p>
                    </div>
                </div>

                <div class="form-group area-insert-update status-on secret-area">
                    {!! Form::label('secret', 'Secret', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::text('secret', $secret, ['class' => 'form-control']) !!}
                        <p class="has-error text-danger error-secret"></p>
                    </div>
                </div>


                <div class="form-group area-insert-update">
                    <div class="row">
                        <div class="col-md-3">
                            &nbsp;
                        </div>
                        <div class="col-md-6">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary btn-submit', 'title' => 'Save']) !!}&nbsp;&nbsp;&nbsp;
                        </div>
                    </div>
                </div>

                <div class="form-group area-delete">                    
                    <div class="col-md-12">
                         <center>Are You Sure for Delete This Mail Smtp ?</center>
                    </div>
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
@endsection

@section('scripts')
    {!! Html::script('assets/plugins/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('assets/plugins/datatables/dataTables.bootstrap.min.js') !!}
  
    <script type="text/javascript">
            $(".select2").select2();
            $(".select2").val('{{$driver}}');
            function close_field_for_service_specifications(){
                $(".domain-area").hide();
                $(".key-area").hide();
                $(".secret-area").hide();
            }
            $(".select2[name='driver']").on('change',function(){
                val = $(".select2[name='driver']").val();  
                close_field_for_service_specifications();
                if(val == 'mandrill'){
                    $(".secret-area").show();
                }else if(val == 'mailgun'){
                    $(".domain-area").show();
                    $(".secret-area").show();
                    $("[name='host']").val('smtp.mailgun.org');                    
                }else if(val == 'ses'){
                    $(".key-area").show();
                    $(".secret-area").show();
                }else if(val == 'sparkpost'){
                    $(".secret-area").show();
                }else{
                    $("[name='host']").val('smtp.gmail.com');
                }
            });
            $( ".select2[name='status']" ).change(function() {
                val = $(".select2[name='driver']").val();  
                if($(".select2[name='status']").val() == 'on'){
                    $(".status-on").show();   
                    close_field_for_service_specifications(); 
                    if(val == 'mandrill'){
                    $(".secret-area").show();
                    }else if(val == 'mailgun'){
                        $(".domain-area").show();
                        $(".secret-area").show();
                    }else if(val == 'ses'){
                        $(".key-area").show();
                        $(".secret-area").show();
                    }else if(val == 'sparkpost'){
                        $(".secret-area").show();
                    }
                }else{
                    $(".status-on").hide();        
                }
            });


            close_field_for_service_specifications();
        var table = $('#mail-smtp-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{!! route('datatables-general-setting-smtp') !!}",
            columns: [
                {data: 'host', name: 'host'},
                {data: 'port', name: 'port'},
                {data: 'username', name: 'username'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', class: 'center-align', searchable: false, orderable: false}
            ]
        });
        function show_form_add(){           
            $(".select2[name='status']").val('on').change();
            $(".select2[name='driver']").val('smtp').change();
            $('.modalFormMailSmtp-title').html('Add Mail Smtp');
            $('.image-block').html('');
            $("[name='action']").val('create');
            $("[name='username']").val('');
            $("[name='password']").val('');
            $("[name='mail_smtp_id']").val('');
            $('.area-insert-update').show();
            $('.area-delete').hide();
            $('#modalFormMailSmtp').modal({backdrop: 'static', keyboard: false});
            $('#modalFormMailSmtp').modal('show');
            close_field_for_service_specifications();
        }
        function show_form_edit(id){            
            $.ajax({
                type: "POST",
                url: "{{ route('member-general-setting-smtp-post')}}",
                data: {
                    'id': id,
                    'action': 'get-data'
                },
                dataType: 'json',
                success: function(response)
                {
                    $(".select2[name='status']").val(response.status).change();
                    $(".select2[name='driver']").val(response.driver).change();
                    $("[name='host']").val(response.host);
                    $("[name='port']").val(response.port);
                    $("[name='username']").val(response.username);
                    $("[name='password']").val(response.password);
                    $("[name='status']").val(response.status);
                    $("[name='driver']").val(response.driver);
                    $("[name='key']").val(response.key);
                    $("[name='secret']").val(response.secret);
                    $("[name='domain']").val(response.domain);
                }
            });                    
            $("[name='mail_smtp_id']").val(id);
            $('.area-insert-update').show();
            $('.area-delete').hide();
            $('.modalFormMailSmtp-title').html('Edit Mail Smtp');
            $("[name='action']").val('edit');
            $('#modalFormMailSmtp').modal({backdrop: 'static', keyboard: false});
            $('#modalFormMailSmtp').modal('show');
        }
        function show_form_delete(id){                    
            $("[name='mail_smtp_id']").val(id);
            $('.area-insert-update').hide();
            $('.area-delete').show();
            $('.image-block').html('');
            $("[name='img_url']").val('');
            $("[name='code']").val('');
            $("[name='name']").val('');
            $("[name='qty']").val('');
            $("[name='price']").val('');
            $("[name='weight']").val('');
            $('.modalFormMailSmtp-title').html('Delete Mail Smtp');
            $("[name='action']").val('delete');
            $('#modalFormMailSmtp').modal({backdrop: 'static', keyboard: false});
            $('#modalFormMailSmtp').modal('show');
        }
            @if($status == '')
            $(".status-on").hide();
            @endif
            $('.jquery-form-general-setting-smtp').ajaxForm({
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
                    
                    $('#modalFormMailSmtp').modal('hide');
                    table.ajax.reload();
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
                    $("#modalFormAutoresponseEmail").scrollTop(0);
                  } else {
                    var myStack = {"dir1":"down", "dir2":"right", "push":"top"};
                        new PNotify({
                            title: "Failed",
                            text: "Your Configuration Not Valid",
                            type: 'danger',
                            addclass: "stack-custom",
                            stack: myStack
                        });
                  }
                }
            }); 
    </script>
@endsection