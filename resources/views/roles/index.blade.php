{{-- layouts/app.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Uloge</h2>
        <a href="{{ route('roles.create') }}" class="btn btn-primary mb-3">Dodaj ulogu</a>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Ime</th>
                <th>Dozvole</th>
                <th>Akcije</th>
            </tr>
            </thead>
            <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->permissions->pluck('name')->join(', ') }}</td>
                    <td>
                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-warning">Uredi</a>
                        <!-- Obavezno koristite d-inline-block ili d-flex s formama u tablicama -->
                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <!-- Dodajte JavaScript potvrdu -->
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Jeste li sigurni da želite obrisati ovu ulogu?');">Obriši</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
