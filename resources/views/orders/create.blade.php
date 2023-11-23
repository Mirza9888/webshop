@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Kreiraj Narudžbu</h2>
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="customer_name" class="form-label">Ime i Prezime</label>
                <input type="text" class="form-control" id="customer_name" name="customer_name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="total_price" class="form-label">Ukupna cijena</label>
                <input type="number" class="form-control" id="total_price" name="total_price" value="{{ session('totalPrice') }}" readonly>
            </div>

            <!-- Novo dodata polja -->
            <div class="mb-3">
                <label for="address" class="form-label">Adresa</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">Grad</label>
                <input type="text" class="form-control" id="city" name="city">
            </div>
            <div class="mb-3">
                <label for="postal_code" class="form-label">Poštanski broj</label>
                <input type="text" class="form-control" id="postal_code" name="postal_code">
            </div>
            <div class="mb-3">
                <label for="country" class="form-label">Država</label>
                <select class="form-control" id="country" name="country">
                    @foreach ($countries as $code => $name)
                        <option value="{{ $code }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="payment_method" class="form-label">Način plaćanja</label>
                <select class="form-control" id="payment_method" name="payment_method" onchange="toggleCardForm()">
                    <option value="cash_on_delivery">Pouzećem</option>
                    <option value="card">Karticom</option>
                </select>
            </div>

            <div id="card_details" style="display:none;">
                <h4>Detalji Kartice</h4>
                <div class="mb-3">
                    <label for="card_number" class="form-label">Broj Kartice</label>
                    <input type="text" class="form-control" id="card_number" name="card_number">
                </div>
                <!-- Ostali detalji kartice -->
            </div>

            <button type="submit" class="btn btn-primary">Spremi</button>
        </form>
    </div>

    <script>
        function toggleCardForm() {
            var paymentMethod = document.getElementById('payment_method').value;
            var cardDetails = document.getElementById('card_details');
            cardDetails.style.display = paymentMethod == 'card' ? 'block' : 'none';
        }
    </script>

@endsection
