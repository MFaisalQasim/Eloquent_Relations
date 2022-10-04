<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarProdDate extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'car_prod_dates';

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
    protected $fillable = ['car_model_id', 'date'];

    
}
