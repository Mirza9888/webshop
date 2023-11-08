@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-between mb-3">
            <div class="col-auto">
                <h2>Kategorije</h2>
            </div>
            <div class="col-auto">
                <a href="{{ route('categories.create') }}" class="btn btn-success">Dodaj Kategoriju</a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Naziv</th>
                        <th>Akcije</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-primary btn-sm">Pogledaj</a>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Uredi</a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Jeste li sigurni da želite izbrisati ovu kategoriju?');">
                                        Izbriši
                                    </button>
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
