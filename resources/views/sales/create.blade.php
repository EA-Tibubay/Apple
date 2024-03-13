<!-- resources/views/sales/create.blade.php -->
@extends('layouts.app')

@section('content')

<a href="{{ route('sales.index') }}" class="btn btn-primary mb-3">Volver al listado de ventas</a>
<h1>Registrar Nueva Venta</h1>

<form action="{{ route('sales.store') }}" method="post">
	@csrf

	<label for="sale_date">Fecha de Venta:</label>
	<input type="date" name="sale_date" required>

	<label for="total_amount">Total:</label>
	<input type="number" name="total_amount" step="0.01" id="total_amount" readonly required>

	<label for="payment_method">Método de Pago:</label>
	<select name="payment_method" required>
		<option value="credit_card">Tarjeta de Crédito</option>
		<option value="cash">Efectivo</option>
	</select>

	<label for="product_id">Producto:</label>
	<select name="product_id" id="product_id" required>
		<option value="">Seleccione un producto</option>
		@foreach($products as $product)
		<option value="{{ $product->id }}" data-unit-price="{{ $product->price }}">{{ $product->product_name }}</option>
		@endforeach
	</select>
	<!-- Agregar el siguiente campo -->
	<input name="product_id_hidden" id="product_id_hidden">

	<label for="quantity">Cantidad:</label>
	<input type="number" name="quantity" min="1" id="quantity" required>

	<label for="unit_price">Precio Unitario:</label>
	<input type="text" name="unit_price" id="unit_price" readonly required>

	<button type="submit">Registrar Venta</button>
</form>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		const productSelect = document.getElementById('product_id');
		const unitPriceInput = document.getElementById('unit_price');
		const quantityInput = document.getElementById('quantity');
		const totalAmountInput = document.getElementById('total_amount');
		const productIdHiddenInput = document.getElementById('product_id_hidden'); // Agregado

		productSelect.addEventListener('change', function() {
			const selectedProduct = productSelect.options[productSelect.selectedIndex];
			const unitPrice = selectedProduct.dataset.unitPrice || '0.00';
			const productId = selectedProduct.value; // Agregado
			unitPriceInput.value = parseFloat(unitPrice).toFixed(2);
			productIdHiddenInput.value = productId; // Agregado
			
			updateTotalAmount();
		});

		quantityInput.addEventListener('input', function() {
			updateTotalAmount();
		});

		function updateTotalAmount() {
			const quantity = parseFloat(quantityInput.value) || 0;
			const unitPrice = parseFloat(unitPriceInput.value) || 0;
			const totalAmount = quantity * unitPrice;
			totalAmountInput.value = totalAmount.toFixed(2);
		}
	});

</script>

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
