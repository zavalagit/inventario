<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Muestras;
use App\Capturavalores;
use App\Marcador;
use App\Kit;
use App\Grupos;
use App\Estados;
use App\Ordenar;
use App\Plantilla;
use App\Exports\ExcelViewExport;
use Maatwebsite\Excel\Facades\Excel;

class GeneticaController extends Controller
{
    //
    public function home()
    {
        return view('plantilla');
    }

    public function inicio()
    {
        return view('inicio');
    }

    public function todas(Request $request)
    {

        if ( $request->has('buscar_btn') && ($request->filled('buscar_muestra') || $request->filled('buscar_nombre') || $request->filled('buscar_nota')) ) {
            $muestras = Muestras::where(function($q) use($request){
                if ( $request->filled('buscar_muestra') ) {
                    $q->where(function($a) use($request){
                       $a->where('muestra','like',"%{$request->buscar_muestra}%");
                    
                    });
                 }
                 if ( $request->filled('buscar_nombre') ) {
                    $q->where(function($a) use($request){
                       $a->where('Nombre','like',"%{$request->buscar_nombre}%");
                    
                    });
                 }
                 if ( $request->filled('buscar_nota') ) {
                    $q->where(function($a) use($request){
                       $a->where('Nota','like',"%{$request->buscar_nota}%");
                    
                    });
                 }
            })
            ->get();

            if($request->buscar_btn === 'pdf'){
                // $pdf = PDF::loadView('pdf.pdf_cadenas_entradas', compact(['cadenas']));
                // $pdf->setPaper('A4', 'landscape');
                // //return $pdf->download(); //descarga el pdf
                // return $pdf->stream(); //muestra el pdf
             }
             elseif ($request->buscar_btn === 'excel'){
                //return Excel::download(new ExcelViewExport("excel.excel_entradas", $cadenas));
                return Excel::download(new ExcelViewExport("excel.excel_muestras", $muestras),'consulta_muestra.xlsx');
             }
        }else{
            $muestras = Muestras::take(10)->get();
        }
        // $muestras = Muestras::where('muestra','443/08')->get();
        
        return view('todas_muestras',[
            'muestras' => $muestras,
            'buscar_muestra' => $request->buscar_muestra,
            'buscar_nombre' => $request->buscar_nombre,
            'buscar_nota' => $request->buscar_nota,
            
         ]);
    }

    public function kit(Request $request)
    {

        if ( $request->has('buscar_btn') && ($request->filled('buscar_kit'))) {
            
           
            
                    $muestras = Muestras::where(function($q) use($request){
                        if ( $request->filled('buscar_kit') ) {
                            $q->where(function($a) use($request){
                            $a->where('kit',$request->buscar_kit)->where('grupo',$request->buscar_grupo);
                            
                            });
                        }
                        
                    })
                    ->get();
                    
                    $orden_marcadores = Ordenar::where('id_kit',$request->buscar_kit)->where('id_plantilla',$request->buscar_plantilla)->get();
                    $nombre_kit = Kit::where('id',$request->buscar_kit)->value('descripcion');
                    
            //dd([$muestras,$orden_marcadores]);
           //dd($nombre_kit);
            if($request->buscar_btn === 'pdf'){
                // $pdf = PDF::loadView('pdf.pdf_cadenas_entradas', compact(['cadenas']));
                // $pdf->setPaper('A4', 'landscape');
                // //return $pdf->download(); //descarga el pdf
                // return $pdf->stream(); //muestra el pdf
             }
             elseif ($request->buscar_btn === 'excel'){
                //return Excel::download(new ExcelViewExport("excel.excel_entradas", $cadenas));
                if ($request->buscar_plantilla == 1 ){
                    return Excel::download(new ExcelViewExport("excel.excel_".$request->buscar_plantilla,['muestras'=>$muestras,'orden_marcadores'=> $orden_marcadores]),'consulta_Victim_'.$nombre_kit.'.xlsx');
                }elseif($request->buscar_plantilla == 2){
                    return Excel::download(new ExcelViewExport("excel.excel_".$request->buscar_plantilla,['muestras'=>$muestras,'orden_marcadores'=> $orden_marcadores]),'consulta_Family_'.$nombre_kit.'.xlsx');
                }else{
                    return Excel::download(new ExcelViewExport("excel.excel_".$request->buscar_plantilla,['muestras'=>$muestras,'orden_marcadores'=> $orden_marcadores]),'consulta_Extended_Family_'.$nombre_kit.'.xlsx');
                }
                
             }
        }
        else{
            $muestras = Muestras::take(10)->get();
            $orden_marcadores = Ordenar::where('id_kit',1)->where('id_plantilla',1)->get();
        }
        // $muestras = Muestras::where('muestra','443/08')->get();
        $kits = Kit::all();
        $plantillas = Plantilla::all();
       
       
        
            
            return view('kit',[
                'muestras' => $muestras,
                'orden_marcadores' => $orden_marcadores,
                'buscar_kit' => $request->buscar_kit,
                'kits' => $kits,
                'buscar_plantilla' => $request->buscar_plantilla,
                'plantillas' => $plantillas,
                'buscar_grupo' => $request->buscar_grupo,  
             ]);
        
        
       
    }

}
