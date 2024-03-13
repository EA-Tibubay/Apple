<!-- resources/views/sale_details/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
       <div class="card-footer">
                <a href="{{ route('sale_details.index') }}" class="btn btn-primary">Volver al listado de detalles de venta</a>
            </div>
        <h1 class="my-4">Detalles Específicos de Venta</h1>

        <div class="card">
            <div class="card-header">
                <h2 class="mb-0">Detalle de Venta #{{ $saleDetail->id }}</h2>
            </div>
            <div class="card-body">
                <p class="mb-1"><strong>Cantidad:</strong> {{ $saleDetail->quantity }}</p>
                <p class="mb-0"><strong>Precio Unitario:</strong> ${{ $saleDetail->unit_price }}</p>
            </div>
            
        </div>
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
