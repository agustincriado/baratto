<h1>{{$modo}} articulo</h1>

@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

    <div class="form-group">
        <label for="Nombre">Nombre</label>
        <input type="text" name="Nombre" value="{{isset($inventario->Nombre)? $inventario->Nombre:old('Nombre')}}" id="Nombre">
    </div>
    

    <div class="form-group">
        <label for="Pcompra">Precio de compra</label>
        <input type="number" step="0.1" name="Pcompra" value="{{isset($inventario->Pcompra)? $inventario->Pcompra:old('Pcompra')}}" id="Pcompra">
    </div>
    
    <div class="form-group">
        <label for="Pventa">Precio de venta</label>
        <input type="number" step="0.1" name="Pventa" value="{{isset($inventario->Pventa)? $inventario->Pventa:old('Pventa')}}" id="Pventa">
    </div>

    <div class="form-group">
        <label for="Cantidad">Cantidad</label>
        <input type="number" step="0.1" name="Cantidad" value="{{isset($inventario->Cantidad)? $inventario->Cantidad:old('Cantidad')}}" id="Cantidad">
    </div>
    <div class="form-group">
    <label for="Foto">Foto</label>
    @if(isset($empleado->Foto))
    
    <img src="{{ asset('storage') . '/' . $inventario->Foto }}" width="100" alt="">
    @endif
    <input class="form-control" type="file" name="Foto" value="" id="Foto">
    </div>

    <input class="btn btn-success" type="submit" value="{{$modo}} datos">
    <a class="btn btn-primary" href="{{ url('inventario/') }}">Inicio</a>