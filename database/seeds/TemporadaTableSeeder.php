<?php

use Illuminate\Database\Seeder;
use App\Temporada;

class TemporadaTableSeeder extends Seeder
{
      /**
      * Run the database seeds.
      *
      * @return void
      */
      public function run()
      {
            DB::table('temporada')->delete();

            $temporada = new Temporada(['nombre'=>'15/16', 'inicio'=>'2015-08-01', 'fin' => '2016-06-30']);
            $temporada->save();

            $temporada = new Temporada(['nombre'=>'16/17', 'inicio'=>'2016-08-01', 'fin' => '2017-06-30']);
            $temporada->save();

            $temporada = new Temporada(['nombre'=>'17/18', 'inicio'=>'2017-08-01', 'fin' => '2018-06-30']);
            $temporada->save();
      }
}
