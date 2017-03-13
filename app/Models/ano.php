<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ano
 * @package App\Models
 * @version March 12, 2017, 2:10 pm UTC
 */
class ano extends Model
{
    use SoftDeletes;

    public $table = 'anos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'ano'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ano' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ano' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function trimestres()
    {
        return $this->belongsToMany(\App\Models\trimestre::class);
    }
    public function boletas()
    {
        return $this->hasMany(\App\Models\boleta::class);
    }
}
