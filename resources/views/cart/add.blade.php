@extends('layouts.app')

@section('content')

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dodaj Proizvod u Košaricu') }}</div>

                    <div class="card-body">
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf

                            <div class="row mb-3">
                                <label for="product-name" class="col-md-4 col-form-label text-md-end">
                                    {{ __('Naziv Proizvoda') }}
                                </label>
                                <div class="col-md-6">
                                    <input type="text" id="product-name" class="form-control" name="product_name" value="{{ $product->name }}" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="product-quantity" class="col-md-4 col-form-label text-md-end">
                                    {{ __('Količina') }}
                                </label>
                                <div class="col-md-6">
                                    <input type="number" id="product-quantity" class="form-control" name="quantity" value="1" min="1">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Dodaj u Košaricu') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
