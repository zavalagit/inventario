<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = "eventos";
    protected $fillable = ['tipo', 'unidad_id', 'usuario_id'];

    //uno a muchos
    public function unidad()
    {
        return $this->belongsTo('App\Models\Inventario\Unidad','unidad_id');
    }

    //uno a muchos
    public function usuarios()
    {
        return $this->belongsTo('App\Models\Seguridad\Usuario','usuario_id');
    }

    //relacion de muchos a muchos tabla eventos con tabla productos
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'evento_producto', 'evento_id', 'producto_id')->withPivot('new_cantidad', 'old_cantidad')->withTimestamps();
    }

}
