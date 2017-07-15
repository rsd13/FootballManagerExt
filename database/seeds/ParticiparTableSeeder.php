<?php

use Illuminate\Database\Seeder;
use App\Participar;
use App\Partido;
use App\Usuario;
use App\Temporada;


class ParticiparTableSeeder extends Seeder
{
      /**
      * Run the database seeds.
      *
      * @return void
      */

      public function run()
      {

            DB::table('participar')->delete();
            $temporada = Temporada::where('nombre','=','16/17')->first();
            $partidos = Partido::where('temporada_id','=',$temporada->id)->get();

            // Añadimos un estadio para la UA

            foreach($partidos as $partido){
                  //consigo los jugadores locales
                  $jugadoresLocal = Usuario::where('equipo_id','=',$partido->equipoLocal_id)
                  ->where('rol','=',0)->get();


                  $i = 0;
                  while($i < 11){
                        //metemos los jugadores locales titulares
                        $participar = new Participar([
                              'partido_id' => $partido->id,
                              'usuario_id' => $jugadoresLocal[$i]->id,
                              'local' => 'si',
                              // 0 no asistencia, 1 titular, 2 banquillo
                              'asistencia' => 1

                        ]);
                        $participar->save();
                        $i++;
                  }

                  while($i < 18){
                        //metemos los jugadores locales suplentes
                         $participar = new Participar([
                              'partido_id' => $partido->id,
                              'usuario_id' => $jugadoresLocal[$i]->id,
                              'local' => 'si',
                              // 0 no asistencia, 1 titular, 2 banquillo
                              'asistencia' => 2

                        ]);
                        $participar->save();
                        $i++;



                  }


                  while($i < count($jugadoresLocal)){
                        //metemos los jugadores no asistidos
                         $participar = new Participar([
                              'partido_id' => $partido->id,
                              'usuario_id' => $jugadoresLocal[$i]->id,
                              'local' => 'si',
                              // 0 no asistencia, 1 titular, 2 banquillo
                              'asistencia' => 0

                        ]);
                        $participar->save();
                        $i++;

                  }


                  $jugadoresVisitantes = Usuario::where('equipo_id','=',$partido->equipoVisitante_id)
                  ->where('rol','=',0)->get();
                  $i = 0;
                  while($i < 11){
                        //metemos los jugadores locales titulares
                        $participar = new Participar([
                              'partido_id' => $partido->id,
                              'usuario_id' => $jugadoresVisitantes[$i]->id,
                              'local' => 'no',
                              // 0 no asistencia, 1 titular, 2 banquillo
                              'asistencia' => 1

                        ]);
                        $participar->save();
                        $i++;
                  }

                  while($i < 18){
                        //metemos los jugadores locales sumplentes
                         $participar = new Participar([
                              'partido_id' => $partido->id,
                              'usuario_id' => $jugadoresVisitantes[$i]->id,
                              'local' => 'no',
                              // 0 no asistencia, 1 titular, 2 banquillo
                              'asistencia' => 2

                        ]);
                        $participar->save();
                        $i++;



                  }


                  while($i < count($jugadoresVisitantes)){
                        //metemos los jugadores no asistidos
                         $participar = new Participar([
                              'partido_id' => $partido->id,
                              'usuario_id' => $jugadoresVisitantes[$i]->id,
                              'local' => 'no',
                              // 0 no asistencia, 1 titular, 2 banquillo
                              'asistencia' => 0

                        ]);
                        $participar->save();
                        $i++;

                  }



            }


      }
}
