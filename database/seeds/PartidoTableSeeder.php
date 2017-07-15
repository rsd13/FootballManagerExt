<?php

use Illuminate\Database\Seeder;
use App\Partido;
use App\Equipo;
use App\Competicion;
use App\Temporada;

class PartidoTableSeeder extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		DB::table('partido')->delete();
		$equipos = Equipo::where('nombreEquipo','<>','Libre')->get();
		$competiciones = Competicion::where('nombre','<>','Amistoso')->get();
		$temporadas = Temporada::get();

		$formato = 'Y-m-d H:i:s';
		$today = time();

		 foreach($temporadas as $temporada){
			foreach($competiciones as $competicion){
				foreach ($equipos as $equipoLocal) {
					foreach ($equipos as $equipoVisitante) {
						$fecha = mt_rand(strtotime($temporada->inicio), strtotime($temporada->fin));
						$golesLocal = 0;
						$golesVisitante = 0;

						if($fecha<$today){
							$golesLocal = mt_rand(0, 5);
							$golesVisitante = mt_rand(0, 5);
						}

						if($equipoLocal->id != $equipoVisitante->id){

							$partido = new Partido([
							'competicion_id'=> $competicion->id,
							'temporada_id' =>$temporada->id,
							'golesLocal' =>$golesLocal,
							'golesVisitante' => $golesVisitante,
							'fecha' => date($formato,$fecha),
							'equipoLocal_id'=> $equipoLocal->id,
							'equipoVisitante_id' => $equipoVisitante->id,
							'cronica' => null,
							'estadio_id' => $equipoLocal->estadio_id
							]);
							$partido->save();
						}
					}
				}
			}
		 }
	}
}
