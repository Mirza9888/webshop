@extends('layouts.dashboard')

@section('content')


    <div class="container mt-4">
        <div class="col-md-12">

            <form action="{{ route('products.index') }}" method="GET">
                <div class="form-group">
                    <input type="text" name="search" class="form-control" placeholder="Pretraži po imenu proizvode">
                </div>
                <button type="submit" class="btn btn-primary">Pretraži</button>
            </form>
        </div>
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
                        <th>Slika</th>
                        <th>Cijena</th>
                        <th>Kolicina</th>
                        <th>Kategorija</th>
                        <th>Kreiran</th>
                        <th>Operacije</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>
                                <img src="{{ asset('storage/images/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="width: 60px; height: 40px;">
                            </td>

                            <td>
                                @if ($product->is_discounted)
                                    <span class="text-muted text-decoration-line-through">{{ $product->price }} KM</span>
                                    <span class="text-success fw-bold">{{ $product->discounted_price }} KM</span>
                                @else
                                    {{ $product->price }} KM
                                @endif
                            </td>
                            <td>{{$product->quantity}}</td>
                            <td>
                                {{ $product->category->name }}
                                @if($product->category->parent)
                                    (Nadkategorija: {{ $product->category->parent->name }})
                                @endif
                            </td>
                            <td>{{ $product->created_at->format('d.m.Y H:i') }}</td>
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