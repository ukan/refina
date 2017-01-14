@extends('layout.frontend.auth.auth_template')

@section('content')
    <div class="panel-title-sign mt-xl text-right">
        <h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-user mr-xs"></i> Sign Up</h2>
    </div>
    <div class="panel-body">
    @include('flash::message')
        {!! Form::open($form) !!}
            <input type="hidden" name="type" value="member">
            <input type="hidden" name="upline_id" value="{{ $upline_id }}">
            <div class="form-group">
                <label>First Name <b class="text-danger">*</b></label>
                <div class="input-group input-group-icon">
                    {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'First Name']) !!}
                    <span class="input-group-addon">
                        <span class="icon">
                            <i class="fa fa-user"></i>
                        </span>
                    </span>
                </div>
            </div>   
            <div class="form-group{{ Form::hasError('first_name') }} has-feedback">
                {!! Form::errorMsg('first_name') !!}
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <div class="input-group input-group-icon">
                    {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Last Name']) !!}
                    <span class="input-group-addon">
                        <span class="icon">
                            <i class="fa fa-user"></i>
                        </span>
                    </span>
                </div>
            </div>   
            <div class="form-group{{ Form::hasError('last_name') }} has-feedback">
                {!! Form::errorMsg('last_name') !!}
            </div> 
            <div class="form-group">
                <label>Email <b class="text-danger">*</b></label>
                <div class="input-group input-group-icon">
                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                    <span class="input-group-addon">
                        <span class="icon">
                            <i class="fa fa-envelope"></i>
                        </span>
                    </span>
                </div>
            </div>            
            <div class="form-group{{ Form::hasError('email') }} has-feedback">
                {!! Form::errorMsg('email') !!}
            </div>            
            <div class="form-group">
                <div class="clearfix">
                    <label class="pull-left">Password <b class="text-danger">*</b></label>                    
                </div>
                <div class="input-group input-group-icon">
                    <div id="pwd-container">
                        <div>
                            <div>
                                <input type="password" class="form-control password-meter" id="password" name="password" placeholder="Password">
                                <span class="input-group-addon">
                                    <span class="icon">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                </span>
                            </div>
                        </div>
                        <br><br>
                        <div>
                            <div class="pwstrength_viewport_progress"></div>
                        </div>
                    </div>
                </div>
                        <p class="text-helper">Min 8 Characters</p>
            </div>
            <div class="form-group{{ Form::hasError('password') }} has-feedback">
                {!! Form::errorMsg('password') !!}
            </div>
            <div class="form-group">
                <label>Phone <b class="text-danger">*</b></label>
                <div class="input-group input-group-icon">
                    {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Phone','maxlength' => 13]) !!}
                    <span class="input-group-addon">
                        <span class="icon">
                            <i class="fa fa-phone"></i>
                        </span>
                    </span>
                </div>
                        <p class="text-helper">Max 13 Digit</p>
            </div>            
            <div class="form-group{{ Form::hasError('phone') }} has-feedback">
                {!! Form::errorMsg('phone') !!}
            </div>

            <div class="form-group">
                <label>Gender <b class="text-danger">*</b></label>
                <div class="">
                    <div class="radio-custom">
                        <input id="radioExample1" name="gender" type="radio" value="male">
                        <label for="radioExample1">Male</label>
                    </div>
                    <div class="radio-custom">
                        <input id="radioExample1" name="gender" type="radio" value="female">
                        <label for="radioExample1">Female</label>
                    </div>
                </div>
            </div>   
            <div class="form-group{{ Form::hasError('gender') }} has-feedback">
                {!! Form::errorMsg('gender') !!}
            </div>
            <div class="form-group">
                <label>Date Of Birth <b class="text-danger">*</b></label>
                <div class="input-group input-group-icon">
                        {!! Form::text('date_of_birth', '', ['class' => 'form-control datepicker-birthday']) !!}
                    <span class="input-group-addon">
                        <span class="icon">
                            <i class="fa fa-calendar-o"></i>
                        </span>
                    </span>
                </div>
            </div>            
            <div class="form-group{{ Form::hasError('date_of_birth') }} has-feedback">
                {!! Form::errorMsg('date_of_birth') !!}
            </div>         
            {!! Recaptcha::render() !!}
            <br>
            <div class="form-group{{ Form::hasError('recaptcha_response_field') }} has-feedback">
                {!! Form::errorMsg('recaptcha_response_field') !!}
            </div>
            <div class="row">
                <div class="col-sm-8">
                </div>
                <div class="col-sm-4 text-right">
                    {!! Form::submit('Sign Up', ['class' => 'btn btn-primary hidden-xs', 'Sign Up']) !!}
                    {!! Form::submit('Sign Up', ['class' => 'btn btn-primary btn-block btn-lg visible-xs mt-lg', 'Sign Up']) !!}
                </div>
            </div>

            <span class="mt-lg mb-lg line-thru text-center text-uppercase">
                <span>or</span>
            </span>

            <div class="mb-xs text-center">
                <a href="{{ route('callback-sosmed','facebook') }}" class="btn btn-facebook mb-md ml-xs mr-xs">Connect with <i class="fa fa-facebook"></i></a>
                <a href="{{ route('callback-sosmed','google') }}" class="btn btn-danger mb-md ml-xs mr-xs">Connect with <i class="fa fa-google"></i></a>
            </div>

            <p class="text-center">Already have an account? <a href="{{ route('admin-login-member') }}">Sign In!</a></p>

        {!! Form::close() !!}
    </div>

@endsection
@section('heads')
@endsection

@section('scripts')
<script type="text/javascript">
      Date.prototype.yyyymmdd = function() {
      var mm = this.getMonth() + 1; // getMonth() is zero-based
      var dd = this.getDate();

      return [this.getFullYear(), !mm[1] && '0', mm, !dd[1] && '0', dd].join(''); // padding
    };

    var date = new Date();

      $(".datepicker-birthday").datepicker({
                format:"yyyy-mm-dd",
                endDate:date.yyyymmdd(),
    });
</script>
        {!! Html::script('assets/general/library/strength/jquery.2.x.x.js') !!}
        {!! Html::script('assets/general/library/strength/strength.js') !!}
    <script type="text/javascript">

        jQuery(document).ready(function () {
            "use strict";
            var options = {};
            options.ui = {
                container: "#pwd-container",
                showVerdictsInsideProgressBar: true,
                viewports: {
                    progress: ".pwstrength_viewport_progress"
                },
                progressBarExtraCssClasses: "progress-bar-striped active progress-bar-meter"
            };
            options.common = {
                debug: true,
                onLoad: function () {
                    $('#messages').text('Start typing password');
                }
            };
            $('.password-meter').pwstrength(options);
        });
    </script>
@endsection