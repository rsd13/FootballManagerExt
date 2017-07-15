<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competicion extends Model
{
      protected $table = 'competicion';



      public function partido(){
            return $this->hasMany('App\Partido');
      } 



}
