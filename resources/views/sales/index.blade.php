@extends('layouts.app')

@section('content')
  <div class="container">
    <h1 class="my-4">Listado de Ventas</h1>

    <a href="{{ route('sales.create') }}" class="btn btn-primary mb-3 float-right">Registrar Nueva Venta</a>
    <a href="{{ route('sales.downloadPDF') }}" class="btn btn-info mb-3 float-right">Descargar Informe PDF</a>
    <ul class="list-group">
      @forelse ($sales as $sale)
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <a href="{{ route('sales.show', ['id' => $sale->id]) }}">
            Venta #{{ $sale->id }} - Total: ${{ $sale->total_amount }}
          </a>

          <div class="btn-group">
            <a href="{{ route('sales.edit', ['id' => $sale->id]) }}" class="btn btn-warnin">Modificar</a>

            <form action="{{ route('sales.destroy', ['id' => $sale->id]) }}" method="post" onsubmit="return confirm('¿Estás seguro?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
          </div>
        </li>
      @empty
        <li class="list-group-item">No hay ventas disponibles.</li>
      @endforelse
    </ul>
  </div>

  <style>
    .btn {
      padding: 7px 10px;
	  margin-left: 5px;
	  cursor: pointer;
	  border-radius: 2px;
	  text-decoration: none;
    }

    .btn-primary {
      background-color: #0070c9;
      color: #fff;
    }

    .btn-warnin {
      background-color: #007bff;
	  height: 15px;
	  color: #fff;
    }

    .btn-danger {
      background-color: #dc3545;
      color: #fff;
    }
	
	  .btn-danger:hover {
    background-color: red;
    color: #fff;
}
	  
    /* Estilos adicionales */
    .list-group-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
	  .list-group-item div a {
	  background-color: #0070c9;
	  color: aliceblue;
    }
	  
	  .btn-group {
      display: flex;
      justify-content: space-between;
      align-items: center;
	  gap: 5px;
	  }
	  
  </style>
@endsection
