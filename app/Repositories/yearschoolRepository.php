<?php

namespace App\Repositories;

use App\Models\yearschool;
use InfyOm\Generator\Common\BaseRepository;

class yearschoolRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'year'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return yearschool::class;
    }
}
