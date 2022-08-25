<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidarUnidad;
use App\Models\Inventario\Unidad;
use Illuminate\Http\Request;

class UnidadController extends Controller
{
    //vista principal lista de Unidad de Medida
    public function index()
    {
        
        $unidades=Unidad::orderBy('id')->get();
        return view('inventario.unidad.index', compact('unidades'));
    }

    //vista del formulario para ingresar los datos poder registrar la unidad
    public function crear()
    {
        return view('inventario.unidad.crear');
    }

    //guardar los registros en la base de datos
    public function guardar(ValidarUnidad $request)
    {
        //dd(auth()->id());
        //dd(Auth::user()->usuario);
        Unidad::create([
            'nombre' => request('nombre'),
            'usuario_id' => auth()->id()
        ]);
        return redirect('unidad/crear')->with('mensaje', 'unidad creada con exito');
    }

    //editar los registros de la unidad el formulario
    public function editar($id)
    {
        $data = Unidad::findOrFail($id);
        return view('inventario.unidad.editar', compact('data'));
    }

    //guarda la modifica en la base de datos
    public function actualizar(ValidarUnidad $request, $id)
    {
        Unidad::findOrFail($id)->update(['nombre' => request('nombre'),'usuario_id' => auth()->id()]);
        return redirect('unidad')->with('mensaje', 'unidad fue actualizado con exito');
    }

     //eliminar el registro
     public function eliminar(Request $request,$id)
    {
        //dd(Producto::destroy($id));
        if ($request->ajax()) {
            if (Unidad::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }


    //buscar por el nombre de los diferentes unidades registradas 
    //aqui realizamos la busqueda de las diferentes unidades llamado desde ajax
    public function buscarunidad(Request $request)
    {
        
        //return response()->json(['respuesta' => $request->input('kit_id')]);
        
        if ($request->ajax()) {
            $unidades = Unidad::where('nombre','like',"%{$request->input('search')}%")->get();
            
            return view('inventario.unidad.tabla_unidades', compact('unidades'));
           
        } else {
            abort(404);
        }
    }
}
