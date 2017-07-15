<?php

use Illuminate\Database\Seeder;
use App\Competicion;

class CompeticionTableSeeder extends Seeder
{
      /**
      * Run the database seeds.
      *
      * @return void
      */
      public function run()
      {
            DB::table('competicion')->delete();
            $competicion = new Competicion([
                  'nombre' => 'Liga'
            ]);
            $competicion->save();
            
            $competicion = new Competicion([
                  'nombre' => 'Copa'
            ]);
            $competicion->save();


            $competicion = new Competicion([
                  'nombre' => 'Amistoso'
            ]);
            $competicion->save();
      }
}
