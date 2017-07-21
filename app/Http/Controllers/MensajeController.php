<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Redirect;
use App\Usuario;
use App\Equipo;
use Auth;

use Intervention\Image\ImageManagerStatic as Image;

class MensajeController extends Controller
{

  public function getMensajes(){


      return view('config/mensajes/mensaje');

      return back();

  }

}
