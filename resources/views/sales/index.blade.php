<!-- resources/views/sales/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Listado de Ventas</h1>

        <a href="{{ route('sales.create') }}" class="btn btn-primary mb-3">Registrar Nueva Venta</a>
   
        <ul class="list-group">
            @forelse ($sales as $sale)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ route('sales.show', ['id' => $sale->id]) }}">
                        Venta #{{ $sale->id }} - Total: ${{ $sale->total_amount }}
                    </a>
                </li>
            @empty
                <li class="list-group-item">No hay ventas disponibles.</li>
            @endforelse
        </ul>
    </div>
    
    <style>

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
</style>
@endsection
