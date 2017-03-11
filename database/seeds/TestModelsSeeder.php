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

        factory(App\Models\estudiante::class,50)->create();

        factory(App\Models\docente::class,20)->create();

        App\Models\ano::create(['ano' => '2017']);
        App\Models\ano::create(['ano' => '2018']);

        App\Models\grado::create(['nombre' => 'Maternal']);
        App\Models\grado::create(['nombre' => 'Lactante']);

        App\Models\seccion::create(['nombre' => 'I' , 'grado_id' => 1]);
        App\Models\seccion::create(['nombre' => 'I' , 'grado_id' => 2]);
        App\Models\seccion::create(['nombre' => 'II' , 'grado_id' => 1]);
        
        App\Models\seccion::create(['nombre' => 'II' , 'grado_id' => 2]);
        App\Models\seccion::create(['nombre' => 'III' , 'grado_id' => 1]);
        App\Models\seccion::create(['nombre' => 'III' , 'grado_id' => 2]);

/*;


        $idgrados=$grados->pluck('id')->toArray();
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
            $boleta->grado()->associate(array_rand($idgrados)+1);
            $boleta->save();
        }


 */
    }
}
