<?php

use Faker\Factory as Faker;
use App\Models\estudiante;
use App\Repositories\estudianteRepository;

trait MakeestudianteTrait
{
    /**
     * Create fake instance of estudiante and save it in database
     *
     * @param array $estudianteFields
     * @return estudiante
     */
    public function makeestudiante($estudianteFields = [])
    {
        /** @var estudianteRepository $estudianteRepo */
        $estudianteRepo = App::make(estudianteRepository::class);
        $theme = $this->fakeestudianteData($estudianteFields);
        return $estudianteRepo->create($theme);
    }

    /**
     * Get fake instance of estudiante
     *
     * @param array $estudianteFields
     * @return estudiante
     */
    public function fakeestudiante($estudianteFields = [])
    {
        return new estudiante($this->fakeestudianteData($estudianteFields));
    }

    /**
     * Get fake data of estudiante
     *
     * @param array $postFields
     * @return array
     */
    public function fakeestudianteData($estudianteFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nombre' => $fake->word,
            'apellido' => $fake->word,
            'fechaNacimiento' => $fake->word,
            'email' => $fake->word,
            'sexo' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $estudianteFields);
    }
}
