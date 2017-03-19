<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class seccion
 * @package App\Models
 * @version March 10, 2017, 5:24 pm UTC
 */
class seccion extends Model
{
    use SoftDeletes;

    public $table = 'seccions';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'grado_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'grado_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function grado()
    {
        return $this->belongsTo(\App\Models\grado::class, 'grado_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function docentes()
    {
        return $this->belongsToMany(\App\Models\docente::class, 'docente_seccions');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function boletas()
    {
        return $this->hasMany(\App\Models\boleta::class,'seccion_id');
    }

}
