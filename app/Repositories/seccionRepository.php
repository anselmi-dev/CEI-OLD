<?php

namespace App\Repositories;

use App\Models\seccion;
use InfyOm\Generator\Common\BaseRepository;

class seccionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'nombre',
        'grado_id',
        'activo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return seccion::class;
    }
}
