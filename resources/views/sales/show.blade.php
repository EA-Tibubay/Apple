<!-- resources/views/sales/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Detalles Específicos de Venta</h1>

    <h2>Venta #{{ $sale->id }}</h2>
    <p><strong>Fecha de Venta:</strong> {{ $sale->sale_date }}</p>
    <p><strong>Total:</strong> ${{ $sale->total_amount }}</p>
    <p><strong>Método de Pago:</strong> {{ ucfirst($sale->payment_method) }}</p>

    <h3>Productos Vendidos:</h3>
    <ul>
        @foreach ($sale->products as $product)
            <li>{{ $product->product_name }} - ${{ $product->price }}</li>
        @endforeach
    </ul>

    <a href="{{ route('sales.index') }}">Volver al listado de ventas</a>
@endsection
