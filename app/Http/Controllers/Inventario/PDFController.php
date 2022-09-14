<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Controllers\Controller;
use PDF;
use App\Models\Inventario\Evento;
use App\Models\Inventario\Producto;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    //crear el recibo de salida en pdf
    public function comprobante_salida($id)
    {
        //dd($id);
        //return response()->json(['respuesta' => 23]);
        setlocale(LC_TIME,"es_MX.UTF-8");
        date_default_timezone_set("America/Mexico_City");
        //dd($id);
         $fecha = date('d-m-Y h:i:s a', time());
         $data = Evento::findOrFail($id);
         //$pdf = app('dompdf.wrapper');
         
         $pdf = PDF::loadView('inventario.pdf.VistaReciboPDF', compact('data', 'fecha'));
         $pdf->getDomPDF()->set_option("enable_php", true);
         //muestra la hoja de manera horizontal
         $pdf->setPaper('A4', 'landscape');
         //dd($pdf);
         return $pdf->stream();
        // return view('inventario.pdf.VistaReciboPDF', compact('data'));
    }
}
