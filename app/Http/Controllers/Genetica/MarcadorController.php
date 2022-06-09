<?php

namespace App\Http\Controllers\Genetica;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidarMarcador;
use App\Models\Genetica\Marcador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MarcadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(session()->all());
        //ESTA FUNCION DA PERMISO DE ENTRAR AL USUARIO TABLA USUARIO-ROL ESTA ASIGNADO
        can('listar-marcadores');
        //Cache::put('prueba', 'Esto es un dato en cache');
        //Cache:: tags(['permiso'])->put('permiso.1', ['listar-marcadores', 'crear-marcadores']);
        //dd(Cache::tags('permiso')->get('key'));
        //Cache::tags(['permiso'])->flush();
        $marcadores=Marcador::orderBy('id')->get();
        return view('genetica.marcador.index', compact('marcadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        return view('genetica.marcador.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidarMarcador $request)
    {
        Marcador::create($request->all());
        return redirect('marcador/crear')->with('mensaje', 'Marcador creado con exito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        $data = Marcador::findOrFail($id);
        return view('genetica.marcador.editar', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidarMarcador $request, $id)
    {
        Marcador::findOrFail($id)->update($request->all());
        return redirect('marcador')->with('mensaje', 'Marcador actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request,$id)
    {
        if ($request->ajax()) {
            if (Marcador::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
