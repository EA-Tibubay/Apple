<!-- resources/views/sale_details/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Listado de Detalles de Venta</h1>

        <ul class="list-group">
            @forelse ($saleDetails as $saleDetail)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ route('sale_details.show', ['id' => $saleDetail->id]) }}">
                        Detalle de Venta #{{ $saleDetail->id }}
                    </a>
                </li>
            @empty
                <li class="list-group-item">No hay detalles de venta disponibles.</li>
            @endforelse
        </ul>
    </div>
@endsection
