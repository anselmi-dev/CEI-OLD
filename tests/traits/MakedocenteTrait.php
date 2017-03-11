<?php

use Faker\Factory as Faker;
use App\Models\docente;
use App\Repositories\docenteRepository;

trait MakedocenteTrait
{
    /**
     * Create fake instance of docente and save it in database
     *
     * @param array $docenteFields
     * @return docente
     */
    public function makedocente($docenteFields = [])
    {
        /** @var docenteRepository $docenteRepo */
        $docenteRepo = App::make(docenteRepository::class);
        $theme = $this->fakedocenteData($docenteFields);
        return $docenteRepo->create($theme);
    }

    /**
     * Get fake instance of docente
     *
     * @param array $docenteFields
     * @return docente
     */
    public function fakedocente($docenteFields = [])
    {
        return new docente($this->fakedocenteData($docenteFields));
    }

    /**
     * Get fake data of docente
     *
     * @param array $postFields
     * @return array
     */
    public function fakedocenteData($docenteFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nombre' => $fake->word,
            'apellido' => $fake->word,
            'cedula' => $fake->word,
            'email' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $docenteFields);
    }
}
