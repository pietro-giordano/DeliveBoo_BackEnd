<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>


        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Usando Vite -->
        @vite(['resources/js/app.js'])
    </head>

    <body class="contain">
        
        <div id="app" >


            <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="height:100px;">
                <div class="container">
                    <a class="navbar-brand d-flex align-items-center" href="{{ env('APP_FRONTEND_URL') }}">
                        <div class="logo_laravel">
                            <img src="{{ Vite::asset('resources/img/deliveboo bianco.svg') }}" alt="Bootstrap" width="150" height="80">
                        </div>
                        {{-- config('app.name', 'Laravel') --}}
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                {{-- <a class="nav-link" href="http://localhost:5173/">{{ __('Home') }}</a> --}}
                            </li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                            <li class="nav-item">
                                <a class="nav-link text-warning" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link text-warning" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                            </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a>
                                    <a class="dropdown-item" href="{{ url('profile') }}">{{__('Profile')}}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="overflow-hidden">
                @yield('content')
            </main>
        </div>
    </body>

    <style>
        .contain{
            background-image: url(../public/image-from-rawpixel-id-3807960-original);
            background: rgb(27,22,30);
            background: linear-gradient(0deg, rgba(27,22,30,1) 0%, rgba(111,125,140,1) 38%);
            min-height: 100vh;
        }
    </style>
</html>
