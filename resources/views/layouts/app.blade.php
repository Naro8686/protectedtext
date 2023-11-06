<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{$seo_title ?? $settings->get('seo_title', config('app.name'))}}</title>
    <meta name="description"
          content="{{$seo_description ?? $settings->get('seo_description')}}">
    <meta name="keywords"
          content="{{$seo_keywords ?? $settings->get('seo_keywords')}}">
    <meta name="author" content="{{$settings->get('app_name', config('app.name'))}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- No caching -->
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/skeleton.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/layout.css')}}"> <!-- site specific css -->
    <link rel="stylesheet" href="{{asset('assets/css/custom-theme/jquery-ui-1.10.3.custom.css')}}">
    <!-- Favicons -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
    <link rel="apple-touch-icon" href="{{asset('assets/images/apple-touch-icon.png')}}">
    <link rel="apple-touch-icon" href="{{asset('assets/images/apple-touch-icon-72x72.png')}}">
    <link rel="apple-touch-icon" href="{{asset('assets/images/apple-touch-icon-114x114.png')}}">

    <!-- JS -->
    <script type="text/javascript" src="{{asset('assets/js/jquery-2.0.3.min.js')}}"></script>
    <!-- jQuery, unmodified, from http://code.jquery.com/jquery-2.0.3.min.js -->
    <script type="text/javascript" src="{{asset('assets/js/jquery-ui-1.10.3.custom.min.js')}}"></script>
    <!-- jQuery UI full, UI darkness, unmodified -->
    @stack('css')
</head>
<body>
{{$slot}}
@stack('js')
</body>
</html>
