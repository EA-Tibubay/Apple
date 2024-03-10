<!-- resources/views/sales/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Listado de Ventas</h1>

    <ul>
        @foreach ($sales as $sale)
            <li>
                <a href="{{ route('sales.show', ['id' => $sale->id]) }}">
                    Venta #{{ $sale->id }} - Total: ${{ $sale->total_amount }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
