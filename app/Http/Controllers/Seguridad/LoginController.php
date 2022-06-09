<?php

namespace App\Http\Controllers\Seguridad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    //invocar el formulario del login 
    public function index()
    {
        return view('seguridad.index');
    }

    protected function authenticated(Request $request, $user)
    {
        $roles = $user->roles()->where('estado', 1)->get();
        if ($roles->isNotEmpty()) {
            $user->setSession($roles->toArray());
        } else {
            //redireccionando
            $this->guard()->logout();
            //matando la seccion
            $request->session()->invalidate();
            //mandando el mensaje
            return redirect('seguridad/login')->withErrors(['error' => 'Este usuario no tiene un rol activo']);
        }
    }

    

    public function username()
    {
        return 'usuario';
    }

}
