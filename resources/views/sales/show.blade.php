<!-- resources/views/sales/show.blade.php -->
@extends('layouts.app')

@section('content')

<table>
	<thead>

	</thead>
	<tbody>

		<div class="card-footer">
			<a href="{{ route('sales.index') }}" class="btn btn-primary">Volver al listado venta</a>
		</div>
		<h1 class="my-4">Detalles de Venta</h1>

		<div class="card">
			<div class="card-header">
				<h2 class="mb-0">Detalle de Venta #{{ $saleDetail->id }}</h2>
			</div>

			<div class="card-body">
				<p class="mb-1"><strong>Fecha de Venta:</strong> {{ $sale->sale_date }}</p>
				<p class="mb-0"><strong>Producto:</strong> {{ $product->product_name }}</p>
				<p class="mb-1"><strong>Método de Pago:</strong> {{ $sale->payment_method }}</p>
				<p class="mb-1"><strong>Cantidad:</strong> {{ $saleDetail->quantity }}</p>
				<p class="mb-0"><strong>Precio Unitario:</strong> ${{ $saleDetail->unit_price }}</p>
				<p class="mb-1"><strong>Total:</strong> {{ $sale->total_amount }}</p>
			</div>

		</div>
	</tbody>
</table>
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
