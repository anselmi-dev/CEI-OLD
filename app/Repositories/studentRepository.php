<?php

namespace App\Repositories;

use App\Models\student;
use InfyOm\Generator\Common\BaseRepository;

class studentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'lastname',
        'borndate',
        'boleta'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return student::class;
    }
}
