<!-- resources/views/products/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Modificar Producto</h1>

    <form action="{{ route('products.update', ['id' => $product->id]) }}" method="post">
        @csrf
        @method('PUT')

        <label for="product_name">Nombre del Producto:</label>
        <input type="text" name="product_name" value="{{ $product->product_name }}" required>

        <label for="description">Descripción:</label>
        <textarea name="description" required>{{ $product->description }}</textarea>

        <label for="price">Precio:</label>
        <input type="number" name="price" step="0.01" value="{{ $product->price }}" required>

        <button type="submit">Guardar Cambios</button>
    </form>
@endsection
