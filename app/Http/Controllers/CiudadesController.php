<?php

namespace App\Http\Controllers;

use App\Models\Ciudades;
use App\Models\Galery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

        $ciudad_id = $registro->id;

        if ($request->hasFile('imagenes')) {
            foreach ($request->imagenes as $imagen) {
                $record = new Galery();
                $record->ciudades_id = $ciudad_id;

                $uploadPath = public_path('/storage/ciudades/');
                $file = $imagen;
                $extension = $file->getClientOriginalExtension();
                $uuid = Str::uuid(4);
                $fileName = $uuid . '.' . $extension;
                $file->move($uploadPath, $fileName);
                $url = asset('/storage/ciudades/'.$fileName);
                $record->url_imagen = $url;
                $record->save();
            }
        }


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
            $galery = Galery::where('ciudades_id', $id)->get();
            return view('ciudades.edit', compact('data', 'galery'));
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
            'name' => ['required'],
        ],
        [
            'name.unique' => 'El valor del campo Nombre ya existe',
        ]);

        $count = Ciudades::where('id', $id)->count();
        if ($count>0) {
            $registro = Ciudades::where('id', $id)->first();
            $registro->name = $request->name;
            $registro->save();

            if ($request->hasFile('imagenes')) {
                foreach ($request->imagenes as $imagen) {
                    $record = Galery::where('ciudades_id', $id)->first();
                    $uploadPath = public_path('/storage/ciudades/');
                    $file = $imagen;
                    $extension = $file->getClientOriginalExtension();
                    $uuid = Str::uuid(4);
                    $fileName = $uuid . '.' . $extension;
                    $file->move($uploadPath, $fileName);
                    $url = asset('/storage/ciudades/'.$fileName);
                    $record->url_imagen = $url;
                    $record->save();

                }
            }

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
            Galery::where('ciudades_id', $id)->delete();
            return redirect('/ciudades')->with('success', 'Registro Eliminado Exitosamente!');
        } else {
            return redirect('/ciudades')->with('danger', 'Problemas para Eliminar el Registro.');
        }
    }
}
