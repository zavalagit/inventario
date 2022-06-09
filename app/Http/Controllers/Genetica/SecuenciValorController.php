<?php

namespace App\Http\Controllers\Genetica;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidarValor;
use App\Models\Genetica\Kit;
use App\Models\Genetica\Secuenciavalor;
use App\Models\Genetica\Str;
use Illuminate\Http\Request;

class SecuenciValorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $muestras=Str::orderBy('id')->get();
        return view('genetica.secuencia.index', compact('muestras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $accion = 'registrar';
        $kits=Kit::orderBy('id')->pluck('nombre', 'id')->toArray();
        return view('genetica.secuencia.crear', compact('kits', 'accion'));
    }

    //listado de marcadores
    public function ListaMarcadores(Request $request)
    {
        
        //dd($kit);
        
        if ($request->ajax()) {
            //$kit = Kit::find($request->input('kit_id'));
            //manda el listado de marcadores que corresponden al id del kit y ordenado por la tabla kit_marcadores
            $listamarcadores = Kit::find($request->input('kit_id'))->marcadores()->orderBy('orden', 'asc')->get();
            return view('genetica.secuencia.lista_marcadores', compact('listamarcadores'));

            // foreach ($request->posicion as $or => $marcador_id){ 
            //     $kit->marcadores()->updateExistingPivot($marcador_id, ['orden' => $or]);
            //     }
            
            //return response()->json(['respuesta' => $kit]);
           
        } else {
            abort(404);
        }
    }

    //agrega un Input para ingresar valor al marcador
    public function AgregarInput(Request $request)
    {
        
        //dd($kit);
        
        if ($request->ajax()) {
            
            //$listamarcadores = Kit::find($request->input('kit_id'))->marcadores()->orderBy('orden', 'asc')->get();
            $marcador_id = $request->marcador_id;
            $numero = $request->numero;
            return view('genetica.secuencia.input', compact('marcador_id', 'numero'));

            
            
            return response()->json(['respuesta' => $request->numero]);
           
        } else {
            abort(404);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidarValor $request)
    {
       
        
        if ($request->ajax()) {
            //guardar en tabla strs
            $str = new Str;
            $str->folio = $request->folio;
            $str->kit_id = $request->kit_id;
            $str->save();
            
            //guardar en tabla secuenciasvalores
            for ($i=0; $i < count($request->valor); $i++) {
                for ($j=1; $j <= count($request->valor[array_keys($request->valor)[$i]]); $j++) {
                    $secuencia = new Secuenciavalor;
                    $secuencia->str_id = $str->id;
                    $secuencia->marcador_id = array_keys($request->valor)[$i];
                    $secuencia->valor = $request->valor[array_keys($request->valor)[$i]][$j];
                    $secuencia->save();
                 }
             }
            //total de marcadores = 16
            //count($request->input('valor')
            //total de valores dentro del marcador 10
            //count($request->valor['10'])
            //para optener todos los indicios -> [10, 2, 18, 17, 25, 12, 13, 14, 16, 4, 24, 5, 15, 3, 11, 29]
            //array_keys($request->valor)[1] da el indicio
            
            return response()->json(['mensaje' => 'ok']);
           
        } else {
            return response()->json(['mensaje' => 'ng']);
        }
    
    }

    public function actualizar(ValidarValor $request, $id)
    {
        //return response()->json(['mensaje' => $request->kit_id]);
        $str_old = Str::findOrFail($id);
        
        if ($request->ajax()) {
            if (Str::destroy($id)) {
                        //guardar en tabla strs
                        $str = new Str;
                        $str->folio = $request->folio;
                        $str->kit_id = $request->kit_id;
                        $str->created_at = $str_old->created_at;
                        $str->save();
            
                        //guardar en tabla secuenciasvalores
                        for ($i=0; $i < count($request->valor); $i++) {
                            for ($j=1; $j <= count($request->valor[array_keys($request->valor)[$i]]); $j++) {
                                $secuencia = new Secuenciavalor;
                                $secuencia->str_id = $str->id;
                                $secuencia->marcador_id = array_keys($request->valor)[$i];
                                $secuencia->valor = $request->valor[array_keys($request->valor)[$i]][$j];
                                $secuencia->created_at = $str_old->created_at;
                                $secuencia->save();
                            }
                        }
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
           
        } else {
            return response()->json(['mensaje' => 'ng']);
        }
    
    }

    //manda valores a la vista para poder editar
    public function editar($id, $accion = 'editar')
    {
        //dd($accion);
        // $kits=Kit::orderBy('id')->pluck('nombre', 'id')->toArray();
        // $data = Str::findOrFail($id);
        //return view('genetica.secuencia.editar', compact('data', 'kits', 'accion'));

        // dd( Str::findOrFail($id) );
        return view('genetica.secuencia.editar',[
            'str' => Str::findOrFail($id),
            'kits' => Kit::orderBy('id')->pluck('nombre', 'id')->toArray(),
            'accion' => $accion,
        ]);

    }
    //mandar los datos por ajax al blade ver_tabla
    public function ver(Request $request)
    {
        //return response()->json(['respuesta' => $request->secuencia]);
        if ($request->ajax()) {

            $analizar = Str::findOrFail($request->secuencia);
            return view('genetica.secuencia.ver_tabla', compact('analizar'));


        }
        

    }


    
}
