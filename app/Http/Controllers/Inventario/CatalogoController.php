<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidarProducto;
use App\Models\Inventario\Material;
use App\Models\Inventario\Producto;
use App\Models\Inventario\Unidadmedida;
use Illuminate\Http\Request;
use Auth;

class CatalogoController extends Controller
{
    //vista principal lista de productos
    public function index()
    {
        
        $Productos=Producto::orderBy('id')->get();
        return view('inventario.producto.index', compact('Productos'));
    }

    //vista del formulario para ingresar los datos poder registrar
    public function crear()
    {
        $medidas=Unidadmedida::select('id','nombre')->get();
        $materiales=Material::select('id','nombre')->get();
        // return view('inventario.producto.crear');
        return view('inventario.producto.crear', compact('medidas', 'materiales'));
    }

    //guardar los registros
    public function guardar(ValidarProducto $request)
    {
        //dd($request->medida);
        //dd(Auth::user()->usuario);
        Producto::create([
            'nombre' => request('nombre'),
            'unidadmedida_id' => $request->medida,
            'material_id' => $request->material,
            'usuario_id' => auth()->id()
        ]);
        return redirect('producto/crear')->with('mensaje', 'producto creado con exito');
    }

    //editar los registros muestra el formulario
    public function editar($id)
    {
        
        $data = Producto::findOrFail($id);
        //dd($data->firstWhere('unidadmedida_id', $data->unidadmedida_id));
        $medidas=Unidadmedida::select('id','nombre')->get();
        $materiales=Material::select('id','nombre')->get();
        //$medidas=Unidadmedida::all();
        return view('inventario.producto.editar', compact('data', 'medidas', 'materiales'));
    }

    //guarda la modifica en la base de datos
    public function actualizar(ValidarProducto $request, $id)
    {
        Producto::findOrFail($id)->update(['nombre' => request('nombre'), 'unidadmedida_id' => $request->medida, 'material_id' => $request->material, 'usuario_id' => auth()->id()]);
        return redirect('producto')->with('mensaje', 'Producto actualizado con exito');
    }

    public function eliminar(Request $request,$id)
    {
        if ($request->ajax()) {
            if (Producto::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }

    //buscar producto
    //aqui realizamos la busqueda de productos llamado de ajax
    public function buscarproducto(Request $request)
    {
        
        //return response()->json(['respuesta' => $request->input('kit_id')]);
        
        if ($request->ajax()) {
            $Productos = Producto::where('nombre','like',"%{$request->input('search')}%")->get();
            
            return view('inventario.producto.tabla_productos', compact('Productos'));
           
        } else {
            abort(404);
        }
    }

}
