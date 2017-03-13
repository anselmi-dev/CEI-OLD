<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\boleta;
use File;
use Response;
/**
 * Class estudiante
 * @package App\Models
 * @version March 12, 2017, 3:21 pm UTC
 */
class estudiante extends Model
{
    use SoftDeletes;

    public $table = 'estudiantes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'apellido',
        'fechaNacimiento',
        'email',
        'sexo',
        'ano_id',
        'seccion_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'apellido' => 'string',
        'fechaNacimiento' => 'date',
        'email' => 'string',
        'sexo' => 'string',
        'ano_id' => 'integer',
        'seccion_id' => 'integer'
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
        'sexo' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function ano()
    {
        return $this->belongsTo(\App\Models\ano::class, 'ano_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function trimestres()
    {
        return $this->belongsToMany(\App\Models\trimestre::class, 'trimestre_estudiante');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function seccion()
    {
        return $this->belongsTo(\App\Models\seccion::class, 'seccion_id');
    }





    public function boletas()
    {   
        return $this->hasMany(\App\Models\boleta::class)->where('ano_id',$this->ano_id);
    }

    public function getedadAttribute()
    {
        return $this->fechaNacimiento->diff(\Carbon\Carbon::now())->format('%y Años, %m Meses ');
    }

    public function getgradoAttribute()
    {
        return $this->$seccion->grado->nombre;
    }

    public function scopeNombre($query,$nombre)
    {
        if(trim($nombre) != "")
        {
            $query->where('nombre',"LIKE","%$nombre%");
        }
    }

  /*  public function scopeTrimestre($query,$trimestre)
    {
        if($trimestre != "")
        {
            $query->trimestres()->whereIn('trimestre_id',$trimestre);
    }

    }*/
    public function scopeAno($query,$ano)
    {
        if($ano != "")
        {
            $query->where('ano_id',$ano);
        }
    }
    public function scopeSeccion($query,$seccion)
    {
        if($seccion != "")
        {
            $query->where('seccion_id',$seccion);
        }
    }
}
