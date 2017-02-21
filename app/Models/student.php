<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
/**
 * Class student
 * @package App\Models
 * @version February 21, 2017, 1:49 pm UTC
 */
class student extends Model
{
    use SoftDeletes;

    public $table = 'students';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'lastname',
        'borndate',
        'boleta'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'lastname' => 'string',
        'borndate' => 'date',
        'boleta' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'lastname' => 'required',
        'borndate' => 'required'
    ];

    public function getAgeAttribute()
    {
   return  $this->borndate->diff(Carbon::now())
         ->format('%y years, %m months');
    }
    
}
