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
    	$tri=factory(App\Models\trimestre::class,3)->create();
        $grados=factory(App\Models\grado::class,5)->create();

        $idsTri= $tri->pluck('id')->toArray();
        foreach ($grados as $grado) 
        {
            $grado->trimestre()->attach($idsTri);       
            $seccions=factory(App\Models\seccion::class,3)->create();
            foreach ($seccions as $seccion) 
            {
            	$seccion->grado()->associate($grado);
            	$seccion->save();
                $seccion->docentes()->attach(factory(App\Models\docente::class)->create()->id);
                $estudiante=factory(App\Models\estudiante::class,5)->create();

                $seccion->estudiante()->saveMany($estudiante);   
               $estudiantes[]=$estudiante->pluck('id')->toArray();
            }
        }
        $idsSeccion = $seccions->pluck('id')->toArray(); 
        $boletas = factory(App\Models\boleta::class,50)->create();

        foreach ($boletas as $boleta) {

            $boleta->estudiante()->associate(array_rand($estudiantes)+1);
            $boleta->trimestre()->associate(array_rand($idsTri)+1);
            $boleta->seccion()->associate(array_rand($idsSeccion)+1);
            $boleta->save();
        }
    }
}
