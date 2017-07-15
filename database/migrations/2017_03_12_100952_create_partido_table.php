<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partido', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('equipoLocal_id')->unsigned()->nullable();
            $table->foreign('equipoLocal_id')->references('id')->on('equipo')->onDelete('set null');

            $table->integer('equipoVisitante_id')->unsigned()->nullable();
            $table->foreign('equipoVisitante_id')->references('id')->on('equipo')->onDelete('set null');

            $table->integer('temporada_id')->nullable();
            $table->foreign('temporada_id')->references('id')->on('temporada')->onDelete('set null');

            $table->integer('competicion_id')->nullable();
            $table->foreign('competicion_id')->references('id')->on('competicion')->onDelete('set null');



            $table->unique(['equipoLocal_id', 'equipoVisitante_id','temporada_id','competicion_id']);

            $table->string('cronica')->nullable();
            $table->integer('golesLocal');
            $table->integer('golesVisitante');
            $table->timestamp('fecha');

            $table->integer('estadio_id')->nullable();
            $table->foreign('estadio_id')->references('id')->on('estadio')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partido');
    }
}
