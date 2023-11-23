@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Uredi Narudžbu</h2>
        <form action="{{ route('orders.update', $order->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="shipment_status" class="form-label">Status Pošiljke</label>
                <select class="form-select" id="shipment_status" name="shipment_status">
                    <option value="new" {{ $order->shipment_status == 'new' ? 'selected' : '' }}>New</option>
                    <option value="packed" {{ $order->shipment_status == 'packed' ? 'selected' : '' }}>Packed</option>
                    <option value="shipped" {{ $order->shipment_status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                    <option value="delivered" {{ $order->shipment_status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                    <option value="returned" {{ $order->shipment_status == 'returned' ? 'selected' : '' }}>Returned</option>
                </select>
            </div>
            <div class="mb-3" id="return_reason_container" style="display: none;">
                <label for="return_reason" class="form-label">Razlog vraćanja</label>
                <input type="text" class="form-control" id="return_reason" name="return_reason" value="{{ old('return_reason', $order->return_reason ?? '') }}">
            </div>

            <button type="submit" class="btn btn-primary">Spremi Promjene</button>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const shipmentStatus = document.getElementById('shipment_status');
            const returnReasonContainer = document.getElementById('return_reason_container');

            function toggleReturnReason() {
                if (shipmentStatus.value === 'returned') {
                    returnReasonContainer.style.display = '';
                } else {
                    returnReasonContainer.style.display = 'none';
                }
            }

            // Inicijalno postavite pravilno stanje
            toggleReturnReason();

            // Dodajte osluškivač događaja
            shipmentStatus.addEventListener('change', toggleReturnReason);
        });
    </script>
@endsection
