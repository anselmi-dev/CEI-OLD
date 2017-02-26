<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\seccion;
use App\Models\trimestre;
/**
 * Class grado
 * @package App\Models
 * @version February 26, 2017, 7:53 pm UTC
 */
class grado extends Model
{
    use SoftDeletes;

    public $table = 'grados';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id',
        'nombre',
        'secciones',
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
        'secciones' => 'integer',
        'activo' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'secciones' => 'required',
        'activo' => 'required'
    ];

    public function secciones()
    {
        return $this->hasMany(seccion::class);
    }

    public function trimestre()
    {
        return $this->belongsTo(trimestre::class);
    }


}
