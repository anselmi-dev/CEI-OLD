<?php

namespace App\Repositories;

use App\Models\estudiante;
use InfyOm\Generator\Common\BaseRepository;

class estudianteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'apellido',
        'fechaNacimiento',
        'email',
        'sexo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return estudiante::class;
    }
}
