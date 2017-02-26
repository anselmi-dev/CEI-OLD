<?php

namespace App\Repositories;

use App\Models\docente;
use InfyOm\Generator\Common\BaseRepository;

class docenteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'nombre',
        'apellido',
        'cedula',
        'activo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return docente::class;
    }
}
