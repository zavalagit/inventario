<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marcador extends Model
{
    protected $table = "locus";

    protected $fillable = ['LOCUS'];

    public function capturavalores(){
        return $this->hasMany('App\Capturavalores','id');
    }
}
