<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PatrocinadorTableSeeder::class);
        $this->call(EstadioTableSeeder::class);
        $this->call(EquipoTableSeeder::class);
        $this->call(UsuariosTableSeeder::class);
        $this->call(TemporadaTableSeeder::class);
        $this->call(CompeticionTableSeeder::class);
        $this->call(PartidoTableSeeder::class);
        $this->call(ParticiparTableSeeder::class);
    }
}
