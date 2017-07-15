<?php

namespace Tests\Feature;

use App\Equipo;//Recuperamos el modelo de Equipo
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EquipoTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testEquipo1()//Prueba de inserción
    {

        $equipoNuevo = new Equipo();
        $equipoNuevo->cif = 'A00000000';
        $equipoNuevo->nombre = 'Test Football Club';
        $equipoNuevo->save();


        $equipo = Equipo::where('cif','like','%A00000000%')->first();//Lo recuperamos
        //Comprobamos que esté insertado correctamente
        $this->assertEquals($equipoNuevo->nombre,$equipo->nombre);
    }
    public function testEquipo2()//Prueba de borrado
    {
        $equipoNuevo = new Equipo();
        $equipoNuevo->cif = 'A00000001';
        $equipoNuevo->nombre = 'Test2 Football Club';
        $equipoNuevo->save();

        $equipo = Equipo::where('cif','like','%A00000001')->first();
        $equipo->delete();
        //Probamos a localizarlo de nuevo
        $equipo = Equipo::where('cif','like','%A00000001')->first();
        $this->assertEquals($equipo,null);
    }
}