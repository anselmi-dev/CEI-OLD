<?php

namespace App\Repositories;

use App\Models\boleta;
use InfyOm\Generator\Common\BaseRepository;

class boletaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return boleta::class;
    }
}
