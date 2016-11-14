<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@lang('text.admin_title')</title>
    {{ Html::script('/bower_components/jquery/dist/jquery.min.js') }}
    {{ Html::script('/bower_components/bootstrap/dist/js/bootstrap.min.js') }}
    {{ Html::style('/bower_components/bootstrap/dist/css/bootstrap.min.css') }}
    {{ Html::style('/bower_components/font-awesome/css/font-awesome.min.css') }}
    <link href="{{ asset('admin_asset/css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">  
    <script src="{{ asset('bower_components/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>
    {{ Html::script('/bower_components/firebase/firebase.js') }}
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
    <script src="{{ asset('admin_asset/js/admin.js') }}"></script>
</head>
<body>
    <div id="wrapper">
        @include('layouts.admin.header')
        @yield('content')
    </div>
</body>
</html>
