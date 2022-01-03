<?php

namespace App\Http\Controllers;

use App\Models\Mesas;
use App\Models\Inventario;
use Illuminate\Http\Request;

class MesasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['mesas']= Inventario::paginate(5);
        return view('mesas.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = $request->except('_token');
        Mesas::insert($datos);

        return redirect('mesas')->with('mensaje', 'Articulo agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mesas  $mesas
     * @return \Illuminate\Http\Response
     */
    public function show(Mesas $mesas)
    {
        $datos['mesas']= Inventario::paginate(5);
        return view('mesas.index', $datos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mesas  $mesas
     * @return \Illuminate\Http\Response
     */
    public function edit(Mesas $mesas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mesas  $mesas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mesas $mesas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mesas  $mesas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mesas $mesas)
    {
        //
    }
}
