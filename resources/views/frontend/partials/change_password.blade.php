@extends("layout.frontend.auth.auth_template")

@section("content")

    <div class="panel-title-sign mt-xl text-right">
        <h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-user mr-xs"></i> Change Password</h2>
    </div>
    <div class="panel-body">
    @if (Session::has('notice'))
      <div class="alert alert-info">{!! Session::get('notice') !!}</div>
    @endif
  {!! Form::open(['url' => 'process-change-password/'.$forgot_token, 'class' => 'form-horizontal', 'role' => 'form']) !!}

     <div class="form-group">

          <label class="col-lg-4 control-label">Password <b class="text-danger">*</b></label>

       <div class="col-lg-8">

         {!! Form::password('password', array('class' => 'form-control')) !!}

         {!! $errors->first('password') !!}

       </div>

      <div class="clear"></div>

    </div>

    <div class="form-group">
          <label class="col-lg-4 control-label">Password Confirm <b class="text-danger">*</b></label>

      <div class="col-lg-8">

        {!! Form::password('password_confirmation', array('class' => 'form-control')) !!} 

      </div>

      <div class="clear"></div>

    </div>

    <div class="form-group">

      <div class="col-lg-4"></div>

      <div class="col-lg-8">

        {!! Form::submit('Update Password', array('class' => 'btn btn-primary')) !!}

      </div>

      <div class="clear"></div>

    </div>

  {!! Form::close() !!}
    </div>

@stop