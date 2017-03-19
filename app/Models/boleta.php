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
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function estudiante()
    {
        return $this->belongsTo(\App\Models\ano::class, 'estudiante_id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function seccion()
    {
        return $this->belongsTo(\App\Models\ano::class, 'seccion_id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function trimestre()
    {
        return $this->belongsTo(\App\Models\ano::class, 'trimestre_id');
    }
}
