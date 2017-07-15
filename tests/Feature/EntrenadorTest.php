<?php

namespace Tests\Feature;

use App\Entrenador;
use App\Equipo;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EntrenadorTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testEntrenador1()
    {
        $entrenador = Entrenador::where('nombre','Oliver')->where('apellidos','Atom')->first();
        $equipo = Equipo::where('nombre','like','%UA%')->first();
        $this->assertEquals($equipo->id,$entrenador->equipo);
    }
    public function testEntrenador2()
    {
        $entrenador = Entrenador::where('nombre','Zinedine')->where('apellidos','Zidane')->first();
        $equipo = Equipo::where('nombre','like','%Real Madrid%')->first();
        $this->assertEquals($equipo->id,$entrenador->equipo);
    }
    public function testInsercionEntrenador()
    {
        $equipo = Equipo::where('nombre','like','%Real Madrid%')->first();
        $entrenador = new Entrenador();
        $entrenador->dni = '48752138F';
        $entrenador->nombre = 'Entrenador1';
        $entrenador->apellidos = 'Apellidos 1';
        $entrenador->edad = '30';
        $entrenador->numero = '1';
        $entrenador->equipo = $equipo->id;
        $entrenador->save();

        $entrenador2 = Entrenador::where('dni','48752138F')->first();

        $this->assertEquals($entrenador->nombre,$entrenador2->nombre);


    }

    public function testBorradoEntrenador(){
        $entrenador = Entrenador::where('dni','48752138F')->first();
        $entrenador->delete();
        //Probamos a localizarlo de nuevo
        $entrenador = Equipo::where('dni','48752138F')->first();
        $this->assertEquals($entrenador,null);
    }

}
