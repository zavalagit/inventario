<?php

namespace App\Models\Genetica;

use Illuminate\Database\Eloquent\Model;

class Marcador extends Model
{
    protected $table = "marcadores";
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];

    //relacion de muchos a muchos tabla marcadores con tabla kit
    public function kits()
    {
        return $this->belongsToMany(Kit::class, 'kit_marcador', 'marcador_id', 'kit_id');
    }

    //uno a muchos secuenciavalor
    public function valores()
    {
        return $this->hasMany(Secuenciavalor::class,'marcador_id');
    }
}
