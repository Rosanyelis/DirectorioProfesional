<?php

namespace App\Http\Controllers;

use App\Models\RedSocial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class RedSocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $id = $id;
        $data = RedSocial::where('business_id', $id)->get();
        return view('redes.index',compact('data', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $id = $id;
        return view('redes.create',compact('id'));
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
            'red_social' => ['required', 'string'],
            'redsocial_url' => ['required'],
        ],
        [
            'red_social.required' => 'El campo Nombre de Red Social es obligatorio',
            'red_social.string' => 'El campo Nombre de Red Social es obligatorio',
            'redsocial_url.required' => 'El campo Url de Red Social es obligatorio',
        ]);

        $id = $id;

        $registro = new RedSocial();
        $registro->business_id = $id;
        $registro->red_social = $request->red_social;
        $registro->redsocial_url = $request->redsocial_url;
        $registro->save();

        return redirect('negocios/'.$id.'/redes')->with('success', 'Registro Guardado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RedSocial  $redSocial
     * @return \Illuminate\Http\Response
     */
    public function show($id, $idred)
    {
        $id = $id;
        $count = RedSocial::where('id', $idred)->count();
        if ($count>0) {
            $data = RedSocial::where('id', $idred)->first();
            return view('redes.show', compact('data', 'id'));
        } else {
            return redirect('negocios/'.$id.'/redes')->with('danger', 'Problemas para Mostrar el Registro.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RedSocial  $redSocial
     * @return \Illuminate\Http\Response
     */
    public function edit(RedSocial $redSocial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RedSocial  $redSocial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RedSocial $redSocial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RedSocial  $redSocial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $idred)
    {
        $count = RedSocial::where('id', $idred)->count();
        if ($count>0) {
            RedSocial::where('id', $idred)->delete();
            return redirect('negocios/'.$id.'/redes')->with('success', 'Registro Eliminado Exitosamente!');
        } else {
            return redirect('negocios/'.$id.'/redes')->with('danger', 'Problemas para Eliminar el Registro.');
        }
    }
}
