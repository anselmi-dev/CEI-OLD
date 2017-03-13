<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateestudiantesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 50);
            $table->string('apellido', 50);
            $table->date('fechaNacimiento');
            $table->string('email');
            $table->string('sexo', 2);
            $table->integer('ano_id')->unsigned();
            $table->integer('seccion_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('ano_id')->references('id')->on('anos');
            $table->foreign('seccion_id')->references('id')->on('seccions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('estudiantes');
    }
}
