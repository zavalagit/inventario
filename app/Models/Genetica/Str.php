<?php

namespace App\Models\Genetica;

use Illuminate\Database\Eloquent\Model;

class Str extends Model
{
    protected $table = "strs";
    protected $fillable = ['folio'];

    // uno a muchos relacion
    public function valores()
    {
        return $this->hasMany(Secuenciavalor::class,'str_id');
    }

    //uno a muchos inversa con kit
    public function kit()
    {
        return $this->belongsTo(Kit::class,'kit_id');
    }

    // //uno a muchos con la tabla marcadores
    // public function marcadores()
    // {
    //     return $this->hasMany(Marcador::class,'id');
    // }
}
