@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Subcategory: {{ $subcategory->name }}</h1>
        <form action="{{ route('subcategories.update', [$subcategory->parent_id, $subcategory->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Subcategory Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $subcategory->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
