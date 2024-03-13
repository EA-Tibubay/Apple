<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }
	
	public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        // Crear un nuevo producto
        $product = Product::create([
            'product_name' => $request->input('product_name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
        ]);

        // Redirigir a la página de detalles del nuevo producto
        return redirect()->route('products.show', ['id' => $product->id]);
    }
	
	public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        // Actualizar el producto
        $product = Product::findOrFail($id);
        $product->update([
            'product_name' => $request->input('product_name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
        ]);

        // Redirigir a la página de detalles del producto
        return redirect()->route('products.show', ['id' => $product->id]);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        // Redirigir al listado de productos
        return redirect()->route('products.index');
    }
	
}
