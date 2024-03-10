<?php

namespace App\Http\Controllers;

use App\Models\Sale_detail;
use Illuminate\Http\Request;

class SaleDetailController extends Controller
{
    public function index()
    {
        $saleDetails = Sale_detail::all();
        return view('sale_details.index', compact('saleDetails'));
    }

    public function show($id)
    {
        $saleDetail = Sale_detail::findOrFail($id);
        return view('sale_details.show', compact('saleDetail'));
    }
}
