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
        'nombre',
        'apellido',
        'cedula',
        'email'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return docente::class;
    }
}
