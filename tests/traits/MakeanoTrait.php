<?php

use Faker\Factory as Faker;
use App\Models\ano;
use App\Repositories\anoRepository;

trait MakeanoTrait
{
    /**
     * Create fake instance of ano and save it in database
     *
     * @param array $anoFields
     * @return ano
     */
    public function makeano($anoFields = [])
    {
        /** @var anoRepository $anoRepo */
        $anoRepo = App::make(anoRepository::class);
        $theme = $this->fakeanoData($anoFields);
        return $anoRepo->create($theme);
    }

    /**
     * Get fake instance of ano
     *
     * @param array $anoFields
     * @return ano
     */
    public function fakeano($anoFields = [])
    {
        return new ano($this->fakeanoData($anoFields));
    }

    /**
     * Get fake data of ano
     *
     * @param array $postFields
     * @return array
     */
    public function fakeanoData($anoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'ano' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $anoFields);
    }
}
