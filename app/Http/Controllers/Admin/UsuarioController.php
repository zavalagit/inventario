<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidarUsuario;
use App\Models\Admin\Rol;
use App\Models\Seguridad\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::with('roles:id,nombre')->orderBy('id')->get();
        //manda un ray comando compact
        return view('admin.usuario.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $rols = Rol::orderBy('id')->pluck('nombre', 'id')->toArray();
        //dd($rols);
        return view('admin.usuario.crear', compact('rols'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidarUsuario $request)
    {
        $usuario = Usuario::create($request->all());
        $usuario->roles()->attach($request->rol_id, array('estado' => 1));
        return redirect('admin/usuario')->with('mensaje', 'Usuario creado con exito');
    }

    
    
    public function editar($id)
    {
        $rols = Rol::orderBy('id')->pluck('nombre', 'id')->toArray();
        $data = Usuario::with('roles')->findOrFail($id);
        return view('admin.usuario.editar', compact('data', 'rols'));
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidarUsuario $request, $id)
    {
        $usuario = Usuario::findOrFail($id);
        //array_filder cuando llega un campo vacio no lo toma encuenta
        $usuario->update(array_filter($request->all()));
        //sync sincronisa los id de los roles 
        $usuario->roles()->sync($request->rol_id);
        return redirect('admin/usuario')->with('mensaje', 'Usuario actualizado con exito');
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request, $id)
    {
        if ($request->ajax()) {
            $usuario = Usuario::findOrFail($id);
            //al no pasarle un identificador le quita todos los roles al usuario el detach
            $usuario->roles()->detach();
            $usuario->delete();
            return response()->json(['mensaje' => 'ok']);
         } else {
            abort(404);
        }
    }
}
