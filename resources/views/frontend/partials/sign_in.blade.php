@extends('layout.frontend.auth.auth_template')

@section('content')
    
    
    <div class="panel-title-sign mt-xl text-right">
        <h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
    </div>
    <div class="panel-body">
    @include('flash::message')
    @if (Session::has('notice'))
      <div class="alert alert-info">{!! Session::get('notice') !!}</div>
    @endif
        {!! Form::open($form) !!}
            <input type="hidden" name="type" value="member">
            <div class="form-group mb-lg">
                <label>Email <b class="text-danger">*</b></label>
                <div class="input-group input-group-icon">
                    {!! Form::text('email', Session::get('field_email'), ['class' => 'form-control input-lg', 'placeholder' => 'Email']) !!}
                    <span class="input-group-addon">
                        <span class="icon icon-lg">
                            <i class="fa fa-envelope"></i>
                        </span>
                    </span>
                </div>
            </div>            
            <div class="form-group{{ Form::hasError('email') }} has-feedback">
                {!! Form::errorMsg('email') !!}
            </div>
            <div class="form-group mb-lg">
                <div class="clearfix">
                    <label class="pull-left">Password <b class="text-danger">*</b></label>
                    
                </div>
                <div class="input-group input-group-icon">
                    <input type="password" name="password" class="form-control input-lg" value="{{ Session::get('field_password') }}" placeholder="Password">
                    <span class="input-group-addon">
                        <span class="icon icon-lg">
                            <i class="fa fa-lock"></i>
                        </span>
                    </span>
                </div>
            </div>
            <div class="form-group{{ Form::hasError('password') }} has-feedback">
                                    {!! Form::errorMsg('password') !!}
            </div>
                <a href="{!! route('reset-password') !!}">Forgot Password?</a>
            <div class="row">
                <div class="col-sm-8">
                    <div class="checkbox-custom checkbox-default">
                        @if(Session::get('field_email') != '')
                        {!! Form::checkbox('remember_me',1,true) !!}
                        @else
                        {!! Form::checkbox('remember_me') !!}
                        @endif
                        <label for="RememberMe">Remember Me</label>
                    </div>
                </div>
                <div class="col-sm-4 text-right">
                    {!! Form::submit('Sign In', ['class' => 'btn btn-primary hidden-xs', 'Sign In']) !!}
                    {!! Form::submit('Sign In', ['class' => 'btn btn-primary btn-block btn-lg visible-xs mt-lg', 'Sign In']) !!}
                </div>
            </div>

            @if(Request::fullUrl() == route('admin-login-member'))
            <span class="mt-lg mb-lg line-thru text-center text-uppercase">
                <span>or</span>
            </span>

            <div class="mb-xs text-center">
                <a href="{{ route('callback-sosmed','facebook') }}" class="btn btn-facebook mb-md ml-xs mr-xs">Connect with <i class="fa fa-facebook"></i></a>
                <a href="{{ route('callback-sosmed','google') }}" class="btn btn-danger mb-md ml-xs mr-xs">Connect with <i class="fa fa-google"></i></a>
            </div>
            @endif
            <p class="text-center">Don't have an account yet? <a href="{{ route('sign_up') }}">Sign Up!</a></p>

        {!! Form::close() !!}
    </div>

@endsection