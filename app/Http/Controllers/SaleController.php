<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Sale_detail;
use App\Models\Product;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::all();
        return view('sales.index', compact('sales'));
    }
	
	// En el archivo SaleController.php
	public function show($id)
	{
		$sale = Sale::findOrFail($id);
    	$saleDetail = Sale_detail::findOrFail($id);
		$productId = $saleDetail->product_id;
		$product = Product::findOrFail($productId);

		return view('sales.show', compact('sale', 'saleDetail','product'));
	}


    public function create()
    {
        $products = Product::all();
        return view('sales.create', compact('products'));
    }

    public function store(Request $request)
	{
		// Validar los datos del formulario (excepto sale_details_id)
		
		// Crear los detalles de la venta principal
		$saleDetail = Sale_detail::create([
			'product_id' => $request->input('product_id_hidden'),
			'quantity' => $request->input('quantity'),
			'unit_price' => $request->input('unit_price'),
		]);

		// Crear la venta
		$sale = Sale::create([
			'sale_date' => $request->input('sale_date'),
			'total_amount' => $request->input('total_amount'),
			'payment_method' => $request->input('payment_method'),
			'sale_details_id' => $saleDetail->id,
		]);

		// Redirigir a la página de detalles de la nueva venta
		return redirect()->route('sales.show', ['id' => $sale->id]);
	}


	
}
