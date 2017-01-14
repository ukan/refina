@extends("layout.frontend.auth.auth_template")

@section("content")
    <div class="panel-title-sign mt-xl text-right">
        <h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-user mr-xs"></i> Reset Password</h2>
    </div>
    <div class="panel-body">
    @if (Session::has('error'))
      <div class="alert alert-danger">{!! Session::get('error') !!}</div>
    @endif

    {!! Form::open(array('url' => 'process-reset-password', 'class' => 'form-horizontal', 'role' => 'form')) !!}
      <div class="form-group">
          <label class="col-lg-4 control-label">Email <b class="text-danger">*</b></label>
        <div class="col-lg-8">
          {!! Form::text('email', null, array('class' => 'form-control', 'autofocus' => true)) !!}
          {!! $errors->first('email') !!}
        </div>
        <div class="clear"></div>
      </div>
      <div class="form-group">
        <div class="col-lg-4"></div>
        <div class="col-lg-8">
          {!! Form::submit('Send Reset Instruction', array('class' => 'btn btn-primary')) !!}
        </div>
        <div class="clear"></div>
      </div>
    {!! Form::close() !!}
    </div>

@stop