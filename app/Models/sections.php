<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\yearschool;

/**
 * Class sections
 * @package App\Models
 * @version February 21, 2017, 3:30 pm UTC
 */
class sections extends Model
{
    use SoftDeletes;

    public $table = 'sections';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'quantity'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'quantity' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'quantity' => 'required'
    ];

    public function yearschool()
    {
        return $this->belongsToMany(yearschool::class);
    }
    
}
