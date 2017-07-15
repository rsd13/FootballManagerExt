<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participar extends Model
{
    protected $table = 'participar';


    public function partido(){

        return $this->belongsTo('App\Partido');
    }

    public function usuario(){
        return $this->belongsTo('App\Usuario');
    }


     public function usuarioOrdenadoPosicion(){
        return $this->usuario()->orderby('usuario.posicion');
    }





}
