<!-- resources/views/products/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Crear Nuevo Producto</h1>

    <form action="{{ route('products.store') }}" method="post">
        @csrf
        <label for="product_name">Nombre del Producto:</label>
        <input type="text" name="product_name" required>

        <label for="description">Descripción:</label>
        <textarea name="description" required></textarea>

        <label for="price">Precio:</label>
        <input type="number" name="price" step="0.01" required>

        <button type="submit">Guardar Producto</button>
    </form>
@endsection
