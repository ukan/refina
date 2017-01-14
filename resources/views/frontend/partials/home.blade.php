@extends('layout.frontend.master.master')

@section('title', 'Home')

@section('page-header', '')

@section('breadcrumb')
@endsection

@section('header')

        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
        <!-- {!! Html::style('assets/frontend/porto/css/scoido-home-up.css') !!} -->
        <!-- {!! Html::style('assets/frontend/porto/css/custom_lcw.css') !!} -->
<style>
[class*="mb_YTP"]{
  display:none !important;
}
.pwstrength_viewport_progress .progress{
  margin-bottom: 0px !important;
}
</style>
        {!! Html::style('assets/backend/porto-admin/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css') !!}
@endsection
@section('content')
        <div class="body">
          <header id="header" data-plugin-options='{"stickyEnabled": false, "stickyEnableOnBoxed": false, "stickyEnableOnMobile": true, "stickyStartAt": 57, "stickySetTop": "0", "stickyChangeLogo": true}'>
      <div class="header-body">
        <div class="header-container container">
          <div class="header-row">
            <div class="header-column">
              <div class="header-logo">
                <a href="{{ url('/') }}">
                  <img style="width: 100px; height: 30px" alt="Porto" data-sticky-width="82" data-sticky-height="40" data-sticky-top="33" class="img-responsive" src="{{ asset('assets/general/images/identity/logo.png') }}">
                  <!-- <h1>Scoido</h1> -->
                </a>
              </div>
            </div>
            <div class="header-column">

              <div class="header-row">
                <div class="header-nav">
                  <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main">
                    <i class="fa fa-bars"></i>
                  </button>
                  <ul class="header-social-icons social-icons hidden-xs">
                    @if(getOptionValue('facebook_url') != '')
                    <li class="social-icons-facebook"><a href="{{ getOptionValue('facebook_url') }}" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                    @endif
                    @if(getOptionValue('twitter_url') != '')
                    <li class="social-icons-twitter"><a href="{{ getOptionValue('twitter_url') }}" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                    @endif
                    @if(getOptionValue('linkedin_url') != '')
                    <li class="social-icons-linkedin"><a href="{{ getOptionValue('linkedin_url') }}" target="_blank" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                    @endif
                  </ul>
                  <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse">
                    <nav>
                      <ul class="nav nav-pills" id="mainNav">
                        <li>
                          <a target="_" href="#"></a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- <div role="main" class="main"> -->


        <!-- <div id="labsSection" class="slide-middle">
          <div id="revolutionSlider" class="slider rev_slider" data-plugin-revolution-slider data-plugin-options='{"delay": 9000, "gridwidth": 1170 "gridheight": 100%, "disableProgressBar": "on"}'>
            <ul>
              <li data-transition="fade">
                <img src="{{ asset('assets/frontend/porto/img/slides/slide-bg-full-6-dark.jpg')}}"
                     alt=""
                     data-bgposition="center center"
                     data-bgfit="cover"
                     data-bgrepeat="no-repeat"
                     class="rev-slidebg" data-no-retina>             
                <div class="tp-caption top-label"
                     data-x="155"
                     data-y="100"
                     data-start="500"
                     data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1000;e:Power2.easeOut;">
                </div> -->

      <div role="main" class="main">
            <div class="slider-container first-fold custom-first-fold">
                <div class="fold-entry">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="home-video">
                                
                                    <iframe width="560" height="315" src="" frameborder="0" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="fold-text">
                                    <h1 class="smt-headline">Title Video</h1>
                                    <h3 class="smt-title">Content</h3>
                                    <div class="fold-btn custom-fold-btn custom-fold-btn2">
                                    <a onclick="javascript:showRegisterUserForm()" class="btn btn-register">
                                        <i class="fa fa-arrow-right"></i> register now for free
                                    </a>
                                        <span>or</span>
                                        <div class="btn-group btn-group1">
                                            <a href="{{ route('callback-sosmed','facebook') }}" type="button" class="btn btn-default fb-connect"> connect with <i class="fa fa-facebook-f"></i>
                                            </a>
                                            <a href="{{ route('callback-sosmed','google') }}" type="button" class="btn btn-default g-connect"> connect with <i class="fa fa-google"></i>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- </li> -->
          <!-- </ul> -->
        <!-- </div> -->

      <!-- </div> -->

      <div class="home-intro">
        <div class="container">

          <div class="row">
            <div class="col-md-8">
              <p>
                Footer <em>Footer blue</em>
                <span>Content Footer</span>
              </p>
            </div>
            <div class="col-md-4">
              <div class="get-started">
                <a target="_" href="#" class="btn btn-lg btn-primary">Name Link</a>
              </div>
            </div>
          </div>
        </div>
      </div>            
  </div>

  <!-- modal register -->
  <div class="modal fade modal-getstart" id="registerUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="position: absolute;">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="loader loader-sign-up">
            <div class="loader-progress">
              <div class="smt1"></div>
              <div class="smt2"></div>
              <div class="smt3"></div>
              <div class="smt4"></div>
              <div class="smt5"></div>
            </div> 
        </div>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Register</h4>
        </div>
        <div class="modal-body">
          <div class="register-form">

        
      {!! Form::open($form) !!}
            <div class="alert-sending-confirmation"></div>
            <div class="errorsMessageSignUp"></div>
            <input type="hidden" name="ajax" value="ada">
            <input type="hidden" name="type" value="member">


              <div class="input-split " style="margin-bottom:15px;margin-left:0px">
                <div class="form-group">
                  <label>First Name <b class="text-danger">*</b></label>
                  <input type="text" name="first_name" class="form-control " />
                  <p class="has-error text-danger first_name"></p>
                </div>
                <div class="form-group">
                  <label>Last Name <b class="text-danger">*</b></label>
                  <input type="text" name="last_name" class="form-control " />
                  <p class="has-error text-danger last_name"></p>
                </div>

              </div>


              <div class="form-group" style="margin-left:0px;margin-right:0px">
                <label>Email <b class="text-danger">*</b></label>
                <input type="email" name="email" class="form-control " placeholder="" />
                  <p class="has-error text-danger email"></p>
              </div>
              <div class="form-group" style="margin-left:0px;margin-right:0px">
                <label>Password <b class="text-danger">*</b></label>                
                    <div id="pwd-container">
                        <div>
                            <div>
                                <input type="password" class="form-control password-meter" id="password" name="password" placeholder="Password">
                            </div>
                        </div>
                        <br>
                        <div>
                            <div class="pwstrength_viewport_progress"></div>
                        </div>
                    </div>
                  <p class="text-helper">Min 8 Characters</p>
                  <p class="has-error text-danger password"></p>
              </div>
              <div class="form-group" style="margin-left:0px;margin-right:0px">
                <label>Phone <b class="text-danger">*</b></label>
                <input type="text" name="phone" class="form-control " placeholder="" maxlength="13" />
                  <p class="text-helper">Max 13 Digit</p>
                  <p class="has-error text-danger phone"></p>
              </div>

              <div class="" style="margin-bottom:15px;margin-left:15px;margin-right:15px;margin-top:0px">
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
                        <p class="has-error text-danger gender"></p>
                    </div>
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
                  <p class="has-error text-danger date_of_birth"></p>
                </div>            
              </div> 
              <div class="form-group" style="margin-left:0px;margin-right:0px">
                  <div id="g-recaptcha"></div>
              </div>
              <div class="form-group" style="margin-left:0px;margin-right:0px">
                  <p class="has-error text-danger recaptcha_response_field"></p>
              </div>
              <div class="form-group" style="margin-left:0px;margin-right:0px">
                <button type="submit" class="btn btn-default" style="margin-top:15px">Register</button>
              </div>

            {!! Form::close() !!}
          </div>
          <div class="modal-connect">
            <span class="form-separator">
              or
            </span>
            <div class="btn-group">
                <a href="{{ route('callback-sosmed','facebook') }}" class="btn btn-default fb-connect"> connect with <i class="fa fa-facebook-f"></i></a>
                <a href="{{ route('callback-sosmed','google') }}" class="btn btn-default g-connect"> connect with <i class="fa fa-google"></i></a>

            </div>
            <span class="sign-link"> already have an account <a href="{{ route('admin-login-member') }}">Sign In</a></span>

          </div>


        </div>

      </div>
    </div>
  </div>

  <!-- Video Overlay -->
  <div class="modal fade" id="openVideo" tabindex="-1" role="dialog" aria-labelledby="openVideo">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-body has-video">
          <div class="button-modal">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
          </div>
          <div class="video-content">
            <iframe width="100%" height="350" src=""></iframe>
          </div>
        </div>

      </div>
    </div>
  </div>

