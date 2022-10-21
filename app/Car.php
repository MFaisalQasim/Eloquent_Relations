<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cars';

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
    protected $fillable = ['car_name', 'car_description','image_path'];

    public function car_model()
    {
        return $this->hasMany(CarModel::class);
    }
    public function headquater()
    {
        return $this->hasOne(CarHeadquater::class);
    }
    public function owner()
    {
        return $this->hasOne(CarOwner::class);
    }
    public function engine()
    {
        return $this->hasManyThrough(
            CarEngine::class,
            CarModel::class,
            'car_id',
            'car_model_id',
        );
    }
    public function prod_date()
    {
        return $this->hasOneThrough(
            CarProdDate::class,
            CarModel::class,
            'car_id',
            'car_model_id',
        );
    }
    public function product()
    {
        return $this->belongsToMany(Product::class);
    }
}
