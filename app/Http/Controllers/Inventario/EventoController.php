<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidarEvento;
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
    public function guardar(ValidarEvento $request)
    {
        //aqui se toma la decisión cuando es recepcion ingresan productos 
        if ($request->tipo == 'recepcion') {
                //aqui se llena tabla eventos
                //dd($request->all()); 
                $evento = new Evento;
                $evento->tipo = $request->tipo;
                $evento->cargo_1 = $request->cargo_1;
                $evento->entrega = $request->nombre_entrega;
                $evento->cargo_2 = $request->cargo_2;
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
        
        //aqui se toma la decisión para entregar productos        
        }elseif($request->tipo == 'entrega') {
            //aqui se llena tabla eventos
            //dd($request->all()); 
            $evento = new Evento;
            $evento->tipo = $request->tipo;
            $evento->cargo_1 = $request->cargo_1;
            $evento->entrega = $request->nombre_entrega;
            $evento->cargo_2 = $request->cargo_2;
            $evento->recibe = $request->nombre_recibe;
            $evento->unidad_id = $request->unidad;
            $evento->usuario_id = auth()->id();
            $evento->save();

            $productos = new Producto();
                for ($i=0; $i < count($request->id_producto); $i++) {
                        
                        //aqui se llena la tabla eventos_producto
                        $productos->find($request->id_producto[$i])->eventos()->attach($evento->id,['new_cantidad' => -intval($request->stock[array_keys($request->stock)[$i]]), 'old_cantidad' => $productos->find($request->id_producto[$i])->cantidad]);
                        
                        //aqui en la tabla productos se disminuye la cantidad
                        $producto = Producto::findOrFail($request->id_producto[$i]);
                        $producto->cantidad = $producto->cantidad - intval($request->stock[array_keys($request->stock)[$i]]);
                        $producto->save();
                        
                    
                }
                return redirect('evento/crear')->with('mensaje', 'Entrega con exito');
        
        //aqui se toma la decision solo aumentar catidad de productos ya existente en stock 
        }elseif($request->tipo == 'agregar') {
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
        //aqui se toma la decision de disminuir cantidad del producto ya existente en stock
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

    //editar los registros de la unidad el formulario
    public function editar($id)
    {
        $data = Evento::findOrFail($id);
        $unidades=Unidad::select('id','nombre')->get();
        return view('inventario.evento.editar', compact('data', 'unidades'));
    }

    //guarda la modifica en la base de datos tabla eventos
    public function actualizar(Request $request, $id)
    {
        //dd($id);
        if ($request->unidad) {
            //dd('hola1');
            $evento = Evento::findOrFail($id);
            $evento->cargo_1 = $request->cargo_1;
            $evento->entrega = $request->nombre_entrega;
            $evento->cargo_2 = $request->cargo_2;
            $evento->recibe = $request->nombre_recibe;
            $evento->unidad_id = $request->unidad;
            $evento->usuario_id = auth()->id();
            $evento->save();
            
            return redirect('evento')->with('mensaje', 'Evento fue actualizado con exito');                                    
        } else {
            // Evento::findOrFail($id)->update(['cargo_1' => request('cargo_1'), 
            //                                  'entrega' => request('nombre_entrega'), 
            //                                  'cargo_2' => request('cargo_2'),
            //                                  'recibe' => request('nombre_recibe'),
            //                                  'usuario_id' => auth()->id()]);
            $evento = Evento::findOrFail($id);
            $evento->cargo_1 = $request->cargo_1;
            $evento->entrega = $request->nombre_entrega;
            $evento->cargo_2 = $request->cargo_2;
            $evento->recibe = $request->nombre_recibe;
            $evento->usuario_id = auth()->id();
            $evento->save();
            return redirect('evento')->with('mensaje', 'Evento fue actualizado con exito');
            //dd('hola2');
        }
        
        // Evento::findOrFail($id)->update(['nombre' => request('nombre'),'usuario_id' => auth()->id()]);
        // return redirect('unidad')->with('mensaje', 'unidad fue actualizado con exito');
    }

}
