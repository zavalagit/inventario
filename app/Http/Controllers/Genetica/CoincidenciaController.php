<?php

namespace App\Http\Controllers\Genetica;

use App\Http\Controllers\Controller;
use App\Models\Genetica\Secuenciavalor;
use App\Models\Genetica\Str;
use Illuminate\Http\Request;

class CoincidenciaController extends Controller
{
    //vista de los hits por cada muestra
    public function index($id)
    {
         $secuencias = Secuenciavalor::where('str_id', '<>', $id)->get();
         //dd($secuencias);
         $busqueda_marcador = Secuenciavalor::where('str_id',$id)->pluck('marcador_id');
         $busqueda_valor = Secuenciavalor::where('str_id',$id)->pluck('valor');
         $lista_str = collect([]);
         //$lista = collect([]);

        for ($i=0; $i < count($busqueda_valor); $i++){
            $encontre = $secuencias->where('valor', $busqueda_valor[$i])->where('marcador_id', $busqueda_marcador[$i]);
            //$lista->push($encontre->pluck('str_id'));
            $lista_str = $lista_str->concat($encontre->pluck('str_id')->unique());
        }
        //dd($lista->all());
         $resultado_busqueda = $lista_str->countBy();
         //dd($resultado_busqueda->all());
        return view('genetica.coincidencia.index' , compact('resultado_busqueda', 'id'));
    }

    //recibimos los checkbox queremos analizar
    public function analizar(Request $request)
    {
        //dd($request->analizar);
        $str_selecionados = Str::findOrFail($request->analizar_secuencia);
        $str_analizar = Str::findOrFail($request->analizar);
        //dd($str_analizar);
        return view('genetica.coincidencia.analizar' , compact('str_analizar', 'str_selecionados'));
    }

    

    

    

    

    
}
