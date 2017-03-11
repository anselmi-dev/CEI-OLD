<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BoletaSeccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boleta_seccion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('seccion_id')->unsigned();
            $table->integer('boleta_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('seccion_id')->references('id')->on('seccions');
            $table->foreign('boleta_id')->references('id')->on('boletas');
        });
        Schema::create('boleta_trimestre', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('trimestre_id')->unsigned();
            $table->integer('boleta_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('trimestre_id')->references('id')->on('trimestres');
            $table->foreign('boleta_id')->references('id')->on('boletas');
        });
        Schema::create('boleta_estudiante', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estudiante_id')->unsigned();
            $table->integer('boleta_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('estudiante_id')->references('id')->on('estudiantes');
            $table->foreign('boleta_id')->references('id')->on('boletas');
        });
        Schema::create('boleta_grado', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('grado_id')->unsigned();
            $table->integer('boleta_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('grado_id')->references('id')->on('grados');
            $table->foreign('boleta_id')->references('id')->on('boletas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boleta_seccion');
        Schema::dropIfExists('boleta_trimestre');
        Schema::dropIfExists('boleta_estudiante');
        Schema::dropIfExists('boleta_grado');
    }
}
