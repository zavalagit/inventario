<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Model;

class Unidadmedida extends Model
{
    protected $table = "unidadmedidas";
    protected $fillable = ['nombre', 'usuario_id'];
    
    //uno a muchos
    public function usuarios()
    {
        return $this->belongsTo('App\Models\Seguridad\Usuario','usuario_id');
    }
}
