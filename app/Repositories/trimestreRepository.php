<?php

namespace App\Repositories;

use App\Models\trimestre;
use InfyOm\Generator\Common\BaseRepository;

class trimestreRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'trimestre'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return trimestre::class;
    }
}
