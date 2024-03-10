<!-- resources/views/products/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Detalles del Producto</h1>

    <h2>{{ $product->product_name }}</h2>
    <p><strong>Descripción:</strong> {{ $product->description }}</p>
    <p><strong>Precio:</strong> ${{ $product->price }}</p>

    <a href="{{ route('products.index') }}">Volver al listado de productos</a>
@endsection
