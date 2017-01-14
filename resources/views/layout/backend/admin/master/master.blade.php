@if(sentinel_check_role_admin())
    {{--*/ $include_partial_notification_tasks = 'layout.backend.admin.partial.user_notifications' /*--}}
    {{--*/ $include_partial_notification_messages = 'layout.backend.admin.partial.notification_messages' /*--}}
    {{--*/ $include_partial_notification_alerts = 'layout.backend.admin.partial.notification_alerts' /*--}}
    {{--*/ $include_partial_sidebar_right = 'layout.backend.admin.partial.sidebar_right' /*--}}
    {{--*/ $route_profile = 'admin-profile' /*--}}
    {{--*/ $route_logout = 'admin-logout' /*--}}
    {{--*/ $route_dashboard = 'admin-dashboard' /*--}}
    {{--*/ $role_area = user_info('role')->name /*--}}
    {{--*/ $title = 'Scoido Web Admin' /*--}}
@else
    {{--*/ $include_partial_notification_tasks = 'layout.frontend.member.partial.user_notifications' /*--}}
    {{--*/ $include_partial_notification_messages = 'layout.frontend.member.partial.notification_messages' /*--}}
    {{--*/ $include_partial_notification_alerts = 'layout.frontend.member.partial.notification_alerts' /*--}}
    {{--*/ $include_partial_sidebar_right = 'layout.frontend.member.partial.sidebar_right' /*--}}
    {{--*/ $route_profile = 'member-profile' /*--}}
    {{--*/ $route_logout = 'admin-logout' /*--}}
    {{--*/ $route_dashboard = 'admin-dashboard-member' /*--}}
    {{--*/ $role_area = 'Scoido - '.user_info('plan') /*--}}
    {{--*/ $title = 'Scoido Web Member' /*--}}
@endif
<!DOCTYPE html>
<html>
    <head>
        {!! Html::meta(null, null, ['charset' => 'UTF-8']) !!}
        {!! Html::meta('robots', 'noindex, nofollow') !!}
        {!! Html::meta('product', env('APP_WEB_ADMIN_NAME', $title)) !!}
        {!! Html::meta('description', env('APP_WEB_ADMIN_NAME', $title)) !!}
        {!! Html::meta('author', 'Scoido') !!}
        {!! Html::meta('viewport', 'width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no') !!}

        <title>{{ env('APP_WEB_ADMIN_NAME', $title) }} - @yield('title')</title>
        
        <!-- Web Fonts  -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- Vendor CSS -->
        {!! Html::style('assets/backend/porto-admin/vendor/simple-line-icons/css/simple-line-icons.css') !!}
        {!! Html::style('assets/backend/porto-admin/vendor/bootstrap/css/bootstrap.css') !!}
        {!! Html::style('assets/backend/porto-admin/vendor/magnific-popup/magnific-popup.css') !!}
        {!! Html::style('assets/backend/porto-admin/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css') !!}
        {!! Html::style('assets/backend/porto-admin/vendor/jquery-ui/jquery-ui.css') !!}
        {!! Html::style('assets/backend/porto-admin/vendor/jquery-ui/jquery-ui.theme.css') !!}

        {!! Html::style('assets/backend/porto-admin/vendor/select2/css/select2.css') !!}
        {!! Html::style('assets/backend/porto-admin/vendor/select2-bootstrap-theme/select2-bootstrap.css') !!}
        {!! Html::style('assets/plugins/HoldOn/HoldOn.min.css') !!}
        <!-- {!! Html::style('assets/plugins/pace/pace.min.css') !!} -->
        {!! Html::style('assets/plugins/sweetalert/sweetalert.css') !!}

        {!! Html::style('assets/plugins/bootstrap-switch/bootstrap-switch.min.css') !!}
        {!! Html::style('assets/plugins/bootstrap-switch/bootstrap-switch.min.css') !!}
        {!! Html::style('assets/backend/porto-admin/vendor/pnotify/pnotify.custom.css') !!}
        
        <!-- Specific Page Vendor CSS -->
        {!! Html::style('assets/backend/porto-admin/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') !!}
        {!! Html::style('assets/plugins/summernote/summernote.css') !!}

        {!! Html::style('assets/backend/porto-admin/stylesheets/theme.css') !!}
        {!! Html::style('assets/backend/porto-admin/stylesheets/theme-custom.css') !!}
        {!! Html::style('assets/backend/porto-admin/stylesheets/theme.css') !!}
        {!! Html::style('assets/backend/porto-admin/stylesheets/skins/default.css') !!}
        {!! Html::style('assets/plugins/croppie/demo.css') !!}
        {!! Html::style('assets/plugins/croppie/croppie.css') !!}
        

        <!-- General CSS -->
        {!! Html::style('assets/general/css/loader.css') !!}
        {!! Html::style('assets/general/library/bootstrap-file-input/bootstrap-file-input.css') !!}
        
        {!! Html::script('assets/backend/porto-admin/vendor/modernizr/modernizr.js') !!}

        <link rel="shortcut icon" href="{{ asset('assets/frontend/images/favico.ico') }}">

        
        @yield('header')
        <style type="text/css">
        .borderless td, .borderless th {
            border: none !important;
        }
        .full-width{
            width : 100% !important;
        }
        .text-white{
            color : #ffffff !important;
        }
        .cursor-pointer{
            cursor: pointer !important;
        }
        .steps-active{
            background-color: #0099E6 !important;
            border: 1px solid #0099E6;
            color:#fff;
        }
        </style>
    </head>

    <body>
        <div class="loader loader-body">
            <div class="loader-progress">
                <div class="smt1"></div>
                <div class="smt2"></div>
                <div class="smt3"></div>
                <div class="smt4"></div>
                <div class="smt5"></div>
            </div> 
        </div>
        <section class="body">
            <!-- start: header -->
            <header class="header">
                <div class="logo-container">
                    <a href="{{ route($route_dashboard) }}" class="logo">
                        
                        <img src="{{ asset('assets/general/images/identity/logo.png') }}" height="35" alt="{{ env('APP_WEB_ADMIN_NAME', 'Scoido Web Admin') }}" />
                        <!-- <h4>{{ env('APP_WEB_ADMIN_NAME', $title) }}</h4> -->
                    </a>
                    <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                        <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </div>
            
                <!-- start: search & user box -->
                <div class="header-right">
            
                    <form action="pages-search-results.html" class="search nav-form" style="display:none">
                        <div class="input-group input-search">
                            <input type="text" class="form-control" name="q" id="q" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
            
                    <span class="separator" style="display:none"></span>
                
                    <ul class="notifications" id="box-badge-user-notif">
                        @include($include_partial_notification_tasks)
                    </ul>&nbsp;&nbsp;&nbsp;
                
                    <ul class="notifications" id="box-badge-notif">
                        @include($include_partial_notification_messages)
                    </ul>&nbsp;&nbsp;&nbsp;
                @if(!sentinel_check_role_admin())
                    <ul class="notifications" id="box-badge-alert">
                        @include($include_partial_notification_alerts)
                    </ul>
                @endif
                    <span class="separator"></span>
            
                    <div id="userbox" class="userbox">
                        <a href="#" data-toggle="dropdown">

                            <figure class="profile-picture">
                                <img src="{{ user_info('avatar_path') }}" style="width: 35px; height: 35px"alt="{{ user_info('full_name') }}" class="img-circle" data-lock-picture="{{ user_info('avatar_path') }}" />
                            </figure>
                            <div class="profile-info" data-lock-name="{{ user_info('full_name') }}" data-lock-email="{{ user_info('email') }}">
                                <span class="name">{{ user_info('full_name') }}</span>
                                @if(sentinel_check_role_admin())
                                    <span class="role">{{ $role_area }}</span>
                                @else
                                    <span class="role"><span class="label label-primary" style="background-color:{{ PlanGetColor(user_info('plan_id')) }}">{{ $role_area }}</span></span>
                                @endif
                            </div>
            
                            <i class="fa custom-caret"></i>
                        </a>
            
                        <div class="dropdown-menu">
                            <ul class="list-unstyled">
                                <li class="divider"></li>
                                <li>
                                    <a role="menuitem" tabindex="-1" href="{!! route($route_profile) !!}"><i class="fa fa-user"></i> My Profile</a>
                                </li>
                                <li>
                                    <a role="menuitem" target="_blank" href="http://support.scoido.com/"><i class="fa fa-question-circle"></i> Help</a>
                                </li>
                                <li class="display-none">
                                    <a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
                                </li>
                                <li>
                                    <a role="menuitem" tabindex="-1" href="{!! route($route_logout) !!}"><i class="fa fa-power-off"></i> Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end: search & user box -->
            </header>
            <!-- end: header -->

            <div class="inner-wrapper">
                <!-- start: sidebar -->
                <aside id="sidebar-left" class="sidebar-left">
                
                    <div class="sidebar-header">
                        <div class="sidebar-title">
                            Navigation
                        </div>
                        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                        </div>
                    </div>
                
                    <div class="nano">
                        <div class="nano-content">
                            <nav id="menu" class="nav-main" role="navigation">
                                @include('layout.backend.admin.partial.side_menu')
                            </nav>
                            @if(sentinel_check_role_admin() == false)
                                @include('layout.backend.admin.partial.completion_stats')
                                @include('layout.backend.admin.partial.coin_stats')
                                @include('layout.backend.admin.partial.funnel_stats')
                            @endif
                        </div>
                
                        <script>
                            // Preserve Scroll Position
                            if (typeof localStorage !== 'undefined') {
                                if (localStorage.getItem('sidebar-left-position') !== null) {
                                    var initialPosition = localStorage.getItem('sidebar-left-position'),
                                        sidebarLeft = document.querySelector('#sidebar-left .nano-content');
                                    
                                    sidebarLeft.scrollTop = initialPosition;
                                }
                            }
                        </script>
                
                    </div>
                
                </aside>
                <!-- end: sidebar -->

                <section role="main" class="content-body">
                    <header class="page-header">
                        <h2>@yield('page-header')</h2>
                    
                        <div class="right-wrapper pull-right">
                            @yield('breadcrumb')
                            &nbsp;&nbsp;
                            <!-- <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a> -->
                        </div>
                    </header>

                    <!-- start: page -->                        
                    @yield('content')
                    <!-- end: page -->
                </section>
            </div>

            <aside id="sidebar-right" class="sidebar-right">
                <div class="nano">
                    <div class="nano-content">
                        <a href="#" class="mobile-close visible-xs">
                            Collapse <i class="fa fa-chevron-right"></i>
                        </a>
            
                        <div class="sidebar-right-wrapper">
                                @include($include_partial_sidebar_right)            
                        </div>
                    </div>
                </div>
            </aside>
        </section>
  <div class="modal fade modal-getstart" id="modalUserNotification" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title-user-notification modalUserNotificationName" id="myModalLabel">Notification</h4>
        </div>
        <div class="modal-body modalUserNotificationBody">
            
        </div>
      </div>
    </div>
  </div>
        <!-- Vendor -->
        {!! Html::script('assets/backend/porto-admin/vendor/jquery/jquery.js') !!}
        {!! Html::script('assets/backend/porto-admin/vendor/jquery-browser-mobile/jquery.browser.mobile.js') !!}
        {!! Html::script('assets/backend/porto-admin/vendor/bootstrap/js/bootstrap.js') !!}
        {!! Html::script('assets/backend/porto-admin/vendor/nanoscroller/nanoscroller.js') !!}
        {!! Html::script('assets/backend/porto-admin/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') !!}
        {!! Html::script('assets/backend/porto-admin/vendor/magnific-popup/jquery.magnific-popup.js') !!}
        {!! Html::script('assets/backend/porto-admin/vendor/jquery-placeholder/jquery-placeholder.js') !!}
        {!! Html::script('assets/plugins/HoldOn/HoldOn.min.js') !!}
        <!-- {!! Html::script('assets/plugins/pace/pace.min.js') !!} -->
        {!! Html::script('assets/plugins/croppie/prism.js') !!}
        {!! Html::script('assets/plugins/sweetalert/sweetalert.min.js') !!}
        {!! Html::script('assets/plugins/tinymce/tinymce.min.js') !!}


        {!! Html::script('assets/backend/porto-admin/vendor/select2/js/select2.js') !!}
        {!! Html::script('assets/plugins/bootstrap-switch/bootstrap-switch.min.js') !!}
        {!! Html::script('assets/backend/porto-admin/vendor/ios7-switch/ios7-switch.js') !!}

        {!! Html::script('assets/backend/custom/jquery.form/jquery.form.js') !!}
        {!! Html::script('assets/general/js/jquery.ajax-cross-origin.min.js') !!}

        {!! Html::script('assets/backend/porto-admin/vendor/pnotify/pnotify.custom.js') !!}        
        {!! Html::script('assets/backend/porto-admin/vendor/bootstrap-typeahead/typeahead.bundle.js') !!}
        {!! Html::script('assets/backend/porto-admin/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js') !!}

        {!! Html::script('assets/plugins/summernote/summernote.js') !!}
        
        <!-- Theme Base, Components and Settings -->
        {!! Html::script('assets/backend/porto-admin/javascripts/theme.js') !!}
        
        <!-- Theme Custom -->
        {!! Html::script('assets/backend/porto-admin/javascripts/theme.custom.js') !!}
        
        <!-- Theme Initialization Files -->
        {!! Html::script('assets/backend/porto-admin/javascripts/theme.init.js') !!}
        
        {!! Html::script('assets/general/library/bootstrap-file-input/bootstrap-file-input.js') !!}

        {!! Html::script('assets/plugins/croppie/croppie.js') !!}

        {!! Html::script('assets/plugins/croppie/exif.js') !!}

        <script type="text/javascript">
        @if(sentinel_check_role_admin() == false)
            @if(user_info('status_account') == 'suspended')
                function action_activate(user_id){                    
                    $.ajax({
                        type: "POST",
                        url: "{{ route('member-profile-post')}}",
                        data: {
                            'user_id': user_id,
                            'action': 'activate'
                        },
                        dataType: 'json',
                        success: function(response)
                        {                    
                            if(response.status == 'success'){
                                var myStack = {"dir1":"down", "dir2":"right", "push":"top"};
                                new PNotify({
                                    title: "Success",
                                    text: response.notification,
                                    type: 'success',
                                    addclass: "stack-custom",
                                    stack: myStack
                                });
                                window.location.reload();
                            }else{                                
                                var myStack = {"dir1":"down", "dir2":"right", "push":"top"};
                                new PNotify({
                                    title: "Failed",
                                    text: response.notification,
                                    type: 'danger',
                                    addclass: "stack-custom",
                                    stack: myStack
                                });
                            }
                        }
                    });
                }
            @endif
        @endif
            jQuery(function ($) {
              $('.jquery-form-edit-avatar').ajaxForm({
                  success: function(response) {
                    $('#editProfileAvatar').modal('hide');
                    if(response.indexOf('success_edit_avatar') >= 0){

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
                         window.location.reload(1);
                      }, 2);  

                    }
                  },
                  beforeSend: function() {
                      $('.has-error').html('');
                  },
                  error: function(response){
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

        
        @yield('scripts')
        @yield('partial-scripts')
        {!! Html::script('assets/backend/porto-admin/vendor/socket-io/1.5.0/socket.io.min.js') !!}
        <script type="text/javascript">

            /* Socket Notification */
            var socket = io("{{ env('NODE_SERVER_HOST') }}");
            socket.on("scoido-channel:App\\Events\\Backend\\Notif", function(message){
                // increase the badge everytime the ticket is created 
                // $('span#badge').html('');
                // $('span#badge').html(message.data.amount_unread);

                checkNotification(message.data);
            });
            
            @if(sentinel_check_role_admin())
                function checkNotification(message)
                {
                    var url = "{!! route('hq-admin-check-mail-notification') !!}";
                    var data = {message: message};
                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: data,
                        success: function(response) {
                            if (message == 'announcement') {
                                $('ul#box-badge-alert').html('');
                                $('ul#box-badge-alert').html(response);
                            }else if (message == 'user_notifications') {
                                $('ul#box-badge-user-notif').html('');
                                $('ul#box-badge-user-notif').html(response);
                            } else {
                                $('ul#box-badge-notif').html('');
                                $('ul#box-badge-notif').html(response);
                            }

                            // $('a.btn-notif').on('click', function() {
                            //     var user_id = $(this).data('user');
                            //     setRead(user_id);
                            // });

                            // $('a.btn-alert').on('click', function() {
                            //     var user_id = $(this).data('user');
                            //     setReadAnnouncement(user_id);
                            // });                            

                            // $('a.btn-user-notif').on('click', function() {
                            //     var user_id = $(this).data('user');
                            //     setReadUserNotification(user_id);
                            // });
                        }
                    });
                }
            @else
                function checkNotification(message)
                {
                    var url = "{!! route('check-mail-notification') !!}";
                    var data = {message: message};
                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: data,
                        success: function(response) {
                            if (message == 'announcement') {
                                $('ul#box-badge-alert').html('');
                                $('ul#box-badge-alert').html(response);
                            }else if (message == 'user_notifications') {
                                $('ul#box-badge-user-notif').html('');
                                $('ul#box-badge-user-notif').html(response);
                            } else {
                                $('ul#box-badge-notif').html('');
                                $('ul#box-badge-notif').html(response);
                            }
                            console.log(response);

                            // $('a.btn-notif').on('click', function() {
                            //     var user_id = $(this).data('user');
                            //     setRead(user_id);
                            // });

                            // $('a.btn-alert').on('click', function() {
                            //     var user_id = $(this).data('user');
                            //     setReadAnnouncement(user_id);
                            // });                            

                            // $('a.btn-user-notif').on('click', function() {
                            //     var user_id = $(this).data('user');
                            //     setReadUserNotification(user_id);
                            // });
                        }
                    });
                }
            @endif
            /* End Socket Notif */

            $('a.btn-notif').on('click', function() {
                var user_id = $(this).data('user');
                setRead(user_id);
            });

            $('a.btn-alert').on('click', function() {
                var user_id = $(this).data('user');
                setReadAnnouncement(user_id);
            });

            $('a.btn-user-notif').on('click', function() {
                var user_id = $(this).data('user');
                setReadUserNotification(user_id);
            });

            function setRead(user_id) {
                $('span#badge').html('');
                
                @if(sentinel_check_role_admin())
                    var url = "{{ route('hq-admin-message-center-ajax-set-read-tickets') }}";
                @else
                    var url = "{{ route('member-message-center-ajax-set-read-tickets') }}";
                @endif

                var data = {user_id: user_id};
                var loading = $('.loader-body').hide();

                $(document)
                .ajaxStart(function () {
                    loading.hide();
                });
                $.ajax({
                    type: 'POST',
                    data: data,
                    url: url,
                    success: function(response) {

                    }
                });
            }

            function setReadAnnouncement(user_id) {
                $('span#badge-announcement').html('');
                
                @if(sentinel_check_role_admin())
                    var url = "{{ route('hq-admin-message-center-ajax-set-read-announcements') }}";
                @else
                    var url = "{{ route('member-message-center-ajax-set-read-announcements') }}";
                @endif

                var data = {user_id: user_id};
                var loading = $('.loader-body').hide();

                $(document)
                .ajaxStart(function () {
                    loading.hide();
                });
                $.ajax({
                    type: 'POST',
                    data: data,
                    url: url,
                    success: function(response) {

                    }
                });
            }


            function setReadUserNotification(user_id) {
                $('span#badge-user-notif').html('');
                
                @if(sentinel_check_role_admin())
                    var url = "{{ route('hq-admin-message-center-ajax-set-read-user-notification') }}";
                @else
                    var url = "{{ route('member-message-center-ajax-set-read-user-notification') }}";
                @endif

                var data = {user_id: user_id};
                var loading = $('.loader-body').hide();

                $(document)
                .ajaxStart(function () {
                    loading.hide();
                });
                $.ajax({
                    type: 'POST',
                    data: data,
                    url: url,
                    success: function(response) {

                    }
                });
            }
            function show_modal_user_notification(id){

                @if(sentinel_check_role_admin())
                    var url = "{{ route('admin-user-notifications-post') }}";
                @else
                    var url = "{{ route('member-user-notifications-post') }}";
                @endif
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    'id': id,
                    'action': 'get-data'
                },
                dataType: 'json',
                success: function(response)
                {
                    
                    $('.modalUserNotificationName').html(response.name);
                    $('.modalUserNotificationBody').html(response.content);
                }
            });
            $('#modalUserNotification').modal({backdrop: 'static', keyboard: false});
            $('#modalUserNotification').modal('show');
                
                
            }
        </script>
        
        <script>
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
        $('.loader-body').hide();
        jQuery(function ($) {
            var loading = $('.loader-body').hide();
            $(document)
            .ajaxStart(function () {
                loading.show();
            })
            .ajaxStop(function () {
                loading.hide();
            });
        }); 
        </script>
    </body>
</html>
