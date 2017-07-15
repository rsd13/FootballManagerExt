<?php

use Illuminate\Database\Seeder;
use App\Patrocinador;
use App\Equipo;

class PatrocinadorTableSeeder extends Seeder
{
      /**
      * Run the database seeds.
      *
      * @return void
      */
      public function run()
      {

            DB::table('patrocinador')->delete();

            $patrocinador = new Patrocinador([
                  'nombre' => 'Coca Cola',
                  'cantidad' => 5000000,
                  'penalizacion' => 6000000

            ]);
            $patrocinador->save();

            $patrocinador = new Patrocinador([
                  'nombre' => 'Malboro',
                  'cantidad' => 7000000,
                  'penalizacion' => 7500000

            ]);
            $patrocinador->save();

            $patrocinador = new Patrocinador([
                  'nombre' => 'Sony',
                  'cantidad' => 7000000,
                  'penalizacion' => 0

            ]);
            $patrocinador->save();

            $patrocinador = new Patrocinador([
                  'nombre' => 'Apple',
                  'cantidad' => 10000000,
                  'penalizacion' => 15000000

            ]);
            $patrocinador->save();

            $patrocinador = new Patrocinador([
                  'nombre' => 'Emirates',
                  'cantidad' => 15000000,
                  'penalizacion' => 17000000

            ]);

            $patrocinador->save();

            $patrocinador = new Patrocinador([
                  'nombre' => 'BBVA',
                  'cantidad' => 2000000,
                  'penalizacion' => 3000000

            ]);
            $patrocinador->save();

            $patrocinador = new Patrocinador([
                  'nombre' => 'libre',
                  'cantidad' => 0,
                  'penalizacion' => 0

            ]);

            $patrocinador->save();

      }
}
