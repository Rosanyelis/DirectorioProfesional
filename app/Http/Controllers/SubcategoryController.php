<?php

namespace App\Http\Controllers;

use App\Models\Categorys;
use App\Models\Ciudades;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Subcategory::all();
        return view('subcategories.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Categorys::all();
        $ciudades = Ciudades::all();
        return view('subcategories.create', compact('data', 'ciudades'));
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
            'categorys_id' => ['required'],
            'sectores_id' => ['required'],
            'name' => ['required', 'unique:categorys'],
            'url_imagen' => ['required']
        ],
        [
            'name.required' => 'El campo Nombre es obligatorio',
            'name.unique' => 'El valor del campo Nombre ya existe',
            'url_imagen.required' => 'El valor del campo Imagen de Categoría es obligatorio',
            'categorys_id.required' => 'El valor del campo Categoría es obligatorio',
            'categorys_id.required' => 'El valor del campo Sector es obligatorio',
        ]);

        $registro = new Subcategory();
        $registro->categorys_id = $request->categorys_id;
        $registro->sectores_id = $request->sectores_id;
        $registro->name = $request->name;
        if ($request->hasFile('url_imagen')) {
            $uploadPath = public_path('/storage/subcategorias/');
            $file = $request->file('url_imagen');
            $extension = $file->getClientOriginalExtension();
            $uuid = Str::uuid(4);
            $fileName = $uuid . '.' . $extension;
            $file->move($uploadPath, $fileName);
            $url = asset('/storage/subcategorias/'.$fileName);
            $registro->url_imagen = $url;
        }
        $registro->save();

        return redirect('subcategorias')->with('success', 'Registro Guardado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $count = Subcategory::where('id', $id)->count();
        if ($count>0) {
            $data = Subcategory::where('id', $id)->first();
            return view('subcategories.show', compact('data'));
        } else {
            return redirect('/subcategorias')->with('danger', 'Problemas para Mostrar el Registro.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $count = Subcategory::where('id', $id)->count();
        if ($count>0) {
            $data = Subcategory::where('id', $id)->first();
            $datos = Categorys::all();
            return view('subcategories.edit', compact('data', 'datos'));
        } else {
            return redirect('/subcategorias')->with('danger', 'Problemas para Mostrar el Registro.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'categorys_id' => ['required'],
            'name' => ['required'],
            'url_imagen' => ['required']
        ],
        [
            'name.required' => 'El campo Nombre es obligatorio',
            'url_imagen.required' => 'El valor del campo Imagen de Categoría es obligatorio',
            'categorys_id.required' => 'El valor del campo Categoría es obligatorio',
        ]);

        $count = Subcategory::where('id', $id)->count();
        if ($count>0) {
            $registro = Subcategory::where('id', $id)->first();
            $registro->categorys_id = $request->categorys_id;
            $registro->sectores_id = $request->sectores_id;
            $registro->name = $request->name;
            if ($request->hasFile('url_imagen')) {
                $uploadPath = public_path('/storage/subcategorias/');
                $file = $request->file('url_imagen');
                $extension = $file->getClientOriginalExtension();
                $uuid = Str::uuid(4);
                $fileName = $uuid . '.' . $extension;
                $file->move($uploadPath, $fileName);
                $url = asset('/storage/subcategorias/'.$fileName);
                $registro->url_imagen = $url;
            }
            $registro->save();
            return redirect('/subcategorias')->with('success', 'Registro Actualizado Exitosamente!');
        } else {
            return redirect('/subcategorias')->with('danger', 'Problemas para Actualizar el Registro.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $count = Subcategory::where('id', $id)->count();
        if ($count>0) {
            Subcategory::where('id', $id)->delete();
            return redirect('/subcategorias')->with('success', 'Registro Eliminado Exitosamente!');
        } else {
            return redirect('/subcategorias')->with('danger', 'Problemas para Eliminar el Registro.');
        }
    }

    public function subcategorias(Request $request, $id){

        $data['subcategorias'] = Subcategory::where('categorys_id', $id)->get()->toJson();

        return response()->json($data);
    }
}
