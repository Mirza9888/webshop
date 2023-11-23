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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">


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


    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">

        <a class="navbar-brand" href="{{ route('products.landing') }}">
            <img src="https://etrgovinica.si/wp-content/uploads/2022/11/etrgovinica-logo@1200x-e1667397935191.png"
                 alt="eTrgovinica Logo" class="logo-image">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                       style="width: 300px">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>


            @auth

                <ul class="navbar-nav">
                    @foreach ($categories as $category)
                        <li class="nav-item dropdown">
                            <a style="color: #1a202c  " class="nav-link dropdown-toggle" href="#"
                               id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                {{ $category->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                @foreach ($category->children as $child)
                                    <li><a class="dropdown-item"
                                           href="{{ route('products.category', $child->id) }}">{{ $child->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <ul class="dropdown-menu">
                                @foreach ($child->products as $product)
                                    <li><a class="dropdown-item"
                                           href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                                    </li>

                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>





                @if(auth()->user()->hasRole('Admin'))

                    <a class="nav-link" href="{{route('cart.index')}}" style="color: #1a202c">
                        <img src="{{ asset('icons/kosarica.png') }}" style="width: 20px;">Kosarica</a>


                    <a class="nav-link" href="{{route('users.myaccount')}}" style="color: #1a202c">
                        <img src="{{asset('icons/ikonica.png')}}" style="width: 20px">
                        Moj Nalog</a>
                    <a class="nav-link" href="{{route('dashboard')}}" style="color: #1a202c"><img
                                src="{{asset('icons/korisnici.png')}}" style="width: 20px">
                        Dashboard</a>

                @elseif(auth()->user()->hasRole('Customer'))

                    <a class="nav-link" href="{{route('cart.index')}}" style="color: #1a202c">
                        <img src="{{ asset('icons/kosarica.png') }}" style="width: 20px;">Kosarica</a>


                    <a class="nav-link" href="{{route('users.myaccount')}}" style="color: #1a202c">
                        <img src="{{asset('icons/ikonica.png')}}" style="width: 20px">
                        Moj Nalog</a>
                @else

                    <a class="btn-primary" href="{{route('login')}}"><img src="{{asset('icons/ikonica.png')}}"
                                                                          alt="Login Icon" style="width: 30px">
                        Login</a>
                    <a class="btn-primary" href="{{route('cart.index')}}" style="color: #1a202c">
                        <img src="{{ asset('icons/kosarica.png') }}" alt="Cart Icon" style="width: 30px;">Kosarica</a>

                @endif

            @else

                <a class="btn-secondary" href="{{route('login')}}"><img src="{{asset('icons/ikonica.png')}}"
                                                                        alt="Login Icon" style="width: 30px; ">
                    Login</a>
                <a class="btn-secondary" href="{{route('cart.index')}}" style="color: #1a202c">
                    <img src="{{ asset('icons/kosarica.png') }}" alt="Cart Icon" style="width: 30px;">Kosarica</a>
            @endauth

        </div>
    </div>
</nav>

<main class="py-4">
    @yield('content')
</main>

</body>

</body>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {

        document.querySelectorAll('.dropdown-toggle').forEach(function (dropdownToggle) {
            dropdownToggle.addEventListener('click', function () {


            });
        });
    });
</script>
</html>











