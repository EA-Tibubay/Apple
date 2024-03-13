<?php

namespace App\Http\Controllers;
use PDF;
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

	public function edit($id)
    {
        // Obtener la venta para editar
        $sale = Sale::findOrFail($id);
        $saleDetail = Sale_detail::findOrFail($id);
        $productId = $saleDetail->product_id;
        $product = Product::findOrFail($productId);
        $products = Product::all(); // Puedes necesitar cargar todos los productos para la vista de edición

        return view('sales.edit', compact('sale', 'saleDetail', 'product', 'products'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos del formulario (excepto sale_details_id)

        // Actualizar los detalles de la venta principal
        $saleDetail = Sale_detail::findOrFail($id);
        $saleDetail->update([
            'product_id' => $request->input('product_id_hidden'),
            'quantity' => $request->input('quantity'),
            'unit_price' => $request->input('unit_price'),
        ]);

        // Actualizar la venta
        $sale = Sale::findOrFail($id);
        $sale->update([
            'sale_date' => $request->input('sale_date'),
            'total_amount' => $request->input('total_amount'),
            'payment_method' => $request->input('payment_method'),
        ]);

        // Redirigir a la página de detalles de la venta actualizada
        return redirect()->route('sales.show', ['id' => $sale->id]);
    }

    public function destroy($id)
    {
        // Eliminar la venta y sus detalles
        Sale::destroy($id);
		Sale_detail::destroy($id);

        // Redirigir al listado de ventas
        return redirect()->route('sales.index');
    }
	
	public function downloadPDF()
	{
		$sales = Sale::all();

		$pdf = PDF::loadView('sales.pdf', compact('sales'));

		return $pdf->download('sales_report.pdf');
	}
	
}
