<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
      public function up()
      {
            Schema::create('usuario', function (Blueprint $table) {
                  $table->increments('id');
                  $table->char('dni',9)->unique();
                  $table->string('nombre');
                  $table->string('apellidos');
                  $table->timestamp('fNac');

                  $table->integer('salario')->nullable();
                  $table->string('posicion')->nullable();
                  $table->integer('rol')->nullable();
                  $table->integer('cargo')->nullable();
                  $table->integer('dorsal')->nullable();
                  $table->string('foto')->nullable();

                  $table->integer('equipo_id')->unsigned()->nullable();
                  $table->foreign('equipo_id')->references('id')->on('equipo')->onDelete('set null');

                  $table->string('password');
                  $table->timestamps();
                  $table->rememberToken();
            });
      }

      /**
      * Reverse the migrations.
      *
      * @return void
      */
      public function down()
      {
            Schema::dropIfExists('usuario');
      }
}
