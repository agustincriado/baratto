@extends('layouts.app')
@section('content')
<div class="container">
    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
    {{ Session::get('mensaje')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<a href="{{ url('inventario/create') }}" class="btn btn-success">Registrar Articulo</a>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Precio de compra</th>
            <th>Precio de venta</th>
            <th>Cantidad</th>
        </tr>
    </thead>

    <tbody>
        @foreach( $inventarios as $inventario )
        <tr>
            <td>{{ $inventario->id }}</td>
            <td>
                <img src="{{ asset('storage') . '/' . $inventario->Foto }}" width="100" alt="" class="img-thumbnail img-fluid">
            </td>
            <td>{{ $inventario->Nombre }}</td>
            <td>{{ $inventario->Pcompra }}</td>
            <td>{{ $inventario->Pventa }}</td>
            <td>{{ $inventario->Cantidad }}</td>

            <td>
                <a href="{{ url('/inventario/'. $inventario->id . '/edit') }}" class="btn btn-warning">
                Editar
            </a>     
            |
            <form action="{{ url('/inventario/'. $inventario->id )}}" method="post" class="d-inline">
            @csrf
            {{ method_field('DELETE') }}
                <input type="submit" class="btn btn-danger" onclick="return confirm('¿Deseas eliminar?')" value="Borrar">    
            </form>
        
        </td>
        </tr>
        @endforeach
    </tbody>
    
</table>
</div>
@endsection