<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ano
 * @package App\Models
 * @version March 10, 2017, 5:20 pm UTC
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
        return $this->hasMany(\App\Models\trimestre::class);
    }
}
