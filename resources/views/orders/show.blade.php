@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Pregled Narudžbe</h2>

        <div class="card mb-3">
            <div class="card-header">
                Informacije o Narudžbi
            </div>
            <div class="card-body">
                <h5 class="card-title">Ime i Prezime: {{ $order->customer_name }}</h5>
                <p class="card-text">Email: {{ $order->email }}</p>
                <p class="card-text">Datum Narudžbe: {{ $order->ordered_at }}</p>
                <p class="card-text">Ukupna Cijena: {{ $order->discounted_price }} KM</p>

            </div>
        </div>



        <a href="{{ route('products.landing') }}" class="btn btn-primary mt-3">Uspjesno ste narucili.Vratite se na pocetnu stranu.</a>
    </div>
@endsection
