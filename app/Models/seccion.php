<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\estudiante;
use App\Models\docente;
use App\Models\grado;
use App\Models\boleta;

/**
 * Class seccion
 * @package App\Models
 * @version February 26, 2017, 7:54 pm UTC
 */
class seccion extends Model
{
    

    public $table = 'seccions';
    protected $hidden = ['pivot'];
    

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
        'grado_id' => 'required'
    ];

    protected static function boot() 
    {
    parent::boot();

    static::deleting(function($seccion) {
        $grado->estudiante()->delete();
    });
    }

    public function estudiante()
    {
        return $this->hasMany(estudiante::class);
    } 

    public function estudiantes()
    {
        return $this->belongsToMany(estudiante::class,'boletas','seccion_id','estudiante_id');
    }
    
    public function docentes()
    {
        return $this->belongsToMany(docente::class,'seccion_docente','docente_id','seccion_id');
    }

    public function grado()
    {
        return $this->belongsTo(grado::class);
    }

    public function boleteas()
    {
        return $this->hasMany(boleta::class);
    }
    
}
