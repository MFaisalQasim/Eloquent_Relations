<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\Car;

class CarModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'car_models';

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
    protected $fillable = ['car_model', 'car_id'];

    public function car()
    {
        return $this->belongTo(Car::class);
    }
}
