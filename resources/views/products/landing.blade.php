@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @if ($isUserAdmin)
                @include('partials.admin_nav')
            @endif

            <div class="{{$isUserAdmin ? 'col-md-9' : 'col-md-12' }}">
                <div class="container py-5">
                    <h2 class="mb-4">Naši Proizvodi</h2>
                    <div class="row row-cols-1 row-cols-md-4 g-4">
                        @each('partials.product_card', $products, 'product')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection







