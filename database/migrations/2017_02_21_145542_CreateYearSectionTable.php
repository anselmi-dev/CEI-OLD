<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYearSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections_yearschool', function (Blueprint $table) 
        {
            $table->integer('yearschool_id')->unsigned()->index();
            $table->foreign('yearschool_id')->references('id')->on('yearschools')->onDelete('cascade');

            $table->integer('sections_id')->unsigned()->index();
            $table->foreign('sections_id')->references('id')->on('sections')->onDelete('cascade');

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
         Schema::drop('sections_yearschool');
    }
}
