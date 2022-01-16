<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    <div id="app">
        <nav class="layout">
            <div class="layout-flex">

                <div class="layout-circle-container">
                    <div class="layout-circle">

                    </div>
                    <div class="layout-circle_sm">

                    </div>
                </div>
                <div class="layout-title">
                    <p>
                        ホーム(仮。ページで切り替えたい)
                    </p>
                </div>
                <div class="layout-search-container">
                    <div class="layout-search">
                        <form action="">
                            <input type="text" placeholder="search">
                            <i class="fas fa-search"></i>
                        </form>
                    </div>
                </div>
                <ul class="layout-login">
                    @guest
                        <ul class="menu">
                            <li class="menu__single">
                                @if (Route::has('login'))
                                    <a class="init-bottom" href="{{ route('login') }}">{{ __('Login') }}<i
                                            class="fas fa-user"></i></a>
                                @endif
                                <ul class="menu__second-level">
                                    @if (Route::has('register'))
                                        <li class="">
                                            <a class=""
                                                href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                            <!-- 他グローバルナビメニュー省略 -->
                        </ul>

                    @else
                        <ul class="menu">
                            <li class="menu__single">
                                <a id="navbarDropdown" class="init-bottom" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}<i class="fas fa-user"></i>
                                </a>
                                <ul class="menu__second-level">
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        </ul>
                    @endguest
                </ul>
            </div>

        </nav>

        <main class="py-4">
            <div class="layout-heading">
                <div class="flex">
                    <div class="layout-heading-content">
                        <i class="fas fa-home"></i>
                        <i class="far fa-check-square"></i>
                        <i class="far fa-credit-card"></i>
                        <i class="far fa-calendar-alt"></i>
                    </div>
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>

</html>
