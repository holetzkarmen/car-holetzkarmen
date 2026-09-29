<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car_Maker extends Model
{
    public $timestamps = false;

    protected $table = 'car_makers';

    protected $fillable = ['name'];

    public function car_types()
    {
        return $this->hasMany(Car_Type::class);
    }
}
