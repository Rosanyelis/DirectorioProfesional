<?php

namespace App\Http\Controllers;

use App\Models\Categorys;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategorysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Categorys::all();
        return view('categorys.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorys.create');
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
            'url_imagen' => ['required']
        ],
        [
            'name.required' => 'El campo Nombre es obligatorio',
            'name.unique' => 'El valor del campo Nombre ya existe',
            'url_imagen.required' => 'El valor del campo Imagen de Categoría es obligatorio',
        ]);

        $registro = new Categorys();
        $registro->name = $request->name;
        if ($request->hasFile('url_imagen')) {
            $uploadPath = public_path('/storage/categorias/');
            $file = $request->file('url_imagen');
            $extension = $file->getClientOriginalExtension();
            $uuid = Str::uuid(4);
            $fileName = $uuid . '.' . $extension;
            $file->move($uploadPath, $fileName);
            $url = asset('/storage/categorias/'.$fileName);
            $registro->url_imagen = $url;
        }
        $registro->save();

        return redirect('categorias')->with('success', 'Registro Guardado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorys  $categorys
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $count = Categorys::where('id', $id)->count();
        if ($count>0) {
            $data = Categorys::where('id', $id)->first();
            return view('categorys.show', compact('data'));
        } else {
            return redirect('/categorias')->with('danger', 'Problemas para Mostrar el Registro.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorys  $categorys
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $count = Categorys::where('id', $id)->count();
        if ($count>0) {
            $data = Categorys::where('id', $id)->first();
            return view('categorys.edit', compact('data'));
        } else {
            return redirect('/categorias')->with('danger', 'Problemas para Mostrar el Registro.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorys  $categorys
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

        $count = Categorys::where('id', $id)->count();
        if ($count>0) {
            $registro = Categorys::where('id', $id)->first();
            $registro->name = $request->name;
            if ($request->hasFile('url_imagen')) {
                $uploadPath = public_path('/storage/categorias/');
                $file = $request->file('url_imagen');
                $extension = $file->getClientOriginalExtension();
                $uuid = Str::uuid(4);
                $fileName = $uuid . '.' . $extension;
                $file->move($uploadPath, $fileName);
                $url = asset('/storage/categorias/'.$fileName);
                $registro->url_imagen = $url;
            }
            $registro->save();
            return redirect('/categorias')->with('success', 'Registro Actualizado Exitosamente!');
        } else {
            return redirect('/categorias')->with('danger', 'Problemas para Actualizar el Registro.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorys  $categorys
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $count = Categorys::where('id', $id)->count();
        if ($count>0) {
            Categorys::where('id', $id)->delete();
            return redirect('/categorias')->with('success', 'Registro Eliminado Exitosamente!');
        } else {
            return redirect('/categorias')->with('danger', 'Problemas para Eliminar el Registro.');
        }

    }
}
