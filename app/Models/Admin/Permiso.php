<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $table = "permisos";
    protected $fillable = ['nombre', 'slug'];
    protected $guarded = ['id'];

    //relacion de muchos a muchos tabla permisos con tabla rol
    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'permiso_rol', 'permiso_id', 'rol_id');
    }
}
