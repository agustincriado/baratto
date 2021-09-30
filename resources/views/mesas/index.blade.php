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
<link rel="stylesheet" href="{{asset('css/styles.css')}}">
<script src="{{ asset('js/script.js')}}"></script>
<div id="buttons">
    <a href="{{ url('inventario/create') }}" class="btn btn-success">Registrar Articulo</a>
    <button class="btn btn-outline-primary" onclick="CreateTable()">Crear mesa</button>
    <button class="btn btn-outline-secondary" onclick="hideInv()"> Hide</button>
</div>
<div id="aside">
    <h1 id="carrito">Carrito</h1>
    <button></button>
</div>
<div id="root">
    @for( $i = 1; $i < 4; $i++) 
        <h3  id="mesa_{{$i}}" onclick="showInv(id);">Mesa {{$i}}</h3>
    @endfor
</div>
<div id="database">
    @foreach ($mesas as $mesa) 
        <div>
            <h6>{{ $mesa->Nombre}}</h6>
            <h6>{{ $mesa->Pventa}}</h6>
            <img src="{{ asset('storage') . '/' . $mesa->Foto }}" width="100" alt="" class="img-thumbnail img-fluid">
        </div>
    @endforeach

    <?php
    ?>
</div>
@endsection