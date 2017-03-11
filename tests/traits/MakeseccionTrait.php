<?php

use Faker\Factory as Faker;
use App\Models\seccion;
use App\Repositories\seccionRepository;

trait MakeseccionTrait
{
    /**
     * Create fake instance of seccion and save it in database
     *
     * @param array $seccionFields
     * @return seccion
     */
    public function makeseccion($seccionFields = [])
    {
        /** @var seccionRepository $seccionRepo */
        $seccionRepo = App::make(seccionRepository::class);
        $theme = $this->fakeseccionData($seccionFields);
        return $seccionRepo->create($theme);
    }

    /**
     * Get fake instance of seccion
     *
     * @param array $seccionFields
     * @return seccion
     */
    public function fakeseccion($seccionFields = [])
    {
        return new seccion($this->fakeseccionData($seccionFields));
    }

    /**
     * Get fake data of seccion
     *
     * @param array $postFields
     * @return array
     */
    public function fakeseccionData($seccionFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nombre' => $fake->word,
            'grado_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $seccionFields);
    }
}
