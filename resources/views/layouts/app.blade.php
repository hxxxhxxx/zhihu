<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <style>
        /*导航栏用户头像*/
        .user-avatar {
            width: 27px;
            height: 27px;
            margin: -10px 0;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
        }
        /*导航栏搜索按钮*/
        .btn-search {
            margin-right: 20px;
        }
        .modal-subtitle {
            color: #8590a6;
            font-size: 14px;
            line-height: 1.4;
        }

        /*定义小字体、灰颜色通用样式*/
        .span-gray-small-font {
            color: #999999;
            font-size: 14px;
        }
    </style>
    @yield('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container col-md-10 col-md-offset-1">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li @if (Request::is('/')) class="active" @endif><a href="{{ url('/') }}">首页</a></li>
                        <li @if (Request::is('explore')) class="active" @endif><a href="{{ url('/explore') }}">发现</a></li>
                        <li @if (Request::is('topic')) class="active" @endif><a href="{{ url('/topic') }}">话题</a></li>
                    </ul>

                    <form class="navbar-form navbar-left">
                        <div class="input-group">
                            <input type="text" class="form-control" size="35" placeholder="搜索你感兴趣的内容...">
                            <div class="input-group-btn">
                                <button type="submit" class="btn-search btn">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </div>
                        </div>
                        <button type="button" data-toggle="modal" data-target="#ask-modal" class="btn btn-primary">提问</button>
                    </form>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ url('admin') }}" target="_blank">后台管理</a></li>
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">登录</a></li>
                            <li><a href="{{ route('register') }}">注册</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <img class="user-avatar" src="{{ url('/storage'.Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}">
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            退出
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    {{--提问模态框--}}
    <div class="modal fade" id="ask-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title text-center">写下你的问题</h3>
                    <h5 class="modal-subtitle text-center">描述精确的问题更易得到解答</h5>
                </div>
                <div class="modal-body">
                    <br>
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" id="question-title" name="question-title" placeholder="问题标题">
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="text" class="form-control" id="topics" name="topics" placeholder="添加话题">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="question-desc">问题描述（可选）：</label>
                            <button type="button" class="btn btn-default btn-xs pull-right">
                                <span class="glyphicon glyphicon-picture"></span>
                            </button>
                            <textarea class="form-control" name="question-desc" id="question-desc" rows="5"
                                      placeholder="问题背景、条件等详细信息"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="question-ask-anonymous" id="question-ask-anonymous"> 匿名提问
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="button" class="btn btn-primary">提交问题</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
