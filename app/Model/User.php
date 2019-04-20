<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['username','email','password','api_token'];
    protected $hidden = [
        'password','api_token',
    ];
}
