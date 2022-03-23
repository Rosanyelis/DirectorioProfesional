<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Ciudades;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->rol == "ADMIN"){
            $data = User::all();
        }else{
            $data = User::where('rol', "USER")->get();
        }
        return view('users.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Ciudades::all();
        return view('users.create', compact('data'));
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
            'nombre' => ['required', 'max:200'],
            'apellido' => ['required', 'max:200'],
            'dni' => ['required', 'max:200'],
            'sexo' => ['required', 'max:200'],
            'edad' => ['required', 'max:200'],
            'ciudades_id' => ['required', 'max:200'],
            'sectores_id' => ['required', 'max:200'],
            'email' => ['required', 'max:200'],
            'password' => ['required', 'max:200'],
            'rol' => ['required', 'max:200'],
        ],[
            'nombre.required' => 'El valor del campo Nombre de Usuario es obligatorio.',
            'nombre.max' => [
                'numeric' => 'El campo Nombre de Usuario no debe ser mayor a :max.',
                'file'    => 'El archivo Nombre de Usuario no debe pesar más de :max kilobytes.',
                'string'  => 'El campo Nombre de Usuario no debe contener más de :max caracteres.',
                'array'   => 'El campo Nombre de Usuario no debe contener más de :max elementos.',
            ],
            'apellido.required' => 'El valor del campo apellido de Usuario es obligatorio.',
            'apellido.max' => [
                'numeric' => 'El campo Nombre de Usuario no debe ser mayor a :max.',
                'file'    => 'El archivo Nombre de Usuario no debe pesar más de :max kilobytes.',
                'string'  => 'El campo Nombre de Usuario no debe contener más de :max caracteres.',
                'array'   => 'El campo Nombre de Usuario no debe contener más de :max elementos.',
            ],
            'email.required' => 'El valor del campo Correo es obligatorio.',
            'sexo.required' => 'El valor del campo sexo es obligatorio.',
            'dni.required' => 'El valor del campo dni es obligatorio.',
            'ciudades_id.required' => 'El valor de ciudad es obligatorio.',
            'sectores_id.required' => 'El valor de sector es obligatorio.',
            'edad.required' => 'El valor del campo edad es obligatorio.',
            

            'password.required' => 'El valor del campo Contraseña es obligatorio.',
            'password.max' => [
                'numeric' => 'El campo Contraseña no debe ser mayor a :max.',
                'file'    => 'El archivo Contraseña no debe pesar más de :max kilobytes.',
                'string'  => 'El campo Contraseña no debe contener más de :max caracteres.',
                'array'   => 'El campo Contraseña no debe contener más de :max elementos.',
            ],
            'rol_id.required' => 'El valor del campo Rol es obligatorio.',
        ]);

        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $sexo = $request->input('sexo');
        $dni = $request->input('dni');
        $edad = $request->input('edad');
        $ciudades_id = $request->input('ciudades_id');
        $sectores_id = $request->input('sectores_id');
        $email = $request->input('email');
        $password = bcrypt($request->input('password'));
        $rol = $request->input('rol');

        # create
        $dato = New User;
        $dato->name = $nombre;
        $dato->apellido = $apellido;
        $dato->dni = $dni;
        $dato->edad = $edad;
        $dato->ciudad_id = $ciudades_id;
        $dato->sector_id = $sectores_id;
        $dato->sexo = $sexo;
        $dato->email = $email;
        $dato->password = $password;
        $dato->rol = $rol;
        $dato->save();

        return redirect('/users/crear-usuario')->with('success', 'Nuevo Usuario Guardado Exitosamente!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $count = User::where('id', $id)->count();
        if($count>0){
            $datos = User::where('id', $id)->first();
            $persons = DB::table('persons')
                                ->leftjoin('users', 'persons.user_id', '=', 'users.id')
                                ->where('users.id', $id)
                                ->first();
            $direccion = DB::table('addresses')
                                ->leftjoin('persons', 'addresses.person_id', '=', 'persons.id')
                                ->leftjoin('users', 'persons.user_id', '=', 'users.id')
                                ->select('addresses.country as country', 'addresses.province as province', 'addresses.city as city', 'addresses.direccion as direccion')
                                ->where('users.id', $id)
                                ->groupBy('country', 'province', 'city', 'direccion')
                                ->first();
            $familiares = DB::table('familys')
                                ->leftjoin('persons', 'familys.person_id', '=', 'persons.id')
                                ->leftjoin('users', 'persons.user_id', '=', 'users.id')
                                ->select('familys.dni as dni', 'familys.name as name', 'familys.last_name', 'familys.type_family as type', 'familys.phone as phone')
                                ->where('users.id', $id)
                                ->groupBy('dni', 'name', 'last_name', 'type', 'phone')
                                ->get();
            return view('users.show', compact('datos', 'persons', 'direccion','familiares'));
        }else{
            return redirect('/users')->with('Error', 'Problemas para visualizar el registro');
        }
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $count = User::where('id', $id)->count();
        if($count>0){
            $data = User::where('id', $id)->first();
                       
            return view('users.edit', compact('data'));
        }else{
            return redirect('/users')->with('Error', 'Problemas para visualizar el registro');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $count = User::where('id', $id)->count();
        if($count>0){
            $request->validate([
                'name' => ['required', 'max:60'],
                'email' => ['required', 'max:200'],
                'rol_id' => ['required', 'uuid'],
            ],[
                'name.required' => 'El valor del campo Nombre de Usuario es obligatorio.',
                'name.max' => [
                    'numeric' => 'El campo Nombre de Usuario no debe ser mayor a :max.',
                    'file'    => 'El archivo Nombre de Usuario no debe pesar más de :max kilobytes.',
                    'string'  => 'El campo Nombre de Usuario no debe contener más de :max caracteres.',
                    'array'   => 'El campo Nombre de Usuario no debe contener más de :max elementos.',
                ],
                'email.required' => 'El valor del campo Correo es obligatorio.',
                'rol_id.required' => 'El valor del campo Rol es obligatorio.',
                'rol_id.uuid' => 'El campo Rol debe ser un UUID válido.',
            ]);

            $name = $request->input('name');
            $email = $request->input('email');
            $rol = $request->input('rol_id');

            # Actualizar
            $dato = User::where('id', $id)->first();
            $dato->name = $name;
            $dato->email = $email;
            $dato->rol_id = $rol;
            $dato->save();

            return redirect('/users')->with('success', 'Usuario Actualizado Exitosamente!');
        }else{
            return redirect('/users')->with('Error', 'Problemas para visualizar el registro');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $verificar = User::where('id', $id)->count();
        if($verificar > 0)
        {
            User::where('id', $id)->delete();
            return redirect('/users')->with('success', 'Registro Eliminado Existosamente.');
        }else{
            return redirect('/users')->with('warning', 'Error al Eliminar! No se puede eliminar el registro.');
        }
    }
}
