<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DocenteSeccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente_seccions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('seccion_id')->unsigned();
            $table->integer('docente_id')->unsigned();
            $table->timestamps();
            $table->foreign('seccion_id')->references('id')->on('seccions')->onDelete('cascade');;
            $table->foreign('docente_id')->references('id')->on('docentes')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docente_seccions');
    }
}
