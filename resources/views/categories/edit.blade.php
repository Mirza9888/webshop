@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Uredi Kategoriju</h2>
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Naziv Kategorije</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Ažuriraj Kategoriju</button>
        </form>
    </div>
@endsection
