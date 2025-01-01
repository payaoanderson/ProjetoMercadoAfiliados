<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginaEstaticasController extends Controller
{
    
      public function index(){
        
        return view("politica");
         
         
      }

      public function welcome(){
        
        return view("welcome");
      }
    
}
