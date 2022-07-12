<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Controllers\Controller;
use App\Models\Inventario\Producto;
use Illuminate\Http\Request;

class BuscarController extends Controller
{
    public function productos(Request $request){
        //recuperamos los datos que madamos del ajax
        $term = $request->get('term');

        $querys = Producto::where('nombre', 'LIKE', '%'.$term.'%')->get();

        $data = [];

        foreach ($querys as $query) {
            $data[] = [
                'id' => $query->id,
                'label' => $query->nombre,
                'stock' => $query->cantidad,
                'medida' => $query->medida->nombre
            ];
        }

        return $data
        ;

    }
}
