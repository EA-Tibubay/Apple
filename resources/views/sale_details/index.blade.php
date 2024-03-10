<!-- resources/views/sale_details/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Listado de Detalles de Venta</h1>

    <ul>
        @foreach ($saleDetails as $saleDetail)
            <li>
                <a href="{{ route('sale_details.show', ['id' => $saleDetail->id]) }}">
                    Detalle de Venta #{{ $saleDetail->id }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
