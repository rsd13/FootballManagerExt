<?php

namespace Tests\Feature;

use App\Equipo;
use App\Jugador;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class JugadorTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testJugador1()//Comprobación de clave ajena
    {
        $jugador = Jugador::where('apellidos','Ramos')->where('nombre','Sergio')->first();
        $equipo = Equipo::where('cif','like','%G28034718%')->first();
        $this->assertEquals($equipo->id,$jugador->equipo);
    }
    public function testJugador2()
    {
        $entrenador = Jugador::where('cargo',1)->where('apellidos','Ramos')->first();
        $equipo = Equipo::where('nombre','like','%Real Madrid%')->first();
        $this->assertEquals($equipo->id,$entrenador->equipo);
    }
    public function testJugador3(){//Prueba de inserción
        $jugador = new Jugador();
        $jugador->dni = '12345678A';
        $jugador->nombre = 'Test';
        $jugador->apellidos = 'Test Test';
        $jugador->edad = 60;
        $jugador->posicion = 'Suplente';
        $jugador->cargo = 0;
        $jugador->equipo = Equipo::get()->first();
        //Lo almacenamos
        $jugador->save();

        //Lo recuperamos de la BBDD
        $jugadorBD = Jugador::where('nombre','Test')->first();

        //Comprobamos que los nombres sean iguales
        $this->assertEquals($jugador->nombre,$jugadorBD->nombre);
    }
    public function testJugador4(){//Prueba de borrado de la inserción anterior
        $jugador = Jugador::where('nombre','Test')->first();
        $jugador->delete();
        //Lo buscamos en la BBDD
        $jugadorBD = Jugador::where('nombre','Test')->first();
        //Miramos si se ha borrado
        $this->assertEquals($jugadorBD,null);
    }
}
