<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
      use Notifiable;

      protected $fillable =[
            'dni',
            'nombre',
            'apellidos',
            'fNac',
            'equipo_id',
            'password'
      ];

      protected $hidden = [
          'password', 'remember_token',
      ];

      protected $table = 'usuario';

      protected $dates = ['fNac'];

      public function equipo(){
            return $this->belongsTo('App\Equipo');
      }

      public function participar(){
            return $this->hasMany('App\Participar');
      }
}
