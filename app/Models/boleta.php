<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use File;
use Response;

/**
 * Class boleta
 * @package App\Models
 * @version March 12, 2017, 3:29 pm UTC
 */
class boleta extends Model
{
    use SoftDeletes;

    public $table = 'boletas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'url',
        'estudiante_id',
        'ano_id',
        'trimestre_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'url' => 'file',
        'estudiante_id' => 'integer',
        'ano_id' => 'integer',
        'trimestre_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'url' => 'required|file|mimes:jpeg,pdf,png|max:5000'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function estudiante()
    {
        return $this->belongsTo(\App\Models\estudiante::class, 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function ano()
    {
        return $this->belongsTo(\App\Models\ano::class, 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function trimestre()
    {
        return $this->belongsTo(\App\Models\trimestre::class, 'id');
    }
    public function getfileAttribute()
    {
        $filename = 'test.pdf';
        return  \Storage::disk('boleta')->get($this->url);
    }
}
