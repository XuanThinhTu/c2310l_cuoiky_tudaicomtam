<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'thongtinnguoiquankho';

    protected $fillable = [
        'name', 'username', 'password', 'role', 'description',
    ];

    protected $hidden = [
        'password',
    ];
}
