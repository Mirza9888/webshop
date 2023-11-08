@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Dodaj Kategoriju</h2>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Naziv Kategorije</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <button type="submit" class="btn btn-success">Spremi Kategoriju</button>
        </form>
    </div>
@endsection
