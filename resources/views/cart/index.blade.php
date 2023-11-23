@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Košarica</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Naziv proizvoda</th>
                <th>Količina</th>
                <th>Cijena</th>
                <th>Ukupno</th>
                <th>Akcija</th>
            </tr>
            </thead>
            <tbody>
            @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                    <tr>
                        <td>{{ $details['name'] }}</td>
                        <td>
                            <form action="{{ route('cart.update', $id) }}" method="POST">
                                @csrf
                                <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1"
                                       class="form-control">
                                <button type="submit" class="btn btn-info btn-sm mt-1">Dodaj</button>
                            </form>
                        </td>
                        <td>
                            @auth
                                <s>{{ $details['price'] }} KM</s>
                                <span>{{ $details['price'] * 0.9 }} KM</span>
                            @else
                                {{ $details['price'] }} KM
                            @endauth
                        </td>
                        <td>
                            @auth
                                {{ $details['quantity'] * ($details['price'] * 0.9) }} KM
                            @else
                                {{ $details['quantity'] * $details['price'] }} KM
                            @endauth
                        </td>
                        <td>

                            <form action="{{ route('cart.remove', $id) }}" method="POST"
                                  class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                >
                                    Izbaci iz kosarice
                                </button>
                            </form>
                            <form action="{{ route('orders.create') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Naruči</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" class="text-center">Vaša košarica je prazna</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@endsection