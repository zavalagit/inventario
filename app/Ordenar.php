<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordenar extends Model
{
    protected $table = "ordenar";

    protected $fillable = ['id_plantilla','id_kit', 'id_marcador'];

    public function kits(){
        return $this->belongsTo('App\Kit','id_kit');
     }
    
     public function marcadores(){
        return $this->belongsTo('App\Marcador','id_marcador');
     }
     
     public function plantillas(){
      return $this->belongsTo('App\Plantilla','id_plantilla');
   }
}
