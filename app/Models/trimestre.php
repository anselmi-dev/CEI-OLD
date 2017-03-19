<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class trimestre
 * @package App\Models
 * @version March 10, 2017, 5:20 pm UTC
 */
class trimestre extends Model
{
    use SoftDeletes;

    public $table = 'trimestres';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'trimestre',
        'ano_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'trimestre' => 'string',
        'ano_id' => 'integer'
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
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function ano()
    {
        return $this->belongsTo(\App\Models\ano::class, 'ano_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function boletas()
    {
        return $this->hasMany(\App\Models\boleta::class);
    }
}
