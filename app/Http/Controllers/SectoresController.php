<?php

namespace App\Http\Controllers;

use App\Models\Ciudades;
use App\Models\Sectores;
use Illuminate\Http\Request;

class SectoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Sectores::all();
        return view('sectores.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Ciudades::all();
        return view('sectores.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'ciudades_id' => ['required'],
            'name' => ['required'],
        ],
        [
            'name.required' => 'El campo Nombre de Sector es obligatorio',
            'ciudades_id.required' => 'El valor del campo Ciudad es obligatorio',
        ]);

        $registro = new Sectores();
        $registro->ciudades_id = $request->ciudades_id;
        $registro->name = $request->name;
        $registro->save();

        return redirect('sectores')->with('success', 'Registro Guardado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sectores  $sectores
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $count = Sectores::where('id', $id)->count();
        if ($count>0) {
            $data = Sectores::where('id', $id)->first();
            return view('sectores.show', compact('data'));
        } else {
            return redirect('/sectores')->with('danger', 'Problemas para Mostrar el Registro.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sectores  $sectores
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $count = Sectores::where('id', $id)->count();
        if ($count>0) {
            $data = Sectores::where('id', $id)->first();
            $datos = Ciudades::all();
            return view('sectores.edit', compact('data', 'datos'));
        } else {
            return redirect('/sectores')->with('danger', 'Problemas para Mostrar el Registro.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sectores  $sectores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'ciudades_id' => ['required'],
            'name' => ['required'],
        ],
        [
            'name.required' => 'El campo Nombre de Sector es obligatorio',
            'ciudades_id.required' => 'El valor del campo Ciudad es obligatorio',
        ]);

        $count = Sectores::where('id', $id)->count();
        if ($count>0) {
            $registro = Sectores::where('id', $id)->first();
            $registro->ciudades_id = $request->ciudades_id;
            $registro->name = $request->name;
            $registro->save();
            return redirect('/sectores')->with('success', 'Registro Actualizado Exitosamente!');
        } else {
            return redirect('/sectores')->with('danger', 'Problemas para Actualizar el Registro.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sectores  $sectores
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $count = Sectores::where('id', $id)->count();
        if ($count>0) {
            Sectores::where('id', $id)->delete();
            return redirect('/sectores')->with('success', 'Registro Eliminado Exitosamente!');
        } else {
            return redirect('/sectores')->with('danger', 'Problemas para Eliminar el Registro.');
        }
    }
}
