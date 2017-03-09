<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\boleta;
use App\Models\seccion;
use App\Models\grado;
use Carbon\Carbon;

/**
 * Class estudiante
 * @package App\Models
 * @version February 26, 2017, 7:53 pm UTC
 */
class estudiante extends Model
{
    use SoftDeletes;

    public $table = 'estudiantes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id',
        'nombre',
        'apellido',
        'fechaNacimiento',
        'sexo',
        'email',
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
        'fechaNacimiento' => 'date',
        'email' => 'string',
        'sexo' => 'string',
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
        'fechaNacimiento' => 'required',
        'email' => 'required',
        'sexo' => 'required',
        'seccion' => 'required'
    ];

    public function boletas()
    {
        return $this->hasMany(boleta::class);
    }

    public function seccion()
    {
        return $this->belongsTo(seccion::class);
    }
    public function secciones()
    {
        return $this->belongsToMany(seccion::class,'boletas','estudiante_id','seccion_id');
    }

    public function getedadAttribute()
    {
        return $this->fechaNacimiento->diff( Carbon::now())->format('%y Años, %m Meses ');
    }

    public function getboletaStatusAttribute()
    {
        if ($this->seccion) {
            return $this->seccion->grado->nombre.' '.$this->seccion->nombre;
        }
            return 'NULL';
    }

    public function getGradoAttribute($seccion)
    {
        return Seccion::find($seccion)->grado_id;
    }
}
