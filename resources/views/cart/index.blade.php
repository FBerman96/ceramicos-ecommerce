@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Mi Carrito</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('receipt'))
        <div class="alert alert-info">
            <pre>{{ session('receipt') }}</pre>
        </div>
    @endif
    @if ($cartItems->isEmpty())
        <p>No tienes productos en tu carrito.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ $item->product->price }}</td>
                        <td>${{ $item->product->price * $item->quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form action="{{ route('cart.checkout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Comprar</button>
        </form>
    @endif
    <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Volver al catálogo</a>
</div>
@endsection
