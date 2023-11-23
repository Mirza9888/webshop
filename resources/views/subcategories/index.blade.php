@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Subcategories of {{ $category->name }}</h1>
        <a href="{{ route('subcategories.create', $category->id) }}" class="btn btn-primary">Add New Subcategory</a>
        <div class="row">
            @foreach ($subcategories as $subcategory)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $subcategory->name }}</h5>
                            <a href="{{ route('subcategories.show', [$category->id, $subcategory->id]) }}" class="btn btn-success">View</a>
                            <a href="{{ route('subcategories.edit', [$category->id, $subcategory->id]) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('subcategories.destroy', [$category->id, $subcategory->id]) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
