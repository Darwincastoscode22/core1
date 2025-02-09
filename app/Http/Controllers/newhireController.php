<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class newhireController extends Controller
{
  public function index(){

     
         return view('content.core.newhire-view');
   }
}
