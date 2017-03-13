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
            $table->string('url', 225);
            $table->integer('estudiante_id')->unsigned();
            $table->integer('ano_id')->unsigned();
            $table->integer('trimestre_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('estudiante_id')->references('id')->on('estudiantes');
            $table->foreign('ano_id')->references('id')->on('anos');
            $table->foreign('trimestre_id')->references('id')->on('trimestres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('boletas');
    }
}
