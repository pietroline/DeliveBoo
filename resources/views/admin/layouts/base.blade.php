
{{-- Questo codice php serve per creare la variabile $resturant necessaria al controllo if (vedi **controllo-if**)--}}
@php
    use App\Restaurant;
    $restaurant = Restaurant::where("user_id", Auth::user()->id)->first();
@endphp









<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('DeliveBoo', 'DeliveBoo') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/functionsJS/confirmDelete.js') }}" defer></script>
    <script src="{{ asset('js/functionsJS/validationRequiredGroupCheckbox.js') }}" defer></script>
    <script src="{{ asset('js/functionsJS/validationformclientBootstrap.js') }}" defer></script>
    @yield('scriptJS')
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm p-0">
            <div class="container">
                <a class="navbar-brand p-0" href="{{ url('/') }}">
                   <img src="{{asset('img/logo-orange.png')}}" width="90px" alt="logo deliveboo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ">


                        {{-- ----------------------------------------- --}}

                        <li class="mx-2"><a href="{{route('admin.home')}}" class="ms_aColor">Dashbord</a></li>
                        
                        {{-- **controllo-if** --}}
                        @if ($restaurant)
                            <li class="mx-2"><a href="{{route('admin.foods.index')}}" class="ms_aColor">Piatti</a></li>
                            <li class="mx-2"><a href="{{route('admin.orders')}}" class="ms_aColor">Ordini</a></li>
                            <li class="mx-2"><a href="{{route('admin.charts')}}" class="ms_aColor">Statistiche</a></li>
                        @endif
                        
                        {{-- ----------------------------------------- --}}

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
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

        <main class="py-4">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">

                        {{-- Per errori dovuti alle verifiche sui form --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                    </div>
                </div>
            </div>


            @yield('content')
        </main>
    </div>
</body>
</html>