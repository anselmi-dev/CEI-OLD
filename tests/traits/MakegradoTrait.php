<?php

use Faker\Factory as Faker;
use App\Models\grado;
use App\Repositories\gradoRepository;

trait MakegradoTrait
{
    /**
     * Create fake instance of grado and save it in database
     *
     * @param array $gradoFields
     * @return grado
     */
    public function makegrado($gradoFields = [])
    {
        /** @var gradoRepository $gradoRepo */
        $gradoRepo = App::make(gradoRepository::class);
        $theme = $this->fakegradoData($gradoFields);
        return $gradoRepo->create($theme);
    }

    /**
     * Get fake instance of grado
     *
     * @param array $gradoFields
     * @return grado
     */
    public function fakegrado($gradoFields = [])
    {
        return new grado($this->fakegradoData($gradoFields));
    }

    /**
     * Get fake data of grado
     *
     * @param array $postFields
     * @return array
     */
    public function fakegradoData($gradoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nombre' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $gradoFields);
    }
}
