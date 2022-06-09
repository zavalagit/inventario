<?php

namespace App\Models\Genetica;

use Illuminate\Database\Eloquent\Model;

class Secuenciavalor extends Model
{
    protected $table = "secuenciasvalores";
    protected $fillable = ['valor'];

    //uno a muchos inversa con marcadores
    public function marcador()
    {
        return $this->belongsTo(Marcador::class,'marcador_id');
    }

    //uno a muchos inversa con str
    public function str()
    {
        return $this->belongsTo(Str::class,'str_id');
    }


}
