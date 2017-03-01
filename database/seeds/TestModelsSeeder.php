<?php

use Illuminate\Database\Seeder;

class TestModelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$tri=factory(App\Models\trimestre::class)->create();
        $grado=factory(App\Models\grado::class)->create();
        $grado->trimestre()->associate($tri);
        $grado->save();

        $seccions=factory(App\Models\seccion::class,$grado->secciones)->create();
        foreach ($seccions as $seccion) {
        	$seccion->grado()->associate($grado);
        	$seccion->save();	
        	$seccion->estudiante()->saveMany(factory(App\Models\estudiante::class,5)->create()->each(function ($u) {

        	$u->boletas()->saveMany(factory(App\Models\boleta::class,2)->make());
    		})
        );
        }
    }
}
