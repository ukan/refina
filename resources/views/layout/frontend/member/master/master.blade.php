<!DOCTYPE html>
<html>
    <head>
        {!! Html::meta(null, null, ['charset' => 'UTF-8']) !!}
        {!! Html::meta('robots', 'noindex, nofollow') !!}
        {!! Html::meta('product', env('APP_WEB_ADMIN_NAME', 'Scoido web Admin')) !!}
        {!! Html::meta('description', env('APP_WEB_ADMIN_NAME', 'Scoido Web Admin')) !!}
        {!! Html::meta('author', 'Scoido') !!}
        {!! Html::meta('viewport', 'width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no') !!}

        <title>{{ env('APP_WEB_ADMIN_NAME', 'Scoido Web Admin') }} - @yield('title')</title>

        <!-- Web Fonts  -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

        <!-- Vendor CSS -->
        {!! Html::style('assets/backend/porto-admin/vendor/bootstrap/css/bootstrap.css') !!}
        
        {!! Html::style('assets/backend/porto-admin/vendor/font-awesome/css/font-awesome.css') !!}
        {!! Html::style('assets/backend/porto-admin/vendor/magnific-popup/magnific-popup.css') !!}
        {!! Html::style('assets/backend/porto-admin/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css') !!}
        {!! Html::style('assets/backend/porto-admin/vendor/jquery-ui/jquery-ui.css') !!}
        {!! Html::style('assets/backend/porto-admin/vendor/jquery-ui/jquery-ui.theme.css') !!}

        {!! Html::style('assets/plugins/select2/select2.css') !!}
        {!! Html::style('assets/plugins/select2/select2-bootstrap.css') !!}
        {!! Html::style('assets/plugins/HoldOn/HoldOn.min.css') !!}
        <!-- {!! Html::style('assets/plugins/pace/pace.min.css') !!} -->
        {!! Html::style('assets/plugins/sweetalert/sweetalert.css') !!}
        {!! Html::style('assets/plugins/bootstrap-switch/bootstrap-switch.min.css') !!}

        {!! Html::style('assets/backend/porto-admin/stylesheets/theme.css') !!}
        {!! Html::style('assets/backend/porto-admin/stylesheets/skins/default.css') !!}
        {!! Html::style('assets/backend/porto-admin/stylesheets/theme-custom.css') !!}

        {!! Html::script('assets/backend/porto-admin/vendor/modernizr/modernizr.js') !!}

        <link rel="shortcut icon" href="{{ asset('assets/frontend/images/favico.ico') }}">
        @yield('header')
    </head>

    <body>
        <section class="body">
            <!-- start: header -->
            <header class="header">
                <div class="logo-container">
                    <a href="{{ route('admin-dashboard') }}" class="logo">
                        <!-- <img src="assets/images/logo.png" height="35" alt="{{ env('APP_WEB_ADMIN_NAME', 'Scoido Web Admin') }}" /> -->
                        <h4>{{ env('APP_WEB_ADMIN_NAME', 'Scoido Web Admin') }}</h4>
                    </a>
                    <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                        <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </div>
            
                <!-- start: search & user box -->
                <div class="header-right">
            
                    <form action="pages-search-results.html" class="search nav-form">
                        <div class="input-group input-search">
                            <input type="text" class="form-control" name="q" id="q" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
            
                    <span class="separator"></span>
            
                    <ul class="notifications">
                        @include('layout.frontend.member.partial.notification_tasks')
                        @include('layout.frontend.member.partial.notification_messages')
                        @include('layout.frontend.member.partial.notification_alerts')
                    </ul>
            
                    <span class="separator"></span>
            
                    <div id="userbox" class="userbox">
                        <a href="#" data-toggle="dropdown">

                            <figure class="profile-picture">
                                <img src="{{ link_to_avatar(user_info('avatar')) }}" style="width: 100px; height: 100px" alt="{{ user_info('full_name') }}" class="img-circle" data-lock-picture="{{ link_to_avatar(user_info('avatar')) }}" />
                            </figure>
                            <div class="profile-info" data-lock-name="{{ user_info('full_name') }}" data-lock-email="{{ user_info('email') }}">
                                <span class="name">{{ user_info('full_name') }}</span>
                                <span class="role">{{ user_info('role')->name }}</span>
                            </div>
            
                            <i class="fa custom-caret"></i>
                        </a>
            
                        <div class="dropdown-menu">
                            <ul class="list-unstyled">
                                <li class="divider"></li>
                                <li>
                                    <a role="menuitem" tabindex="-1" href="{!! route('admin-profile') !!}"><i class="fa fa-user"></i> My Profile</a>
                                </li>
                                <li class="display-none">
                                    <a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
                                </li>
                                <li>
                                    <a role="menuitem" tabindex="-1" href="{!! route('admin-logout') !!}"><i class="fa fa-power-off"></i> Logout</a>
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
                                @include('layout.frontend.member.partial.side_menu')
                            </nav>
                
                            <hr class="separator" />
                            &nbsp;
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
                            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
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
                                @include('layout.frontend.member.partial.sidebar_right')            
                        </div>
                    </div>
                </div>
            </aside>
        </section>

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
        {!! Html::script('assets/plugins/sweetalert/sweetalert.min.js') !!}
        {!! Html::script('assets/plugins/tinymce/tinymce.min.js') !!}
        {!! Html::script('assets/plugins/bootstrap-switch/bootstrap-switch.min.js') !!}

        <!-- Theme Base, Components and Settings -->
        {!! Html::script('assets/backend/porto-admin/javascripts/theme.js') !!}
        
        <!-- Theme Custom -->
        {!! Html::script('assets/backend/porto-admin/javascripts/theme.custom.js') !!}
        
        <!-- Theme Initialization Files -->
        {!! Html::script('assets/backend/porto-admin/javascripts/theme.init.js') !!}

        @yield('scripts')
    </body>
</html>
