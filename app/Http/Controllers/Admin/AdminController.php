<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function index()
    {
        //dd(session()->all());
        //vista de una grafica o una estadistica de libros o un informe general 
        return view('admin.admin.index');
    }

   
}
