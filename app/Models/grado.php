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

    public $table = 'grados';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id',
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'activo' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
    ];

    protected static function boot() 
    {
    parent::boot();

    static::deleting(function($grado) {
        $grado->seccion()->delete();
    });
    }

    public function seccion()
    {
        return $this->hasMany(seccion::class);
    }

    public function trimestre()
    {
        return $this->belongsTo(trimestre::class);
    }


}
