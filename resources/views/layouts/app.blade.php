<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='csrf-token' content='{{ csrf_token() }}'>

    <title>@lang('login.title')</title>

    {{ Html::style('/bower_components/bootstrap/dist/css/bootstrap.min.css') }}
    {{ Html::style('/bower_components/font-awesome/css/font-awesome.min.css') }}
    {{ Html::style('/bower_components/sweetalert2/dist/sweetalert2.css') }}

    <link rel='stylesheet' href='{{ asset('/css/login.css') }}'>
    <link rel='stylesheet' href='{{ asset('/css/show-profile.css') }}'>

    @yield('style')

</head>
<body id='app-layout'>
    <nav class='navbar navbar-default navbar-static-top'>
        <div class='container'>
            <div class='navbar-header'>

                <!-- Collapsed Hamburger -->
                <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#app-navbar-collapse'>
                    <span class='sr-only'>@lang('login.toggle')</span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                </button>
            </div>

            <div class='collapse navbar-collapse' id='app-navbar-collapse'>
                <!-- Left Side Of Navbar -->
                <ul class='nav navbar-nav'>
                    <li><a id='home' href='{{ url('/home') }}'>@lang('login.home')</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class='nav navbar-nav navbar-right'>
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a id='home' href='{{ url('/login') }}'>@lang('login.login')</a></li>
                        <li><a id='home' href='{{ url('/register') }}'>@lang('login.register')</a></li>
                    @else
                        <li class='dropdown'>
                            <a href='#' id='username' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'> {{ Auth::user()->name }}<span class='caret'></span>
                            </a>

                            <ul class='dropdown-menu' role='menu'>
                                <li>
                                    <div class='profile'>
                                        <div class='avatar'>
                                            @if (empty(Auth::user()->avatar))
                                                {{ Html::image('/images/avatar.png', 'Image Not Found', ['class' => 'img-circle']) }}
                                            @else
                                                {{ Html::image(Auth::user()->avatar, '', ['class' => 'img-circle']) }}
                                            @endif
                                            <h3 id='user-name-h3'>{{ Auth::user()->name }}</h3>
                                            <h4>Email: {{ Auth::user()->email }}</h4>
                                            <div class='logout'>
                                                <a href='{{ url('/logout') }}'><i class='fa fa-btn fa-sign-out'></i>
                                                    @lang('login.logout')
                                                </a>
                                            </div>
                                            <div class='edit'>
                                                <a href='{{ route('users.edit', ['users' => Auth::user()]) }}'><i class='fa fa-btn fa-edit'></i>@lang('profile.edit')</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    {{ Html::script('/bower_components/jquery/dist/jquery.min.js') }}
    {{ Html::script('/bower_components/bootstrap/dist/js/bootstrap.min.js') }}
    {{ Html::script('/bower_components/sweetalert2/dist/sweetalert2.min.js') }}
    {{ Html::script('/bower_components/firebase/firebase.js') }}
    {{ Html::script('admin_asset/js/firebase.js') }}
    @yield('script')
</body>
</html>
