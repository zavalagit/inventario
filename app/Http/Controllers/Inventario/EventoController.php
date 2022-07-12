<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Controllers\Controller;
use App\Models\Inventario\Evento;
use App\Models\Inventario\Producto;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    //vista principal lista de eventos con diferentes tipos (entrada, salida, agregar, cancelar)
    public function index()
    {
        
        $eventos=Evento::orderBy('id')->get();
        return view('inventario.evento.index', compact('eventos'));
    }

    //vista del formulario para ingresar los datos poder registrar
    public function crear()
    {
        return view('inventario.evento.crear');
    }

    public function guardar(Request $request)
    {
        dd($request->all());
        //dd(Auth::user()->usuario);
        // Producto::create([
        //     'nombre' => request('nombre'),
        //     'unidadmedida_id' => $request->medida,
        //     'usuario_id' => auth()->id()
        // ]);
        // return redirect('producto/crear')->with('mensaje', 'producto creado con exito');
    }

    //agrega un Input para ingresar valor al marcador
    public function AgregarInput(Request $request)
    {
        
        
        
        if ($request->ajax()) {

            $numero = $request->numero;
            //dd($numero);
            return view('inventario.evento.form', compact('numero'));

     
            return response()->json(['respuesta' => 'esta bien']);
           
        } else {
            abort(404);
        }
    }

}
