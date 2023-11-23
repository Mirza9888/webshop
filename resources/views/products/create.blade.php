@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Dodaj Proizvod</h1>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Ime Proizvoda</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Opis</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Cijena</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Kolicina</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required>
            </div>
            <div class="mb-3">
                <label for="category">Podkategorija:</label>
                <select name="category_id" id="category">
                    @foreach($categories as $category)
                        <optgroup label="{{ $category->name }}">
                            @foreach($category->children as $child)
                                <option value="{{ $child->id }}">{{ $child->name }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Slika Proizvoda</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-success">Spremi Proizvod</button>
        </form>
    </div>
    @push('scripts')
        <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#description'))
                .catch(error => {
                    console.error(error);
                });
        </script>
        <script>

            document.getElementById('is_discounted').addEventListener('change', function() {
                var discountedPriceContainer = document.getElementById('discounted_price_container');
                this.checked ? discountedPriceContainer.style.display = '' : discountedPriceContainer.style.display = 'none';
            });
        </script>
    @endpush
@endsection
