<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class boleta
 * @package App\Models
 * @version March 10, 2017, 5:30 pm UTC
 */
class boleta extends Model
{
    use SoftDeletes;

    public $table = 'boletas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'estudiante_id',
        'seccion_id',
        'grado_id',
        'trimestre_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'estudiante_id' => 'integer',
        'seccion_id' => 'integer',
        'grado_id' => 'integer',
        'trimestre_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function estudiantes()
    {
        return $this->hasMany(\App\Models\estudiante::class, 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function seccions()
    {
        return $this->hasMany(\App\Models\seccion::class, 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function grados()
    {
        return $this->hasMany(\App\Models\grado::class, 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function trimestres()
    {
        return $this->hasMany(\App\Models\trimestre::class, 'id');
    }
}
