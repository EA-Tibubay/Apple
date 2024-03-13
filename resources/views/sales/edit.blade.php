<!-- resources/views/sales/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
       <div class="card-footer">
			<a href="{{ route('sales.index') }}" class="btn btn-primary">Volver al listado venta</a>
		</div>
        <h1>Modificar Venta</h1>

        <form action="{{ route('sales.update', ['id' => $sale->id]) }}" method="post">
            @csrf
            @method('PUT')

            <label for="sale_date">Fecha de Venta:</label>
            <input type="date" name="sale_date" value="{{ $sale->sale_date }}" required>

            <label for="total_amount">Total:</label>
            <input type="number" name="total_amount" step="0.01" value="{{ $sale->total_amount }}" required>

            <label for="payment_method">Método de Pago:</label>
            <select name="payment_method" required>
                <option value="credit_card" {{ $sale->payment_method === 'credit_card' ? 'selected' : '' }}>Tarjeta de Crédito</option>
                <option value="cash" {{ $sale->payment_method === 'cash' ? 'selected' : '' }}>Efectivo</option>
            </select>

            <label for="product_id">Producto:</label>
            <select name="product_id" id="product_id" required>
                <option value="{{ $product->id }}" data-unit-price="{{ $product->price }}">{{ $product->product_name }}</option>
                @foreach($products as $p)
                    <option value="{{ $p->id }}" data-unit-price="{{ $p->price }}" {{ $p->id === $product->id ? 'selected' : '' }}>{{ $p->product_name }}</option>
                @endforeach
            </select>
            <input type="hidden" name="product_id_hidden" value="{{ $product->id }}">

            <label for="quantity">Cantidad:</label>
            <input type="number" name="quantity" min="1" value="{{ $saleDetail->quantity }}" required>

            <label for="unit_price">Precio Unitario:</label>
            <input type="text" name="unit_price" id="unit_price" readonly value="{{ $saleDetail->unit_price }}" required>

            <button type="submit">Actualizar Venta</button>
        </form>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const productSelect = document.getElementById('product_id');
            const unitPriceInput = document.getElementById('unit_price');
            const quantityInput = document.querySelector('input[name="quantity"]');
            const totalAmountInput = document.querySelector('input[name="total_amount"]');

            productSelect.addEventListener('change', function() {
                const selectedProduct = productSelect.options[productSelect.selectedIndex];
                const unitPrice = selectedProduct.dataset.unitPrice || '0.00';
                unitPriceInput.value = parseFloat(unitPrice).toFixed(2);
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
