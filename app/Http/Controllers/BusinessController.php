<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Categorys;
use App\Models\Subcategory;
use App\Models\Ciudades;
use App\Models\Tag;
use App\Models\User;
use App\Models\Galery;
use App\Models\Taggables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException; 

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Business::all();
        return view('business.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categorys::all();
        $ciudades = Ciudades::all();
        $subcategory = Subcategory::all();
        $tags = Tag::all();
        return view('business.create',compact('categorias', 'ciudades', 'tags', 'subcategory'));
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
            'subcategory_id' => ['required'],
            'categorias_id' => ['required'],
            'sectores_id' => ['required'],
            'name' => ['required'],
            'description' => ['required'],
            'phone' => ['required'],
            'delivery' => ['required'],
            'direccion' => ['required'],
            'user' => ['required'],
            'ciudades_id' => ['required'],
            'sectores_id' => ['required'],
        ],
        [
            'name.required' => 'El campo Nombre es obligatorio',
            'sectores_id.required' => 'El campo Sector es obligatorio',
            'subcategory_id.required' => 'El campo Subcategoria es obligatorio',
            'description.required' => 'El campo Descripción del Negocio es obligatorio',
            'phone.required' => 'El campo Teléfono es obligatorio',
            'delivery.required' => 'El campo Delivery es obligatorio',
            'direccion.required' => 'El campo Direccion es obligatorio',
            'user' => 'El campo Correo Propietario es obligatorio',
        ]);
        
        $user = User::where('email', '=',$request->user)->where('rol', '=','USER')->get();
  
        if($user->isEmpty()){
            throw ValidationException::withMessages(['user' => 'El correo no Existe a un usuario']); 
        };

        $registro = new Business();
        $registro->subcategory_id = $request->subcategory_id;
        $registro->sectores_id = $request->sectores_id;
        $registro->name = $request->name;
        $registro->description = $request->description;
        if ($request->hasFile('url_logo')) {
            $uploadPath = public_path('/storage/negocios/'.$registro->name);
            $file = $request->file('url_logo');
            $extension = $file->getClientOriginalExtension();
            $uuid = Str::uuid(4);
            $fileName = $uuid . '.' . $extension;
            $file->move($uploadPath, $fileName);
            $url = asset('/storage/negocios/'.$registro->name.'/'.$fileName);
            $registro->url_logo = $url;
        }else{
            $registro->url_logo = '';
        }
        $registro->sitio_web = $request->sitio_web;
        $registro->phone = $request->phone;
        $registro->email = $request->email;
        $registro->delivery = $request->delivery;
        $registro->direccion = $request->direccion;
        $registro->url_instagram = $request->url_instagram;
        $registro->url_facebook = $request->url_facebook;
        $registro->user_id = $user[0]->id;
        if ($request->hasFile('url_catalogo')) {
            $uploadPath = public_path('/storage/negocios/'.$registro->name);
            $file = $request->file('url_catalogo');
            $extension = $file->getClientOriginalExtension();
            $uuid = Str::uuid(4);
            $fileName = $uuid . '.' . $extension;
            $file->move($uploadPath, $fileName);
            $url = asset('/storage/negocios/'.$registro->name.'/'.$fileName);
            $registro->url_catalogo = $url;
        }else{
            $registro->url_catalogo = '';
        }

        $registro->save();

        $business_id = $registro->id;

        if ($request->hasFile('imagenes')) {
            foreach ($request->imagenes as $imagen) {
                $record = new Galery();
                $record->business_id = $business_id;
                    $uploadPath = public_path('/storage/sectores/');
                    $file = $imagen;
                    $extension = $file->getClientOriginalExtension();
                    $uuid = Str::uuid(4);
                    $fileName = $uuid . '.' . $extension;
                    $file->move($uploadPath, $fileName);
                    $url = asset('/storage/sectores/'.$fileName);
                $record->url_imagen = $url;
                $record->save();
            }
        }

        if ($request->input('tags')) {
            foreach ($request->tags as $tag) {
                $record = new Taggables();
                $record->business_id = $business_id;
                $record->tags_id = $tag;
                $record->save();
            }

        }

        return redirect('negocios')->with('success', 'Registro Guardado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $count = Business::where('id', $id)->count();
        if ($count>0) {
            $data = Business::where('id', $id)->first();
            $imagenes = Galery::where('business_id', $id)->get();
            $tags = DB::table('tags')
                        ->join('taggables', 'tags.id', '=', 'taggables.tags_id')
                        ->join('business', 'taggables.business_id', '=', 'business.id')
                        ->select('tags.description')
                        ->get();
            return view('business.show', compact('data', 'imagenes', 'tags'));
        } else {
            return redirect('/negocios')->with('danger', 'Problemas para Mostrar el Registro.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function edit(Business $business)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Business $business)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $count = Business::where('id', $id)->count();
        if ($count>0) {
            Business::where('id', $id)->delete();
            Galery::where('business_id', $id)->delete();
            Taggables::where('business_id', $id)->delete();
            return redirect('/negocios')->with('success', 'Registro Eliminado Exitosamente!');
        } else {
            return redirect('/negocios')->with('danger', 'Problemas para Eliminar el Registro.');
        }
    }
}