@endsection

@section('scripts')

        {!! Html::script('assets/backend/porto-admin/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') !!}
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

     <script src="https://www.google.com/recaptcha/api.js" type="text/javascript"></script>
      

<script type="text/javascript">

$.fn.modal.Constructor.prototype.enforceFocus = function () { };
jQuery(function ($) {
 var loading = $('.loader-sign-up').hide();
    
      $(document)
      .ajaxStart(function () {
        loading.show();
      })
      .ajaxStop(function () {
      });
  $('.jquery-form-sign-up').ajaxForm({
      success: function(response) {
        if(response.indexOf('success_sign_up') >= 0){

          var myStack = {"dir1":"down", "dir2":"right", "push":"top"};
          new PNotify({
              title: "Success",
              text: "Registration Success",
            type: 'success',
              addclass: "stack-custom",
              stack: myStack
          });
              $.magnificPopup.close();
          setTimeout(function(){
             window.location.href = "{{ route('admin-login-member') }}";
          }, 0);
            $('.errorsMessageSignUp').html('');           
            $('.alert-sending-confirmation').html('');

        }else{
            $('.errorsMessageSignUp').html(response);
        }
      },
      beforeSend: function() {
          $('.has-error').html('');
      },
      error: function(response){
        loading.hide();
          if (response.status === 422) {
              var data = response.responseJSON;
              $.each(data,function(key,val){
                  $('.'+key).html(val);
              });
          } else {
              $('.error').addClass('alert alert-danger').html(response.responseJSON.message);
          }
      }
  }); 
}); 
</script>
<script type="text/javascript">
/*
Name:       UI Elements / Loading Overlay - Examples
Written by:   Okler Themes - (http://www.okler.net)
Theme Version:  1.5.2
*/

(function($) {

  'use strict';

  $(function() {
    var $el = $('#LoadingOverlayApi');

    // to show the overlay on previously initialized element
    // just trigger the following event
    $('#ApiShowOverlay').click(function() {
      $el.trigger('loading-overlay:show');
    });

    // to hide the overlay on previously initialized element
    // just trigger the following event
    $('#ApiHideOverlay').click(function() {
      $el.trigger('loading-overlay:hide');
    });
  });

}).apply(this, [jQuery]);

function showRegisterUserForm(){
  $("#registerUser").modal("show");
    setTimeout(function() {
        createRecaptcha();
    }, 100);
}
function createRecaptcha() {
  grecaptcha.render("g-recaptcha", {sitekey: "6LeSbQgUAAAAAC3ZMjHXeG1fxJf7THM5yVQAqPo2", theme: "light"});
}
</script>


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