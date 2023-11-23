

@extends('layouts.app')

@section('content')

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Ukloni Proizvod iz Košarice') }}</div>

                    <div class="card-body">

                        @foreach (session('cart', []) as $id => $item)
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    {{ $item['name'] }} (Količina: {{ $item['quantity'] }})
                                </div>
                                <div class="col-md-6">
                                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-danger btn-sm">Ukloni</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
