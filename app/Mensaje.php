<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensajes extends Model
{
    protected $table = 'mensaje';


    public function usuario1(){
          return $this->belongsTo('App\Equipo','usuario1_id');
    }

    public function usuario2(){
          return $this->belongsTo('App\Equipo','usuario2_id');
    }


}
