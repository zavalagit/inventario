<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Muestras extends Model
{
    protected $table = "muestras";

    protected $fillable = [
    	'fecha_muestra',
    	'fecha_captura',
        'muestra',
        'Nombre',
        'Nota',
        'kit',
        'identificado',
        'ultima_modifica',
        'grupo',
        'estado',
    ];

    public function kits(){
        return $this->belongsTo('App\Kit','kit');
     }

     public function grupos(){
        return $this->belongsTo('App\Grupos','grupo');
     }

     public function estados(){
        return $this->belongsTo('App\Estados','estado');
     }

     public function capturavalores(){
      return $this->hasMany('App\Capturavalores','id_muestra');
   }
}
