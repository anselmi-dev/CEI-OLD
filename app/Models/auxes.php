<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class auxes
 * @package App\Models
 * @version March 16, 2017, 4:24 pm UTC
 */
class auxes extends Model
{
    use SoftDeletes;

    public $table = 'auxes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'estudiante_id',
        'seccion_id',
        'ano_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'estudiante_id' => 'integer',
        'seccion_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'estudiante_id' => 'required',
        'seccion_id' => 'required',
        'ano_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function seccion()
    {
        return $this->belongsTo(\App\Models\seccion::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function estudiante()
    {
        return $this->belongsTo(\App\Models\estudiante::class);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function ano()
    {
        return $this->belongsTo(\App\Models\ano::class);
    }
}
