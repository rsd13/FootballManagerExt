<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
      protected $table = 'temporada';
      protected $dates = ['inicio', 'fin'];


      public function partido(){
            return $this->hasMany('App\Partido');
      }
     

     public function temporadaActual(){
           $temporadaActual = Temporada::where('inicio','<=',Carbon::now())
            ->where('fin','>=',Carbon::now())->first();
            
            return $this->jugar()->where('temporada_id','=',  $temporadaActual->id);
     }

      /*public function partidos(){
            return $this->belongsToMany('App\Partido','jugar','temporada_id','competicion_id'); 
      }


      public function competiciones(){
            return $this->belongsToMany('App\Competicion','jugar','partido_id','temporada_id'); //->withPivot('user_id') if you need saving
      }*/
}
