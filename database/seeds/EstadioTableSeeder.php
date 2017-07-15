<?php

use Illuminate\Database\Seeder;
use App\Estadio;
class EstadioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Borramos los datos de la tabla
        DB::table('estadio')->delete();

        // Añadimos un estadio para la UA
        $estadio = new Estadio([ 
            'nombre' => 'UATeam Stadium' ,
            'capacidad' => 64000
        ]);
        $estadio ->save();
        
        //Añadimos el Santiagos Bernabéu
        $estadio = new Estadio([ 
            'nombre' => 'Santiago Bernabéu',
            'capacidad' => 81044
        ]);
        $estadio ->save();

        $estadio = new Estadio([ 
            'nombre' => 'Estadio de Mendizorroza ',
            'capacidad' => 19840
        ]);
        $estadio ->save();

       $estadio = new Estadio([ 
            'nombre' => 'San Mamés ',
            'capacidad' => 53289
        ]);
        $estadio ->save();
        
        $estadio = new Estadio([ 
            'nombre' => 'Nuevo Estadio de Los Cármenes ',
            'capacidad' => 22369
        ]);
        $estadio ->save();
        
        $estadio = new Estadio([ 
            'nombre' => 'Estadio Benito Villamarín ',
            'capacidad' => 51700
        ]);
        $estadio ->save();

        $estadio = new Estadio([ 
            'nombre' => 'Libre' ,
            'capacidad' => 0
        ]);
        $estadio ->save();
    }
}
