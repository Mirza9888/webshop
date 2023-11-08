{{-- resources/views/products/index.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-between mb-3">
            <div class="col-auto">
                <h2>Proizvodi</h2>
                <a href="{{ route('products.create') }}" class="btn btn-success">Dodaj proizvod</a>
            </div>



        </div>

        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ime</th>
                        <th>Opis</th>
                        <th>Cijena</th>
                        <th>Kategorija</th>
                        <th>Operacije</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary btn-sm">Pogledaj proizvod</a>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Uredi</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Izbrisi</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
