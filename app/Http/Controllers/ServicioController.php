<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $id = $id;
        $data = Servicio::where('business_id', $id)->get();
        return view('servicios.index',compact('data', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $id = $id;
        return view('servicios.create',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'servicio' => ['required'],
        ],
        [
            'servicio.required' => 'El campo Nombre de Servicio es obligatorio',
        ]);

        $id = $id;

        $registro = new Servicio();
        $registro->business_id = $id;
        $registro->servicio = $request->servicio;
        $registro->save();

        return redirect('negocios/'.$id.'/servicios')->with('success', 'Registro Guardado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function show($id, $idservicio)
    {
        $id = $id;
        $count = Servicio::where('id', $idservicio)->count();
        if ($count>0) {
            $data = Servicio::where('id', $idservicio)->first();
            return view('servicios.show', compact('data', 'id'));
        } else {
            return redirect('negocios/'.$id.'/servicios')->with('danger', 'Problemas para Mostrar el Registro.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicio $servicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servicio $servicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $idservicio)
    {
        $count = Servicio::where('id', $idservicio)->count();
        if ($count>0) {
            Servicio::where('id', $idservicio)->delete();
            return redirect('negocios/'.$id.'/servicios')->with('success', 'Registro Eliminado Exitosamente!');
        } else {
            return redirect('negocios/'.$id.'/servicios')->with('danger', 'Problemas para Eliminar el Registro.');
        }
    }
}
