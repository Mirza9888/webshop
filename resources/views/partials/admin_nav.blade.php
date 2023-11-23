<div class="col-md-3 d-flex flex-column vh-100">
    <nav class="navbar bg-dark flex-md-column flex-row align-items-start py-2">
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">--}}
                                            <a class="nav-link" href="{{ route('users.index') }}">
                                                <img src="{{ asset('icons/ikonica.png') }}" style="width: 20px;">
                                                Korisnici
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('roles.index') }}">
                                                <img src="{{ asset('icons/uloge.png') }}" style="width: 20px;">
                                                Uloge
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('permissions.index') }}">
                                                <img src="{{ asset('icons/dozvole.png') }}" style="width: 20px;">
                                                Dozvole
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('products.index') }}">
                                                <img src="{{ asset('icons/proizvodi.png') }}" style="width: 20px;">
                                                Proizvodi
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('categories.index') }}">
                                                <img src="{{ asset('icons/kategorije.png') }}" style="width: 20px;">
                                                Kategorije
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('orders.index') }}">
                                                <img src="{{ asset('icons/narudzbe.png') }}" style="width: 20px;">
                                                Narudzbe
                                            </a>
                                        </li>
        </ul>
    </nav>
</div>
