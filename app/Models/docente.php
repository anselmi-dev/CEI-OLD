<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\seccion;

/**
 * 
 * Class docente
 * @package App\Models
 * @version February 26, 2017, 7:52 pm UTC
 */
class docente extends Model
{
    use SoftDeletes;

    public $table = 'docentes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id',
        'nombre',
        'apellido',
        'cedula',
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
        'apellido' => 'string',
        'cedula' => 'string',
        'activo' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'apellido' => 'required',
        'cedula' => 'required'
    ];

    public function secciones()
    {
        return $this->belongsToMany(seccion::class,'seccion_docente','seccion_id','docente_id');
    }
    
}
