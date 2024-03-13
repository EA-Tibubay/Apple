<!-- resources/views/products/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Detalles del Producto</h1>

        <div class="card">
            <div class="card-header">
                <h2 class="mb-0">{{ $product->product_name }}</h2>
            </div>
            <div class="card-body">
                <p class="mb-1"><strong>Descripción:</strong> {{ $product->description }}</p>
                <p class="mb-0"><strong>Precio:</strong> ${{ $product->price }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Volver al listado de productos</a>
            </div>
        </div>
    </div>
@endsection
