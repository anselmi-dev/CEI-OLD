<?php

namespace App\Repositories;

use App\Models\auxes;
use InfyOm\Generator\Common\BaseRepository;

class auxesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'estudiante_id',
        'seccion_id',
        'ano_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return auxes::class;
    }
}
