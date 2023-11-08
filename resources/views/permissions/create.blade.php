@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Kreiraj Dozvolu</h2>
        <form action="{{ route('permissions.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Ime Dozvole</label>
                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" required>
            </div>
            @error('name')
            <div class="text-sm text-danger">{{$message}}</div>
            @enderror

            <button type="submit" class="btn btn-primary">Dodaj</button>

        </form>
    </div>
@endsection
