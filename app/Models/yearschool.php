<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\sections;

/**
 * Class yearschool
 * @package App\Models
 * @version February 21, 2017, 1:09 pm UTC
 */
class yearschool extends Model
{
    use SoftDeletes;

    public $table = 'yearschools';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'year'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'year' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'year' => 'required'
    ];

    public function sections()
    {
        return $this->belongsToMany(sections::class);
    }
    
}
