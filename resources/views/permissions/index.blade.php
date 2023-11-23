@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h2>Lista dozvola</h2>
        <a href="{{ route('permissions.create') }}" class="btn btn-primary mb-3">Dodaj dozvolu</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Ime</th>
                <th>Operacije</th>
            </tr>
            </thead>
            <tbody>
            @foreach($permissions as $permission)
                <tr>
                    <td>{{ $permission->id }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>
                        <a href="{{ route('permissions.edit', $permission) }}" class="btn btn-warning">Uredi</a>
                        <form action="{{ route('permissions.destroy', $permission) }}" method="post" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Obriši</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
