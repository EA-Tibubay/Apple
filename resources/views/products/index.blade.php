<!-- resources/views/products/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Listado de Productos</h1>
	
   <a href="{{ route('products.create') }}" class="btn btn-primary">Crear Nuevo Producto</a>
   
    <ul>
        @foreach ($products as $product)
            <li>
                <a href="{{ route('products.show', ['id' => $product->id]) }}">
                    {{ $product->product_name }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
