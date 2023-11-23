<div class="col">
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ asset('storage/images/' . $product->image) }}" class="img-fluid rounded-start" alt="{{ $product->name }}" style="object-fit: cover; height: 100%; width: 100%;">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ Str::limit($product->description, 100) }}</p>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        @if ($product->is_discounted)
                            <div>
                                <span class="text-muted text-decoration-line-through">{{ $product->price }} KM</span>
                                <span class="text-success fw-bold">{{ $product->discounted_price }} KM</span>
                                <span class="badge bg-danger ms-2">Na sniženju</span>
                            </div>
                        @else
                            <span class="text-muted">{{ $product->price }} KM</span>
                        @endif
                        <a href="{{ route('cart.add', $product->id) }}" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
