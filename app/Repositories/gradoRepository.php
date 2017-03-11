<?php

namespace App\Repositories;

use App\Models\grado;
use InfyOm\Generator\Common\BaseRepository;

class gradoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return grado::class;
    }
}
