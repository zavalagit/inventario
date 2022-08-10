<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidarMedida;
use App\Models\Inventario\Unidadmedida;
use Illuminate\Http\Request;
use Auth;

class UnidadmedidaController extends Controller
{
    //vista principal lista de Unidad de Medida
    public function index()
    {
        
        $Medidas=Unidadmedida::orderBy('id')->get();
        return view('inventario.medida.index', compact('Medidas'));
    }

    //vista del formulario para ingresar los datos poder registrar
    public function crear()
    {
        return view('inventario.medida.crear');
    }

    //guardar los registros en la base de datos
    public function guardar(ValidarMedida $request)
    {
        //dd(auth()->id());
        //dd(Auth::user()->usuario);
        Unidadmedida::create([
            'nombre' => request('nombre'),
            'usuario_id' => auth()->id()
        ]);
        return redirect('medida/crear')->with('mensaje', 'unidad de medida creada con exito');
    }

    //editar los registros de unidad de medida el formulario
    public function editar($id)
    {
        $data = Unidadmedida::findOrFail($id);
        return view('inventario.medida.editar', compact('data'));
    }

     //guarda la modifica en la base de datos
     public function actualizar(ValidarMedida $request, $id)
     {
         Unidadmedida::findOrFail($id)->update(['nombre' => request('nombre'),'usuario_id' => auth()->id()]);
         return redirect('medida')->with('mensaje', 'unidad de medida actualizado con exito');
     }

     //eliminar el registro
     public function eliminar(Request $request,$id)
    {
        //dd(Producto::destroy($id));
        if ($request->ajax()) {
            if (Unidadmedida::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }

    //buscar unidad de medida
    //aqui realizamos la busqueda de una unidad de medida llamado desde ajax
    public function buscarmedida(Request $request)
    {
        
        //return response()->json(['respuesta' => $request->input('kit_id')]);
        
        if ($request->ajax()) {
            $Medidas = Unidadmedida::where('nombre','like',"%{$request->input('search')}%")->get();
            
            return view('inventario.medida.tabla_medidas', compact('Medidas'));
           
        } else {
            abort(404);
        }
    }

}
