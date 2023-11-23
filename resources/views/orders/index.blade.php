@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h2>Narudžbe</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Ime Kupca</th>
                <th>Email</th>
                <th>Ukupna Cijena</th>
                <th>Status Pošiljke</th>
                <th>Datum Narudžbe</th>
                <th>Razlog vraćanja</th>
                <th>Adresa</th>
                <th>Grad</th>
                <th>Poštanski Broj</th>
                <th>Država</th>
                <th>Način Plaćanja</th>
                <th>Status Plaćanja</th>
                <th>Akcije</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->discounted_price }}KM</td>
                    <td>{{ $order->shipment_status }} </td>
                    <td>{{ $order->ordered_at }}</td>
                    @if ($order->shipment_status == 'returned')
                        <td>{{ $order->return_reason }}</td>
                    @else
                        <td></td>
                    @endif
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->city }}</td>
                    <td>{{ $order->postal_code }}</td>
                    <td>{{ $order->country }}</td>
                    <td>{{ $order->payment_method }}</td>
                    <td>{{ $order->payment_status }}</td>
                    <td>
                        <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-primary btn-sm">Uredi</a>
                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <!-- Dodajte JavaScript potvrdu -->
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Jeste li sigurni da želite obrisati ovu narudzbu?');">Obriši</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
