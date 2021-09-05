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

<a href="{{ url('empleado/create') }}" class="btn btn-success">Registrar empleado</a>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Direccion</th>
            <th>Correo</th>
        </tr>
    </thead>

    <tbody>
        @foreach( $empleados as $empleado )
        <tr>
            <td>{{ $empleado->id }}</td>
            <td>
                <img src="{{ asset('storage') . '/' . $empleado->Foto }}" width="100" alt="" class="img-thumbnail img-fluid">
            </td>
            <td>{{ $empleado->Nombre }}</td>
            <td>{{ $empleado->Apellido }}</td>
            <td>{{ $empleado->Direccion }}</td>
            <td>{{ $empleado->Correo }}</td>
            <td>
                <a href="{{ url('/empleado/'. $empleado->id . '/edit') }}" class="btn btn-warning">
                Editar
            </a>     
            |
            <form action="{{ url('/empleado/'. $empleado->id )}}" method="post" class="d-inline">
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