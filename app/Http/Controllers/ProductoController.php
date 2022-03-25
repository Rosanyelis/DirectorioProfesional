<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $id = $id;
        $data = Producto::where('business_id', $id)->get();
        return view('productos.index',compact('data', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $id = $id;
        return view('productos.create',compact('id'));
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
            'producto' => ['required'],
        ],
        [
            'producto.required' => 'El campo Nombre de Producto es obligatorio',
        ]);

        $id = $id;

        $registro = new Producto();
        $registro->business_id = $id;
        $registro->producto = $request->producto;
        if ($request->hasFile('url_imagen')) {
            $uploadPath = public_path('/storage/productos/');
            $file = $request->file('url_imagen');
            $extension = $file->getClientOriginalExtension();
            $uuid = Str::uuid(4);
            $fileName = $uuid . '.' . $extension;
            $file->move($uploadPath, $fileName);
            $url = asset('/storage/productos/'.$fileName);
            $registro->url_imagen = $url;
        }
        $registro->save();

        return redirect('negocios/'.$id.'/productos')->with('success', 'Registro Guardado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($id, $idproducto)
    {
        $id = $id;
        $count = Producto::where('id', $idproducto)->count();
        if ($count>0) {
            $data = Producto::where('id', $idproducto)->first();
            return view('productos.show', compact('data', 'id'));
        } else {
            return redirect('negocios/'.$id.'/productos')->with('danger', 'Problemas para Mostrar el Registro.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $idproducto)
    {
        $count = Producto::where('id', $idproducto)->count();
        if ($count>0) {
            Producto::where('id', $idproducto)->delete();
            return redirect('negocios/'.$id.'/productos')->with('success', 'Registro Eliminado Exitosamente!');
        } else {
            return redirect('negocios/'.$id.'/productos')->with('danger', 'Problemas para Eliminar el Registro.');
        }
    }
}
