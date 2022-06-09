<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kit extends Model
{
    protected $table = "kit";

   protected $fillable = ['descripcion'];

  

 public function muestras(){
    return $this->hasMany('App\Muestras');
}

}
