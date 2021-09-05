<h1>{{$modo}} empleado</h1>

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
        <input type="text" name="Nombre" value="{{isset($empleado->Nombre)? $empleado->Nombre:old('Nombre')}}" id="Nombre">
    </div>
    

    <div class="form-group">
        <label for="Apellido">Apellido</label>
        <input type="text" name="Apellido" value="{{isset($empleado->Apellido)? $empleado->Apellido:old('Apellido')}}" id="Apellido">
    </div>
    
    <div class="form-group">
        <label for="Direccion">Direccion</label>
        <input type="text" name="Direccion" value="{{isset($empleado->Direccion) ? $empleado->Direccion :old('Direccion')}}" id="Direccion">
    </div>

    <div class="form-group">
        <label for="Correo">Correo</label>
        <input type="email" name="Correo" value="{{isset($empleado->Correo)? $empleado->Correo : old('Correo')}}" id="Correo">
    </div>
    <div class="form-group">
    <label for="Foto">Foto</label>
    @if(isset($empleado->Foto))
    
    <img src="{{ asset('storage') . '/' . $empleado->Foto }}" width="100" alt="">
    @endif
    <input class="form-control" type="file" name="Foto" value="" id="Foto">
    </div>

    <input class="btn btn-success" type="submit" value="{{$modo}} datos">
    <a class="btn btn-primary" href="{{ url('empleado/') }}">Inicio</a>