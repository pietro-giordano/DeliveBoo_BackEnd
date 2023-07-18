<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fontawesome 6 cdn -->
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css' integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==' crossorigin='anonymous' referrerpolicy='no-referrer' />

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Usando Vite -->
        @vite(['resources/js/app.js'])

        {{-- SweetAlert --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>

    <body>
        <div id="app" >

            <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-2 shadow w-100" style="position: sticky; height: 80px">
                <div class="mx-auto mx-md-0">
                    <a class="navbar-brand" href="/admin/restaurants">
                        <img class="" src="{{ Vite::asset('resources/img/deliveboo bianco.svg') }}" alt="Bootstrap" width="150" height="80">
                    </a>
                </div>
                <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-nav">
                    <div class="nav-item text-nowrap ms-2">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </header>
            

            <div class="container-fluid">
                <div class="row h-100">
                    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block  bg-dark navbar-dark sidebar collapse">
                        <div class="position-sticky pt-3">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.restaurants.index' ? 'bg-secondary' : '' }}" href="{{route('admin.restaurants.index')}}">
                                        <i class="fa-solid fa-kitchen-set fa-lg fa-fw"></i></i> Profilo Ristorante
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.dishes.index' ? 'bg-secondary' : '' }}" href="{{route('admin.dishes.index')}}">
                                        <i class="fa-solid fa-utensils fa-lg fa-fw"></i> Piatti
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.orders.index' ? 'bg-secondary' : '' }}" href="{{route('admin.orders.index')}}">
                                        <i class="fa-regular fa-clipboard fa-lg fa-fw"></i> Ordini
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.stats.index' ? 'bg-secondary' : '' }}" href="{{route('admin.stats.index')}}">
                                        <i class="fa-solid fa-chart-column fa-lg fa-fw"></i> Statistiche
                                    </a>
                                </li>
                            </ul>                       
                        </div>
                    </nav>

                    <main class="col-md-9 ms-sm-auto col-lg-10 overflow-auto" style="height: calc(100vh - 80px);">
                        @yield('content')
                    </main>
                </div>
            </div>

        </div>
    </body>

</html>
