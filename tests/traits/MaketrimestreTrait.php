<?php

use Faker\Factory as Faker;
use App\Models\trimestre;
use App\Repositories\trimestreRepository;

trait MaketrimestreTrait
{
    /**
     * Create fake instance of trimestre and save it in database
     *
     * @param array $trimestreFields
     * @return trimestre
     */
    public function maketrimestre($trimestreFields = [])
    {
        /** @var trimestreRepository $trimestreRepo */
        $trimestreRepo = App::make(trimestreRepository::class);
        $theme = $this->faketrimestreData($trimestreFields);
        return $trimestreRepo->create($theme);
    }

    /**
     * Get fake instance of trimestre
     *
     * @param array $trimestreFields
     * @return trimestre
     */
    public function faketrimestre($trimestreFields = [])
    {
        return new trimestre($this->faketrimestreData($trimestreFields));
    }

    /**
     * Get fake data of trimestre
     *
     * @param array $postFields
     * @return array
     */
    public function faketrimestreData($trimestreFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'trimestre' => $fake->word,
            'ano_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $trimestreFields);
    }
}
