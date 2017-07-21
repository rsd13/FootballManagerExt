<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

      Schema::create('mensaje', function (Blueprint $table) {
        $table->increments('id');

        $table->integer('usuario1_id')->unsigned()->nullable();
        $table->foreign('usuario1_id')->references('id')->on('usuario')->onDelete('set null');

        $table->integer('usuario2_id')->unsigned()->nullable();
        $table->foreign('usuario2_id')->references('id')->on('usuario')->onDelete('set null');

        $table->string('asunto')->nullable();
        $table->string('mensaje')->nullable();
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
        Schema::dropIfExists('mensaje');
    }
}
