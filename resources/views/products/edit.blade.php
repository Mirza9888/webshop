@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Uredi Proizvod</h2>
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Ime Proizvoda</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Opis</label>
                <textarea class="form-control" id="description" name="description" rows="3"
                          required>{{ $product->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Cijena</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Kategorija</label>
                <select class="form-select" id="category" name="category_id">
                    {{-- Ovdje umetnite opcije kategorija, selektujte trenutnu kategoriju --}}
                </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Promijeni Sliku Proizvoda</label>
                <input type="file" class="form-control" id="image" name="image" />
            </div>
            <button type="submit" class="btn btn-primary">Ažuriraj Proizvod</button>
        </form>
    </div>
@endsection
