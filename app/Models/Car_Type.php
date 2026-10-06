<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car_Type extends Model
{
    public $timestamps = false;

    protected $table = 'car_types';

    protected $fillable = [
        'name',
        'year',
        'car_maker_id'
    ];

    public function car_maker()
    {
        return $this->belongsTo(Car_Maker::class, 'car_maker_id');
    }
}
