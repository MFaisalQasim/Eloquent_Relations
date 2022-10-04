<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarHeadquater extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'car_headquaters';

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
    protected $fillable = ['name', 'details','car_id'];

    public function car_headquater()
    {
        return $this->belongTo(Car::class);
    }
    
}
