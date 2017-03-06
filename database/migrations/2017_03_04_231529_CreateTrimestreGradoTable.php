<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrimestreGradoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trimestre_grado', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('trimestre_id')->unsigned()->index()->nullable();
            $table->foreign('trimestre_id')->references('id')->on('trimestres')->onDelete('cascade');

            $table->integer('grado_id')->unsigned()->index()->nullable();
            $table->foreign('grado_id')->references('id')->on('grados')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trimestre_grado');
    }
}
