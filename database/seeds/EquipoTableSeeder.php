<?php

use Illuminate\Database\Seeder;
use App\Equipo;
use App\Estadio;
use App\Patrocinador;
class EquipoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Borrar datos
        DB::table('equipo')->delete();

        $estadio = DB::table('estadio')->where('nombre','like','%Libre%')->first();
        //Insertar
        $patrocinador = DB::table('patrocinador')->where('nombre','like','%libre%')->first();

        $cif = '000000000';
        $equipo = new Equipo([
            'cif'=>$cif,
            'nombreEquipo'=>'Libre',
            'presupuesto' =>0,
            'estadio_id' => $estadio->id,
            'logo' => $cif.'.png',
            'patrocinador_id' => $patrocinador->id
        ]);
        $equipo->save();

        $estadio = DB::table('estadio')->where('nombre','like','%UA%')->first();
        $patrocinador = DB::table('patrocinador')->where('nombre','like','%BBVA%')->first();

        $cif = 'A27417476';
        $equipo = new Equipo([
            'cif'=>$cif,
            'nombreEquipo'=>'UA Football Club',
            'presupuesto' =>0,
            'estadio_id' => $estadio->id,
            'logo' => $cif.'.png',
            'patrocinador_id' => $patrocinador->id
        ]);
        $equipo->save();

        $patrocinador = DB::table('patrocinador')->where('nombre','like','%libre%')->first();
        $estadio = DB::table('estadio')->where('nombre','like','%Bernabéu%')->first();

        $cif = 'G28034718';
        $equipo = new Equipo([
            'cif'=> $cif,
            'nombreEquipo' => 'Real Madrid Club de Futbol',
            'presupuesto' =>0,
            'estadio_id' => $estadio->id,
            'logo' => $cif.'.png',
            'patrocinador_id' => $patrocinador->id
        ]);
        $equipo->save();
        $estadio = DB::table('estadio')->where('nombre','like','%Mendizorroza%')->first();

        $cif = 'G28034719';
        $equipo = new Equipo([
            'cif'=> $cif,
            'nombreEquipo' => 'Deportivo Alavés',
            'presupuesto' =>0,
            'estadio_id' => $estadio->id,
            'logo' => $cif.'.png',
            'patrocinador_id' => $patrocinador->id
        ]);
        $equipo->save();
        $estadio = DB::table('estadio')->where('nombre','like','%Mamés%')->first();

        $cif = 'G28034720';
        $equipo = new Equipo([
            'cif'=> $cif,
            'nombreEquipo' => 'Athletic Club de Bilbao',
            'presupuesto' =>0,
            'estadio_id' => $estadio->id,
            'logo' => $cif.'.png',
            'patrocinador_id' => $patrocinador->id
        ]);
        $equipo->save();
        $estadio = DB::table('estadio')->where('nombre','like','%Cármenes%')->first();

        $cif = 'G28034721';
        $equipo = new Equipo([
            'cif'=> $cif,
            'nombreEquipo' => 'Granada Club de Fútbol',
            'presupuesto' =>0,
            'estadio_id' => $estadio->id,
            'logo' => $cif.'.png',
            'patrocinador_id' => $patrocinador->id
        ]);
        $equipo->save();

        $cif = 'G28034722';
        $estadio = DB::table('estadio')->where('nombre','like','%Villamarín%')->first();
        $equipo = new Equipo([
            'cif'=> $cif,
            'nombreEquipo' => 'Real Betis Balompié',
            'presupuesto' =>0,
            'estadio_id' => $estadio->id,
            'logo' => $cif.'.png',
            'patrocinador_id' => $patrocinador->id
        ]);
        $equipo->save();

    }
}
