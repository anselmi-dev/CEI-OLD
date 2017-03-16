<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ano_trimestre', function (Blueprint $table) {
            $table->integer('ano_id')->unsigned();
            $table->integer('trimestre_id')->unsigned();
            $table->timestamps();
            $table->foreign('ano_id')->references('id')->on('anos')->onDelete('cascade');
            $table->foreign('trimestre_id')->references('id')->on('trimestres')->onDelete('cascade');
        });
        Schema::create('trimestre_grado', function (Blueprint $table) {
            $table->integer('trimestre_id')->unsigned();
            $table->integer('grado_id')->unsigned();
            $table->timestamps();
            $table->foreign('trimestre_id')->references('id')->on('trimestres')->onDelete('cascade');
            $table->foreign('grado_id')->references('id')->on('grados')->onDelete('cascade');
        });
        Schema::create('trimestre_estudiante', function (Blueprint $table) {
            $table->integer('trimestre_id')->unsigned();
            $table->integer('estudiante_id')->unsigned();
            $table->timestamps();
            $table->foreign('trimestre_id')->references('id')->on('trimestres')->onDelete('cascade');
            $table->foreign('estudiante_id')->references('id')->on('estudiantes')->onDelete('cascade');
        });

        Schema::create('estudiante_boleta', function (Blueprint $table) {
            $table->integer('trimestre_id')->unsigned();
            $table->integer('estudiante_id')->unsigned();
            $table->timestamps();
            $table->foreign('trimestre_id')->references('id')->on('trimestres')->onDelete('cascade');
            $table->foreign('estudiante_id')->references('id')->on('estudiantes')->onDelete('cascade');
        });

        Schema::create('docente_seccions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('seccion_id')->unsigned();
            $table->integer('docente_id')->unsigned();
            $table->timestamps();
            $table->foreign('seccion_id')->references('id')->on('seccions')->onDelete('cascade');
            $table->foreign('docente_id')->references('id')->on('docentes')->onDelete('cascade');
        });

/*        Schema::create('ano_estudiante_seccion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ano_id')->unsigned();
            $table->integer('seccion_id')->unsigned();
            $table->integer('estudiante_id')->unsigned();
            $table->timestamps();
            $table->foreign('ano_id')->references('id')->on('anos')->onDelete('cascade');
            $table->foreign('seccion_id')->references('id')->on('seccions')->onDelete('cascade');
            $table->foreign('estudiante_id')->references('id')->on('estudiantes')->onDelete('cascade');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ano_trimestre');
        Schema::dropIfExists('trimestre_grado');
        Schema::dropIfExists('trimestre_estudiante');
        Schema::dropIfExists('estudiante_boleta');
        Schema::dropIfExists('docente_seccions');
        /*Schema::dropIfExists('ano_estudiante_seccion');*/
    }
}
