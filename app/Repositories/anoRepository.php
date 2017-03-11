<?php

namespace App\Repositories;

use App\Models\ano;
use InfyOm\Generator\Common\BaseRepository;

class anoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ano'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ano::class;
    }
}
