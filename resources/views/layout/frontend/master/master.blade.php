<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ env('APP_WEB_ADMIN_NAME', 'Template') }} - @yield('title')</title>
        <meta name="keywords" content="HTML5 Template" />
        <meta name="description" content="Porto - Responsive HTML5 Template">
        <meta name="author" content="okler.net">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Web Fonts  -->
         <link href="https://fonts.googleapis.com/css?family=Fredoka+One|PT+Sans:400,700" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="shortcut icon" type="image/png" href="{{ asset('assets/general/images/identity/favicon.png')}}"/>
        <!-- Vendor CSS -->
        {!! Html::style('assets/frontend/porto/vendor/bootstrap/css/bootstrap.min.css') !!}
        {!! Html::style('assets/frontend/porto/vendor/simple-line-icons/css/simple-line-icons.min.css') !!}
        {!! Html::style('assets/frontend/porto/vendor/owl.carousel/assets/owl.carousel.min.css') !!}
        {!! Html::style('assets/frontend/porto/vendor/owl.carousel/assets/owl.theme.default.min.css') !!}
        {!! Html::style('assets/frontend/porto/vendor/magnific-popup/magnific-popup.min.css') !!}

        <!-- Theme CSS -->
        {!! Html::style('assets/frontend/porto/css/theme.css') !!}
        {!! Html::style('assets/frontend/porto/css/theme-elements.css') !!}
        {!! Html::style('assets/frontend/porto/css/theme-blog.css') !!}
        {!! Html::style('assets/frontend/porto/css/theme-shop.css') !!}
        {!! Html::style('assets/frontend/porto/css/theme-animate.css') !!}

    <!-- Current Page CSS -->
        {!! Html::style('assets/backend/porto-admin/vendor/pnotify/pnotify.custom.css') !!}
        {!! Html::style('assets/frontend/porto/vendor/rs-plugin/css/settings.css') !!}
        {!! Html::style('assets/frontend/porto/vendor/rs-plugin/css/layers.css') !!}
        {!! Html::style('assets/frontend/porto/vendor/rs-plugin/css/navigation.css') !!}
        {!! Html::style('assets/frontend/porto/vendor/circle-flip-slideshow/css/component.css') !!}
        {!! Html::style('assets/backend/porto-admin/vendor/pnotify/pnotify.custom.css') !!}

        <!-- Skin CSS -->
        {!! Html::style('assets/frontend/porto/css/skins/default.css') !!}

        <!-- General CSS -->
        {!! Html::style('assets/general/css/loader.css') !!}

        <!-- Theme Custom CSS -->
        {!! Html::style('assets/frontend/porto/css/custom.css') !!}

        {!! Html::script('assets/frontend/porto/vendor/modernizr/modernizr.min.js') !!}
    
         @yield('header')
   </head>
   <body>

        @yield('content')

    <!-- Vendor -->
        {!! Html::script('assets/backend/porto-admin/vendor/jquery/jquery.js') !!}
    {!! Html::script('assets/frontend/porto/vendor/jquery.appear/jquery.appear.min.js') !!}
    {!! Html::script('assets/frontend/porto/vendor/jquery.easing/jquery.easing.min.js') !!}
    {!! Html::script('assets/frontend/porto/vendor/jquery-cookie/jquery-cookie.min.js') !!}
    {!! Html::script('assets/frontend/porto/vendor/bootstrap/js/bootstrap.min.js') !!}
    {!! Html::script('assets/frontend/porto/vendor/common/common.min.js') !!}
    {!! Html::script('assets/frontend/porto/vendor/jquery.validation/jquery.validation.min.js') !!}
    {!! Html::script('assets/frontend/porto/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js') !!}
    {!! Html::script('assets/frontend/porto/vendor/jquery.gmap/jquery.gmap.min.js') !!}
    {!! Html::script('assets/frontend/porto/vendor/jquery.lazyload/jquery.lazyload.min.js') !!}
    {!! Html::script('assets/frontend/porto/vendor/isotope/jquery.isotope.min.js') !!}
    {!! Html::script('assets/frontend/porto/vendor/owl.carousel/owl.carousel.min.js') !!}
    {!! Html::script('assets/frontend/porto/vendor/magnific-popup/jquery.magnific-popup.min.js') !!}
    {!! Html::script('assets/frontend/porto/vendor/vide/vide.min.js') !!}
    {!! Html::script('assets/frontend/porto/vendor/video-player/jquery.mb.YTPlayer.js') !!}
    {!! Html::script('assets/backend/custom/jquery.form/jquery.form.js') !!}

    {!! Html::script('assets/backend/porto-admin/vendor/pnotify/pnotify.custom.js') !!}
    
    <!-- Theme Base, Components and Settings -->
    {!! Html::script('assets/frontend/porto/js/theme.js') !!}
    
    <!-- Current Page Vendor and Views -->

    {!! Html::script('assets/frontend/porto/vendor/rs-plugin/js/jquery.themepunch.tools.min.js') !!}
    {!! Html::script('assets/frontend/porto/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js') !!}
    {!! Html::script('assets/frontend/porto/vendor/circle-flip-slideshow/js/jquery.flipshow.min.js') !!}
    {!! Html::script('assets/frontend/porto/js/views/view.home.js') !!}
    <!-- Theme Custom -->
    {!! Html::script('assets/frontend/porto/js/custom.js') !!}
    
    <!-- Theme Initialization Files -->
    {!! Html::script('assets/frontend/porto/js/theme.init.js') !!}
    @yield('scripts')
    </body>
</html>
