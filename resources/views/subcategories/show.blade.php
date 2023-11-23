@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Subcategory: {{ $subcategory->name }}</h1>
        <p>Details about the subcategory...</p>
        <a href="{{ route('subcategories.edit', [$subcategory->parent_id, $subcategory->id]) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('subcategories.destroy', [$subcategory->parent_id, $subcategory->id]) }}" method="POST" onsubmit="return confirm('Are you sure?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection
