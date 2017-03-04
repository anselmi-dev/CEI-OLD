<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\estudiante;
use App\Models\trimestre;

/**
 * Class boleta
 * @package App\Models
 * @version February 26, 2017, 7:54 pm UTC
 */
class boleta extends Model
{
    use SoftDeletes;

    public $table = 'boletas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'trimestre_id' => 'integer',
        'estudiante_id' => 'integer',
        'seccion_id' => 'integer',
        'boleta' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'trimestre_id' => 'required',
        'estudiante_id' => 'required',
        'seccion_id' => 'required'
    ];

    public function estudiante()
    {
        return $this->belongsTo(estudiante::class);
    }

    public function trimestre()
    {
        return $this->belongsTo(trimestre::class);
    }

}
