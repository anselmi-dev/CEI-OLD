<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeccionDocenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seccion_docente', function (Blueprint $table) {
            $table->integer('seccion_id')->unsigned()->index()->nullable();
            $table->foreign('seccion_id')->references('id')->on('seccions')->onDelete('cascade');

            $table->integer('docente_id')->unsigned()->index()->nullable();
            $table->foreign('docente_id')->references('id')->on('docentes')->onDelete('cascade');

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
        Schema::drop('seccion_docente');
    }

}
