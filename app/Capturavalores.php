<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capturavalores extends Model
{
    protected $table = "captura_valores";

    protected $fillable = [
    	'id_muestra',
    	'id_locus',
        'valor_locus',
    	'valor_locus2',
    ];

    public function muestras(){
        return $this->belongsTo('App\Muestras');
     }


     public function marcadores(){
        return $this->belongsTo('App\Marcador','id_locus');
     }

}
