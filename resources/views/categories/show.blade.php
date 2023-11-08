@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Pogledaj Kategoriju</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $category->name }}</h5>
                <p class="card-text">Detalji i opis o kategoriji mogu biti prikazani ovdje.</p>
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Uredi</a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Izbriši</button>
                </form>
            </div>
        </div>
        <a href="{{ route('categories.index') }}" class="btn btn-link">Natrag na listu kategorija</a>
    </div>
@endsection
