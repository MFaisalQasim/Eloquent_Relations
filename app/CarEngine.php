<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarEngine extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'car_engines';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'engine_model','car_model_id'];

    
}
