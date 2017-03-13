<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class grado
 * @package App\Models
 * @version March 12, 2017, 2:32 pm UTC
 */
class grado extends Model
{
    use SoftDeletes;

    public $table = 'grados';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string'
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function trimestres()
    {
        return $this->belongsToMany(\App\Models\trimestre::class, 'trimestre_grado');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function seccions()
    {
        return $this->hasMany(\App\Models\seccion::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function boletas()
    {
        return $this->belongsToMany(\App\Models\boletas::class);
    }
}
