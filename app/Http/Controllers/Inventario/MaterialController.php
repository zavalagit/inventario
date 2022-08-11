<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidarMaterial;
use App\Models\Inventario\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    //vista principal lista del catalogo de materiales
    public function index()
    {
        
        $materiales=Material::orderBy('id')->get();
        return view('inventario.material.index', compact('materiales'));
    }

    //vista del formulario para ingresar los datos poder registrar material
    public function crear()
    {
        return view('inventario.material.crear');
    }

    //guardar los registros en la base de datos
    public function guardar(ValidarMaterial $request)
    {
        //dd(auth()->id());
        //dd(Auth::user()->usuario);
        Material::create([
            'nombre' => request('nombre'),
            'usuario_id' => auth()->id()
        ]);
        return redirect('material/crear')->with('mensaje', 'Material creada con exito');
    }

    //editar los registros de unidad de medida el formulario
    public function editar($id)
    {
        $data = Material::findOrFail($id);
        return view('inventario.material.editar', compact('data'));
    }

    //guarda la modifica en la base de datos
    public function actualizar(ValidarMaterial $request, $id)
    {
        Material::findOrFail($id)->update(['nombre' => request('nombre'),'usuario_id' => auth()->id()]);
        return redirect('material')->with('mensaje', 'catalo de materiales actualizado con exito');
    }

    //eliminar el registro
    public function eliminar(Request $request,$id)
    {
        //dd(Producto::destroy($id));
        if ($request->ajax()) {
            if (Material::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }

     //buscar nombre de los diferentes catalogos de materiales 
    //aqui realizamos la busqueda de las diferentes catalogos de materiales llamado desde ajax
    public function buscarmaterial(Request $request)
    {
        
        //return response()->json(['respuesta' => $request->input('kit_id')]);
        
        if ($request->ajax()) {
            $materiales = Material::where('nombre','like',"%{$request->input('search')}%")->get();
            
            return view('inventario.material.tabla_material', compact('materiales'));
           
        } else {
            abort(404);
        }
    }
}
