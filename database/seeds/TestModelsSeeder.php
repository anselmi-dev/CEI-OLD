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

        App\Models\ano::create(['ano' => '2017-03-12 08:19:25']);
        App\Models\ano::create(['ano' => '2018-01-12 08:19:25']);

        App\Models\trimestre::create(['trimestre' => 'DICIEMBRE', 'ano_id' => 1]);
        App\Models\trimestre::create(['trimestre' => 'DICIEMBRE', 'ano_id' => 2]);
        App\Models\trimestre::create(['trimestre' => 'ABRIL', 'ano_id' => 1]);
        App\Models\trimestre::create(['trimestre' => 'ABRIL', 'ano_id' => 2]);
        App\Models\trimestre::create(['trimestre' => 'JULIO', 'ano_id' => 1]);
        App\Models\trimestre::create(['trimestre' => 'JULIO', 'ano_id' => 2]);

        App\Models\grado::create(['nombre' => 'Maternal']);
        App\Models\grado::create(['nombre' => 'Preescolar']);
        App\Models\grado::create(['nombre' => 'Primero']);
        App\Models\grado::create(['nombre' => 'Segundo']);
        App\Models\grado::create(['nombre' => 'Tercero']);


        App\Models\seccion::create(['nombre' => 'Maternal I' , 'grado_id' => 1]);
        App\Models\seccion::create(['nombre' => 'Maternal II' , 'grado_id' => 1]);
        App\Models\seccion::create(['nombre' => 'Maternal III' , 'grado_id' => 1]);
        App\Models\seccion::create(['nombre' => 'Maternal IV' , 'grado_id' => 1]);

        App\Models\seccion::create(['nombre' => 'Preescolar I' , 'grado_id' => 2]);
        App\Models\seccion::create(['nombre' => 'Preescolar II' , 'grado_id' => 2]);
        App\Models\seccion::create(['nombre' => 'Preescolar III' , 'grado_id' => 2]);
        App\Models\seccion::create(['nombre' => 'Preescolar IV' , 'grado_id' => 2]);

        App\Models\seccion::create(['nombre' => 'Primero A' , 'grado_id' => 3]);
        App\Models\seccion::create(['nombre' => 'Primero B' , 'grado_id' => 3]);

        App\Models\seccion::create(['nombre' => 'Segundo A' , 'grado_id' => 4]);
        App\Models\seccion::create(['nombre' => 'Segundo B' , 'grado_id' => 4]);

        App\Models\seccion::create(['nombre' => 'Tercero Unico' , 'grado_id' => 5]);

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
