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



<nav class="navbar navbar-expand-lg bg-body-tertiary">


    <!-- Logo -->
    <a class="navbar-brand" href="{{ route('products.landing') }}">
        <img src="https://etrgovinica.si/wp-content/uploads/2022/11/etrgovinica-logo@1200x-e1667397935191.png"
             style="width: 400px;">

    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Prazan div za centriranje pretrage unutar dostupnog prostora -->


        <!-- Search input i button u sredini -->
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                   style="width: 300px">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>




        <a class="btn-primary" href="{{route('cart.index')}}" style="color: #1a202c">
            <img src="{{ asset('icons/kosarica.png') }}" style="width: 30px;">Kosarica</a>
        <a class="nav-link" href="{{route('users.myaccount')}}" style="color: #1a202c">
            <img src="{{asset('icons/ikonica.png')}}" style="width: 20px">
            Moj Nalog</a>


    </div>




</nav>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 d-flex flex-column vh-100">

            <nav class="navbar bg-dark flex-md-column flex-row align-items-start py-2">
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index') }}">
                            <img src="{{ asset('icons/ikonica.png') }}" style="width: 20px;">
                            Korisnici
                        </a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link" href="{{ route('roles.index') }}"  >
                            <img src="{{ asset('icons/uloge.png') }}" style="width: 20px;">
                            Uloge
                        </a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link" href="{{ route('permissions.index') }}" >
                            <img src="{{ asset('icons/dozvole.png') }}" style="width: 20px;">
                            Dozvole
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}"  >
                            <img src="{{ asset('icons/proizvodi.png') }}" style="width: 20px;">
                            Proizvodi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.index') }}" >
                            <img src="{{ asset('icons/kategorije.png') }}" style="width: 20px;">
                            Kategorije
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('orders.index') }}" >
                            <img src="{{ asset('icons/narudzbe.png') }}" style="width: 20px;">
                            Narudzbe
                        </a>
                    </li>

                </ul>



        </div>









        <div class="col-md-9">
            @yield('content')
        </div>
        </nav>
    </div>
</div>
</body>


</html>

