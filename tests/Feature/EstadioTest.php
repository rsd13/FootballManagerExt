<?php

namespace Tests\Feature;

use App\Equipo;
use App\Estadio;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EstadioTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testEstadio1()//Comprobación de clave ajena
    {
        $estadio = Estadio::where('nombre','like','%Santiago Bernabéu%')->first();
        $equipo = Equipo::where('cif','like','%G28034718%')->first();
        $this->assertEquals($equipo->id,$estadio->equipo);
    }
    public function testEstadio2(){//Prueba de inserción

        $estadio = new Estadio();
        $estadio->nombre = 'Test';
        $estadio->capacidad = 5000;
        $estadio->equipo = null;//Cambiar por equipo existente
        //Lo almacanamos
        $estadio->save();

        //Lo recuperamos de la BBDD
        $estadioBD = Estadio::where('nombre','Test')->first();

        //Comprobamos que los nombres sean iguales
        $this->assertEquals($estadio->capacidad,$estadioBD->capacidad);
    }
    public function testEstadio3(){//Prueba de borrado de la inserción anterior
        $estadio = Estadio::where('nombre','Test')->first();
        $estadio->delete();
        //Lo buscamos en la BBDD
        $estadioBD = Estadio::where('nombre','Test')->first();
        //Miramos si se ha borrado
        $this->assertEquals($estadioBD,null);
    }
}
