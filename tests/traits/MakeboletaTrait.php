<?php

use Faker\Factory as Faker;
use App\Models\boleta;
use App\Repositories\boletaRepository;

trait MakeboletaTrait
{
    /**
     * Create fake instance of boleta and save it in database
     *
     * @param array $boletaFields
     * @return boleta
     */
    public function makeboleta($boletaFields = [])
    {
        /** @var boletaRepository $boletaRepo */
        $boletaRepo = App::make(boletaRepository::class);
        $theme = $this->fakeboletaData($boletaFields);
        return $boletaRepo->create($theme);
    }

    /**
     * Get fake instance of boleta
     *
     * @param array $boletaFields
     * @return boleta
     */
    public function fakeboleta($boletaFields = [])
    {
        return new boleta($this->fakeboletaData($boletaFields));
    }

    /**
     * Get fake data of boleta
     *
     * @param array $postFields
     * @return array
     */
    public function fakeboletaData($boletaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'estudiante_id' => $fake->randomDigitNotNull,
            'seccion_id' => $fake->randomDigitNotNull,
            'grado_id' => $fake->randomDigitNotNull,
            'trimestre_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $boletaFields);
    }
}
