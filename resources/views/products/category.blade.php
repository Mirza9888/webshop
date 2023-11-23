@extends('layouts.app')


@section('content')
    <div class="container mt-4">
        <h2>Proizvodi u Kategoriji: {{ $subcategory->name }}</h2>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('storage/images/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }} " style=" height:200px;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <div class="card-footer d-flex justify-content-between align-items-center">
                                <span class="text-muted">{{ $product->price }} KM</span>
                                <a href="{{ route('cart.add', $product->id) }}" class="btn btn-primary">
                                    <img src="{{ asset('icons/kosarica.png') }}" alt="Dodaj u kosaricu" style="width:20px;">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
