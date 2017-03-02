<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\grado;
use App\Models\boleta;
/**
 * Class trimestre
 * @package App\Models
 * @version February 26, 2017, 7:52 pm UTC
 */
class trimestre extends Model
{
    use SoftDeletes;

    public $table = 'trimestres';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id',
        'trimestre',
        'ano',
        'activo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'trimestre' => 'string',
        'ano' => 'integer',
        'activo' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'trimestre' => 'required',
        'ano' => 'required',
        'activo' => 'required'
    ];

    public function grados()
    {
        return $this->hasMany(grado::class);
    }

    public function boleteas()
    {
        return $this->hasMany(boleta::class);
    }
}
