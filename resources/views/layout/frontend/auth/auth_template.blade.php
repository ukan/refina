<!DOCTYPE html>
<html>
    <head>
        {!! Html::meta(null, null, ['charset' => 'UTF-8']) !!}
        {!! Html::meta('robots', 'noindex, nofollow') !!}
        {!! Html::meta('product', env('APP_WEB_ADMIN_NAME', 'Scoido')) !!}
        {!! Html::meta('description', env('APP_WEB_ADMIN_NAME', 'Scoido')) !!}
        {!! Html::meta('author', 'Scoido') !!}
        {!! Html::meta('viewport', 'width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no') !!}

        <title>{{ env('APP_WEB_ADMIN_NAME', 'Scoido') }}</title>

        <!-- Web Fonts  -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        {!! Html::style('assets/plugins/bootstrap/css/bootstrap.min.css') !!}
        {!! Html::style('assets/backend/porto-admin/vendor/magnific-popup/magnific-popup.css') !!}
        {!! Html::style('assets/backend/porto-admin/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css') !!}
        {!! Html::style('assets/backend/porto-admin/stylesheets/theme.css') !!}
        {!! Html::style('assets/backend/porto-admin/stylesheets/skins/default.css') !!}
        {!! Html::style('assets/backend/porto-admin/stylesheets/theme-custom.css') !!}

        {!! Html::style('assets/frontend/porto/css/theme.css') !!}
        {!! Html::style('assets/frontend/porto/css/theme-elements.css') !!}
        {!! Html::style('assets/frontend/porto/vendor/rs-plugin/css/settings.css') !!}
        {!! Html::style('assets/frontend/porto/vendor/rs-plugin/css/layers.css') !!}
        {!! Html::style('assets/frontend/porto/vendor/rs-plugin/css/navigation.css') !!}
        {!! Html::style('assets/frontend/porto/vendor/circle-flip-slideshow/css/component.css') !!}
        {!! Html::style('assets/frontend/porto/css/skins/default.css') !!}
        {!! Html::style('assets/frontend/porto/css/custom.css') !!}



        {!! Html::script('assets/backend/porto-admin/vendor/modernizr/modernizr.js') !!}
        <link rel="shortcut icon" type="image/png" href="{{ asset('assets/general/images/identity/favicon.png')}}"/>

        <!-- todo: Link shorcut icon will be here. -->
        @yield('heads')
    </head>
    <!-- todo: Add dynamic skin... -->
    <body>

        <div class="body">
                        @include('layout.frontend.partial.top_header')
        <section class="body-sign">
            <div class="center-sign">
                <a href="/" class="logo pull-left">
                </a>

                <div class="panel panel-sign">
                    @yield('content')
                </div>
            </div>
        </section>
      </div>

        <!-- Vendor -->
        {!! Html::script('assets/backend/porto-admin/vendor/jquery/jquery.js') !!}
        {!! Html::script('assets/backend/porto-admin/vendor/jquery-browser-mobile/jquery.browser.mobile.js') !!}
        {!! Html::script('assets/backend/porto-admin/vendor/bootstrap/js/bootstrap.js') !!}
        {!! Html::script('assets/backend/porto-admin/vendor/nanoscroller/nanoscroller.js') !!}
        {!! Html::script('assets/backend/porto-admin/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') !!}
        {!! Html::script('assets/backend/porto-admin/vendor/magnific-popup/jquery.magnific-popup.js') !!}
        {!! Html::script('assets/backend/porto-admin/vendor/jquery-placeholder/jquery-placeholder.js') !!}
        
        <!-- Theme Base, Components and Settings -->
        {!! Html::script('assets/backend/porto-admin/javascripts/theme.js') !!}

        <!-- Theme Custom -->
        {!! Html::script('assets/backend/porto-admin/javascripts/theme.custom.js') !!}

        <!-- Theme Initialization Files -->
        {!! Html::script('assets/backend/porto-admin/javascripts/theme.init.js') !!}

        {!! Html::script('assets/frontend/porto/js/custom.js') !!}
        <script type="text/javascript">
        var shrinkHeader = 50;
        $(window).scroll(function () {
            var scroll = getCurrentScroll();
            if (scroll >= shrinkHeader) {
                $('.header-body').addClass('fixed');
            }
            else {
                $('.header-body').removeClass('fixed');
            }
        });
        function getCurrentScroll() {
            return window.pageYOffset || document.documentElement.scrollTop;
        }
        </script>
        @yield('scripts')
    </body>
</html>
