<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\estudiante;
use App\Models\docente;
use App\Models\grado;

/**
 * Class seccion
 * @package App\Models
 * @version February 26, 2017, 7:54 pm UTC
 */
class seccion extends Model
{
    use SoftDeletes;

    public $table = 'seccions';
    

    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'nombre',
        'grado_id',
        'activo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'grado_id' => 'integer',
        'activo' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'grado_id' => 'required',
        'activo' => 'required'
    ];

    public function estudiante()
    {
        return $this->hasMany(estudiante::class);
    } 

    public function docentes()
    {
        return $this->belongsToMany(docente::class);
    }

    public function grado()
    {
        return $this->belongsTo(grado::class);
    }

}
