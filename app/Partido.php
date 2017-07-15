<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
      protected $table = 'partido';
      protected $dates = ['fecha'];



      public function competicion(){

            return $this->belongsTo('App\Competicion');
      }

      public function temporada(){
            return $this->belongsTo('App\Temporada');
      }

      public function estadio(){
            return $this->belongsTo('App\Estadio');
      }

      public function equipoVisitante(){
            return $this->belongsTo('App\Equipo','equipoVisitante_id');
      }

      public function equipoLocal(){
            return $this->belongsTo('App\Equipo','equipoLocal_id');
      }


      public function participar(){
            return $this->hasMany('App\Participar');
      }
     


      


}
