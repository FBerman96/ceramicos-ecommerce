<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700&display=swap" rel="stylesheet">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Custom Styles -->
    <style>
        body {
            background-color: #f9f9f9;
            font-family: 'Roboto', sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background: linear-gradient(to right, #fef3c7, #fdc56d);
        }
        .navbar-nav .nav-link {
            font-size: 0.875rem; 
            font-weight: 400;
            color: #333;
            transition: color 0.3s;
        }
        .navbar-nav .nav-link:hover {
            color: #ff6347; /* Color al pasar el cursor */
        }
        footer {
            background: linear-gradient(to right, #fef3c7, #fdc56d);
            padding: 15px 0;
            font-size: 0.75rem;
            text-align: center;
            bottom: 0;
            width: 100%;
            color: #333;
        }
        footer .footer-nav {
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 0;
            font-weight: light
        }
        footer .footer-nav li {
            margin: 0 15px;
        }
        footer .footer-nav a {
            color: #000;
            text-decoration: none;
            font-weight: light;
        }
        footer .footer-nav a:hover {
            text-decoration: underline;
        }
        footer .footer-brand {
            font-weight: light;
        }
        .container {
            padding: 0 15px;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm bg-gradient-to-r from-amber-200 to-rose-200">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Inicio
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('products.index') }}">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cart.index') }}">Carrito de Compras</a>
                        </li>                        
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}">Contacto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}">Acerca de Nosotros</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
                            @if(Auth::check() && Auth::user()->is_admin)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.index') }}">Usuarios</a>
                                </li>
                            @endif
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 container">
            @yield('content')
        </main>

        <footer class="bg-gradient-to-r from-amber-200 to-rose-200">
            <div class="container">
                <ul class="footer-nav">
                    <li><a href="{{ route('welcome') }}">Inicio</a></li>
                    <li><a href="{{ route('products.index') }}">Productos</a></li>
                    <li><a href="{{ route('contact') }}">Contacto</a></li>
                    <li><a href="{{ route('about') }}">Acerca de Nosotros</a></li>
                </ul>
                <div class="text-center footer-brand">
                    © 2024 Rincón de Cerámica
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
