@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Uredi Proizvod</h2>
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Ime Proizvoda</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Opis</label>
                <textarea class="form-control" id="description" name="description" rows="3"
                          required>{{ $product->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Cijena</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
            </div>
            <div class="mb-3">
                <select class="form-select" id="category" name="category_id">
                    @foreach ($categories as $category)
                        <optgroup label="{{ $category->name }}">
                            @foreach ($category->children as $child)
                                <option value="{{ $child->id }}" {{ $product->category_id == $child->id ? 'selected' : '' }}>
                                    {{ $child->name }}
                                </option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="is_discounted" name="is_discounted" {{ $product->is_discounted ? 'checked' : '' }}>
                <label class="form-check-label" for="is_discounted">Proizvod na sniženju</label>
            </div>


            <div class="mb-3" id="discounted_price_container" style="{{ $product->is_discounted ? '' : 'display: none;' }}">
                <label for="discounted_price" class="form-label">Snižena Cijena</label>
                <input type="text" class="form-control" id="discounted_price" name="discounted_price" value="{{ $product->discounted_price }}">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Promijeni Sliku Proizvoda</label>
                <input type="file" class="form-control" id="image" name="image" />
            </div>
            <button type="submit" class="btn btn-primary">Ažuriraj Proizvod</button>
        </form>
    </div>
    <script>
        document.getElementById('is_discounted').addEventListener('change', function() {
            var discountedPriceContainer = document.getElementById('discounted_price_container');
            this.checked ? discountedPriceContainer.style.display = '' : discountedPriceContainer.style.display = 'none';
        });
    </script>
@endsection
