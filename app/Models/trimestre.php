<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class trimestre
 * @package App\Models
 * @version March 12, 2017, 2:29 pm UTC
 */
class trimestre extends Model
{
    use SoftDeletes;

    public $table = 'trimestres';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'trimestre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'trimestre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'trimestre' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function anos()
    {
        return $this->belongsToMany(\App\Models\ano::class, 'ano_trimestre', 'trimestre_id', 'ano_id ');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function grados()
    {
        return $this->belongsToMany(\App\Models\grado::class, 'trimestre_grado');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function boletas()
    {
        return $this->hasMany(\App\Models\boleta::class);
    }
}
