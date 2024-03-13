<!-- resources/views/products/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Listado de Productos</h1>

        <a href="{{ route('products.create') }}" class="btn btn-primary">Crear Nuevo Producto</a>

        <ul class="product-list">
            @foreach ($products as $product)
                <li class="product-item">
                    <div class="product-details">
                        <a href="{{ route('products.show', ['id' => $product->id]) }}">
                            {{ $product->product_name }}
                        </a>
                    </div>

                    <div class="product-actions">
                        <form action="{{ route('products.edit', ['id' => $product->id]) }}" method="get" style="display: inline-block;">
                            <button type="submit" class="btn btn-warnin">Modificar</button>
                        </form>

                        <form action="{{ route('products.destroy', ['id' => $product->id]) }}" method="post" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-dange" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <style>
        /* Publica tus estilos según tus necesidades */

h1 {
    
}

.product-list {
    list-style: none;
    padding: 0;
}

.product-item {
    border: 1px solid #ddd;
    margin-bottom: 10px;
    padding: 10px;
    display: flex;
    justify-content: space-between;
}

.product-details a {
    text-decoration: none;
    color: black;
    font-weight: bold;
}

.product-actions {
    display: flex;
    align-items: center;
}

.btn {
    padding: 8px 10px;
    margin-left: 5px;
    cursor: pointer;
	border-radius: 2px;
	text-decoration: none;
}

.btn-primary {
    background-color: #007bff;
    color: #fff;
}	

.btn-dange {
    background-color: #dc3545;
    color: #fff;
}
		
.btn-dange:hover {
    background-color: red;
    color: #fff;
}

    </style>
@endsection
