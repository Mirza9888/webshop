@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Pogledaj Proizvod</h2>
        <div class="row row-cols-1 row-cols-md-4 g-4">


            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('storage/images/' . $product->image ) }}" alt="{{ $product->name }}"
                         class="card-img-top" style="height:200px;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text"><strong>Cijena:</strong> {{ $product->price }}</p>
                        <p class="card-text"><strong>Kategorija:</strong> {{ $product->category->name }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Uredi</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Izbriši</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('products.index') }}" class="btn btn-link">Natrag na listu proizvoda</a>
    </div>
@endsection

