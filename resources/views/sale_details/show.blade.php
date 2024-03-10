<!-- resources/views/sale_details/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Detalles Específicos de Venta</h1>

    <h2>Detalle de Venta #{{ $saleDetail->id }}</h2>
    <p><strong>Cantidad:</strong> {{ $saleDetail->quantity }}</p>
    <p><strong>Precio Unitario:</strong> ${{ $saleDetail->unit_price }}</p>

    <a href="{{ route('sale_details.index') }}">Volver al listado de detalles de venta</a>
@endsection
