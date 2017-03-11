<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateboletasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boletas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estudiante_id')->unsigned()->nullable();
            $table->integer('seccion_id')->unsigned()->nullable();
            $table->integer('grado_id')->unsigned()->nullable();
            $table->integer('trimestre_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('estudiante_id')->references('id')->on('estudiantes');
            $table->foreign('seccion_id')->references('id')->on('seccions');
            $table->foreign('grado_id')->references('id')->on('grados');
            $table->foreign('trimestre_id')->references('id')->on('trimestres');
            $table->string('cancelo', 2)->nullable();
            $table->string('boleta', 200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boletas');
    }
}
