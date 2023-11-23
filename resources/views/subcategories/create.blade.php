@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Subcategory in {{ $category->name }}</h1>
        <form action="{{ route('subcategories.store', $category->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Subcategory Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
