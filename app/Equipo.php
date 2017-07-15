<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Equipo extends Model
{
      protected $table = 'equipo';

      public function usuarios(){
            return $this->hasMany('App\Usuario');
      }
      public function jugadores(){
            return $this->usuarios()->where('rol','=','0');
      }
      public function entrenadores(){
            return $this->usuarios()->where('rol','=','1');
      }
      public function director(){
            return $this->usuarios()->where('rol','=','2');
      }
      public function partidosLocal(){
            return $this->hasMany('App\Partido','equipoLocal_id')->with('equipoLocal','equipoVisitante');
      }
      public function partidosVisitante(){
            return $this->hasMany('App\Partido','equipoVisitante_id')->with('equipoLocal','equipoVisitante');
      }
      public function estadio(){
            return $this->belongsTo('App\Estadio');
      }

      public function patrocinador(){
            return $this->belongsTo('App\Patrocinador');
      }

      public function getPatrocinadorLibre(){
            return $this->patrocinador()->where('nombre','=','libre');
      }

      public function partidos(){
            $local = $this->partidosLocal()->with('equipoLocal','equipoVisitante')->get();
            $visitante = $this->partidosVisitante()->with('equipoLocal','equipoVisitante')->get();
            return $local->merge($visitante);
      }
}
