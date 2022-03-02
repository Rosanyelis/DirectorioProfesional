<?php

namespace App\Http\Controllers;

use App\Models\Ciudades;
use Illuminate\Http\Request;

class CiudadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Ciudades::all();
        return view('ciudades.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ciudades.create');
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
            'name' => ['required', 'unique:categorys'],
        ],
        [
            'name.required' => 'El campo Nombre es obligatorio',
            'name.unique' => 'El valor del campo Nombre ya existe',
        ]);

        $registro = new Ciudades();
        $registro->name = $request->name;
        $registro->save();

        return redirect('ciudades')->with('success', 'Registro Guardado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ciudades  $ciudades
     * @return \Illuminate\Http\Response
     */
    public function show(Ciudades $ciudades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ciudades  $ciudades
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $count = Ciudades::where('id', $id)->count();
        if ($count>0) {
            $data = Ciudades::where('id', $id)->first();
            return view('ciudades.edit', compact('data'));
        } else {
            return redirect('/ciudades')->with('danger', 'Problemas para Mostrar el Registro.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ciudades  $ciudades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'unique:categorys'],
        ],
        [
            'name.required' => 'El campo Nombre es obligatorio',
            'name.unique' => 'El valor del campo Nombre ya existe',
        ]);

        $count = Ciudades::where('id', $id)->count();
        if ($count>0) {
            $registro = Ciudades::where('id', $id)->first();
            $registro->name = $request->name;
            $registro->save();
            return redirect('/ciudades')->with('success', 'Registro Actualizado Exitosamente!');
        } else {
            return redirect('/ciudades')->with('danger', 'Problemas para Actualizar el Registro.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ciudades  $ciudades
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $count = Ciudades::where('id', $id)->count();
        if ($count>0) {
            Ciudades::where('id', $id)->delete();
            return redirect('/ciudades')->with('success', 'Registro Eliminado Exitosamente!');
        } else {
            return redirect('/ciudades')->with('danger', 'Problemas para Eliminar el Registro.');
        }
    }
}
