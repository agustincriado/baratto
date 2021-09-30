<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['inventarios']= Inventario::paginate(5);
        return view('inventario.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos = [
            'Nombre'=>'required|string|max:100',
            'Pcompra'=>'required|float|max:100',
            'Pventa'=>'required|float|max:100',
            'Cantidad'=>'required|integer',
            'Foto'=>'max:10000|mimes:jpeg,jpg,png',
        ];

        $mensaje = [
            'required' => 'El :attribute es requerido'
        ];

        $this->validate($request,$campos,$mensaje);

        $datosInventario = $request->except('_token');
        if($request->hasFile('Foto')) {
            $datosInventario['Foto'] = $request->file('Foto')->store('uploads', 'public'); 
        } else $datosInventario['Foto'] = '';
        Inventario::insert($datosInventario);
        return redirect('inventario')->with('mensaje', 'Articulo agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function show(Inventario $inventario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventario = Inventario::findOrFail($id);
        return view('inventario.edit', compact('inventario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosInventario = request()->except(['_token', '_method']);

        if($request->hasFile('Foto')) {
            $inventario = Inventario::findOrFail($id);
            Storage::delete('public/'. $inventario->Foto);
            $$datosInventario['Foto'] = $request->file('Foto')->store('uploads', 'public'); 
        }

        Inventario::where('id', '=', $id)->update($datosInventario);
        $inventario = Inventario::findOrFail($id);
        //return view('empleado.edit', compact('empleado'));
        return redirect('inventario')->with('mensaje', 'Articulo modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventario = Inventario::findOrFail($id);
        if(Storage::delete('public/'. $inventario->Foto)){
            Inventario::destroy($id);
        }

        return redirect('inventario')->with('mensaje', 'Articulo eliminado');
    }
}
