<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ZhihuAdmin</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    @yield('styles')
</head>
<body>
<div id="app">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapse" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('admin') }}">ZhihuAdmin</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ url('/') }}">返回首页</a></li>
                    <li><a href="{{ url('/admin/login') }}">登录</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li @if (Request::is('admin') || Request::is('admin/dashboard*')) class="active" @endif>
                        <a href="{{ url('/admin/dashboard') }}">Dashboard</a>
                    </li>
                    <li @if (Request::is('admin/users*')) class="active" @endif>
                        <a href="{{ url('/admin/users') }}">用户管理</a>
                    </li>
                    <li @if (Request::is('admin/topics*')) class="active" @endif>
                        <a href="{{ url('/admin/topics') }}">话题管理</a>
                    </li>
                    <li>
                        <a href="#">user admin</a>
                    </li>
                    <li>
                        <a href="#">user admin</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-10 col-md-offset-2 main">

                @yield('content')

            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/dashboard.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
@yield('scripts')
</body>
</html>