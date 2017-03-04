<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateseccionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seccions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 50);
            $table->integer('grado_id')->unsigned()->nullable();
            $table->foreign('grado_id')->references('id')->on('grados')->onDelete('cascade');
            $table->boolean('activo')->nullable();
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
        Schema::dropIfExists('seccions');
    }
}
