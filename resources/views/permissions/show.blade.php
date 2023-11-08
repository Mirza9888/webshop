@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Uredi dozvolu</h2>
        <form action="{{ route('permissions.update', $permission) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Ime</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $permission->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Ažuriraj</button>
        </form>
    </div>
@endsection
