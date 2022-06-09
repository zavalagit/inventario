<?php

namespace App\Models\Seguridad;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Admin\Rol;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class Usuario extends Authenticatable
{
    protected $remember_token = false;
    protected $table = 'usuarios';
    protected $fillable = ['usuario', 'nombre', 'password'];
    

    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'rol_usuario');
    }

    public function setSession($roles)
    {
        Session::put([
            'usuario' => $this->usuario,
            'usuario_id' => $this->id,
            'nombre_usuario' => $this->nombre
        ]);
        if (count($roles) == 1) {
            Session::put(
                [
                    'rol_id' => $roles[0]['id'],
                    'rol_nombre' => $roles[0]['nombre'],
                ]
            );
        }else {
            Session::put('roles', $roles);
        }
    }

    public function setPasswordAttribute($pass)
    {
        $this->attributes['password'] = Hash::make($pass);
    }

}
