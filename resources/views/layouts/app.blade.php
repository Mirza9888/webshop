<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fff;
        }

        .navbar {
            background-color: #81d742;
        }

        .navbar a.nav-link {
            color: #fff;
        }

        /* Dodajte dodatne stilove ovde */
    </style>
</head>

<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="https://etrgovinica.si/wp-content/uploads/2022/11/etrgovinica-logo@1200x-e1667397935191.png">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Search form -->
                <div class="navbar-nav me-auto">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>

                <!-- Center Links for Users, Roles, Permissions -->

                    <!-- Left Side Of Navbar -->

<div>
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
                        <!-- User Account and Shopping Cart -->
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <img src="{{ asset('icons/ikonica.png') }}" alt="My account" width="20"> My account
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <img src="{{ asset('icons/kosarica.png') }}" alt="Shopping cart" width="20"> Shopping cart
                            </a>
                        </li>

                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}">Korisnici</a>
                            </li>
                            <li class="nav-item">
                                <span class="nav-link"></span>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('roles.index') }}">Uloge</a>
                            </li>
                            <li class="nav-item">
                                <span class="nav-link"></span>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('permissions.index') }}">Dozvole</a>
                            </li>
                            <li class="nav-item">
                                <span class="nav-link"></span>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('products.index') }}">Prozivodi</a>
                            </li>
                            <li class="nav-item">
                                <span class="nav-link"></span>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('categories.index') }}">Kategorije</a>
                            </li>
                            <li class="nav-item">
                                <span class="nav-link"></span>
                            </li>

                        </ul>
</div>


                        <!-- User Dropdown -->
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
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-4">
        @yield('content')
    </main>
</div>
<!-- Scripts -->
<!-- ... -->
</body>
</html>