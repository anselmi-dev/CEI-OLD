<?php

namespace App\Repositories;

use App\Models\sections;
use InfyOm\Generator\Common\BaseRepository;

class sectionsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'quantity'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return sections::class;
    }
}
