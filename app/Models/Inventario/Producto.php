<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = "productos";
    protected $fillable = ['nombre','unidadmedida_id', 'material_id', 'usuario_id'];
    
    //uno a muchos
    public function usuarios()
    {
        return $this->belongsTo('App\Models\Seguridad\Usuario','usuario_id');
    }

    public function medida()
    {
        return $this->belongsTo('App\Models\Inventario\Unidadmedida','unidadmedida_id');
    }

    public function material()
    {
        return $this->belongsTo('App\Models\Inventario\Material','material_id');
    }

    //relacion de muchos a muchos tabla productos con tabla eventos
    public function eventos()
    {
        return $this->belongsToMany(Evento::class, 'evento_producto', 'producto_id', 'evento_id')->withTimestamps();
    }
}
