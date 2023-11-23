@extends('layouts.dashboard')

@section('content')
    <div class="container mt-4">
        <h2>Dodaj podkategoriju</h2>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <label for="name">Ime podkategorije:</label>
            <input type="text" name="name" id="name" required>

            <label for="parent_id">Nadređena kategorija :</label>
            <select name="parent_id" id="parent_id">
                <option value="">Nadredjena kategorija</option>
                @foreach($parentCategories as $parent)
                    <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                @endforeach
            </select>



            <button type="submit" class="btn btn-success">Spremi Kategoriju</button>
        </form>

    </div>
@endsection
