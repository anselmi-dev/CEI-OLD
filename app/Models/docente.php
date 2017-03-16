<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class docente
 * @package App\Models
 * @version March 12, 2017, 2:40 pm UTC
 */
class docente extends Model
{
    use SoftDeletes;

    public $table = 'docentes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'apellido',
        'cedula',
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'apellido' => 'string',
        'cedula' => 'string',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'apellido' => 'required',
        'cedula' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function seccions()
    {
        return $this->belongsToMany(\App\Models\seccion::class, 'docente_seccions')->withTimestamps();
    }

    public function getselectSeccionsAttributes()
    {
        return $this->seccions()->pluck('docente_id')->toArray();
    }
}
