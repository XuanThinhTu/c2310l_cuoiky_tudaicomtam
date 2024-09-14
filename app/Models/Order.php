<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // Disable automatic timestamps
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'car_id',
        'time',
        'date',
        'price',
        'status',
    ];
}
