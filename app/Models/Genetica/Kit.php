<?php

namespace App\Models\Genetica;

use Illuminate\Database\Eloquent\Model;

class Kit extends Model
{
    protected $table = "kits";
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];

    //relacion de muchos a muchos tabla intermedia kit_marcadores marcadores con tabla kit
    public function marcadores()
    {
        return $this->belongsToMany(Marcador::class, 'kit_marcador', 'kit_id', 'marcador_id')->withPivot('id', 'orden')->orderBy('orden');
    }
}
