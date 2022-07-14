<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Controllers\Controller;
use App\Models\Inventario\Evento;
use App\Models\Inventario\Producto;
use App\Models\Inventario\Unidad;
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
        $unidades=Unidad::select('id','nombre')->get();
        return view('inventario.evento.crear', compact('unidades'));
    }

    //aqui se guarda a la base de datos 
    public function guardar(Request $request)
    {
        if ($request->tipo == 'recepcion') {
                //aqui se llena tabla eventos
                //dd($request->all()); 
                $evento = new Evento;
                $evento->tipo = $request->tipo;
                $evento->entrega = $request->nombre_entrega;
                $evento->recibe = $request->nombre_recibe;
                $evento->usuario_id = auth()->id();
                $evento->save();
                //dd($request->all());
                $productos = new Producto();
                for ($i=0; $i < count($request->id_producto); $i++) {
                        //dd($productos->cantidad);
                        //aqui se llena la tabla eventos_producto
                        $productos->find($request->id_producto[$i])->eventos()->attach($evento->id,['new_cantidad' => intval($request->stock[array_keys($request->stock)[$i]]), 'old_cantidad' => $productos->find($request->id_producto[$i])->cantidad]);
                        
                        //aqui en la tabla productos se aumenta la cantidad
                        $producto = Producto::findOrFail($request->id_producto[$i]);
                        $producto->cantidad = $producto->cantidad + intval($request->stock[array_keys($request->stock)[$i]]);
                        $producto->save();
                        
                    
                }
                return redirect('evento/crear')->with('mensaje', 'evento recepcion actualizado con exito');
            
        } elseif($request->tipo == 'entrega') {
            //aqui se llena tabla eventos 
            $evento = new Evento;
            $evento->tipo = $request->tipo;
            $evento->entrega = $request->nombre_entrega;
            $evento->recibe = $request->nombre_recibe;
            $evento->unidad_id = $request->unidad;
            $evento->usuario_id = auth()->id();
            $evento->save();

            $productos = new Producto();
                for ($i=0; $i < count($request->id_producto); $i++) {
                        
                        //aqui se llena la tabla eventos_producto
                        $productos->find($request->id_producto[$i])->eventos()->attach($evento->id,['new_cantidad' => -intval($request->stock[array_keys($request->stock)[$i]]), 'old_cantidad' => $productos->find($request->id_producto[$i])->cantidad]);
                        
                        //aqui en la tabla productos se aumenta la cantidad
                        $producto = Producto::findOrFail($request->id_producto[$i]);
                        $producto->cantidad = $producto->cantidad - intval($request->stock[array_keys($request->stock)[$i]]);
                        $producto->save();
                        
                    
                }
                return redirect('evento/crear')->with('mensaje', 'Entrega con exito');
        } elseif($request->tipo == 'agregar') {
            //aqui se llena tabla eventos
            $evento = new Evento;
            $evento->tipo = $request->tipo;
            $evento->usuario_id = auth()->id();
            $evento->save();

            $productos = new Producto();
                for ($i=0; $i < count($request->id_producto); $i++) {
                        
                        //aqui se llena la tabla eventos_producto
                        $productos->find($request->id_producto[$i])->eventos()->attach($evento->id,['new_cantidad' => intval($request->stock[array_keys($request->stock)[$i]]), 'old_cantidad' => $productos->find($request->id_producto[$i])->cantidad]);
                        
                        //aqui en la tabla productos se aumenta la cantidad
                        $producto = Producto::findOrFail($request->id_producto[$i]);
                        $producto->cantidad = $producto->cantidad + intval($request->stock[array_keys($request->stock)[$i]]);
                        $producto->save();
                        
                    
                }
                return redirect('evento/crear')->with('mensaje', 'Agregaron en stock con exito');


        }
        elseif($request->tipo == 'cancelar'){
            //dd($request->all());
            //aqui se llena tabla eventos
            $evento = new Evento;
            $evento->tipo = $request->tipo;
            $evento->usuario_id = auth()->id();
            $evento->save();

            $productos = new Producto();
                for ($i=0; $i < count($request->id_producto); $i++) {
                        //dd($productos->cantidad);
                        //aqui se llena la tabla eventos_producto
                        $productos->find($request->id_producto[$i])->eventos()->attach($evento->id,['new_cantidad' => -intval($request->stock[array_keys($request->stock)[$i]]), 'old_cantidad' => $productos->find($request->id_producto[$i])->cantidad]);
                        
                        //aqui en la tabla productos se aumenta la cantidad
                        $producto = Producto::findOrFail($request->id_producto[$i]);
                        $producto->cantidad = $producto->cantidad - intval($request->stock[array_keys($request->stock)[$i]]);
                        $producto->save();
                        
                    
                }
                return redirect('evento/crear')->with('mensaje', 'Disminuye el stock exito');

        }
       
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
