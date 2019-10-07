<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
    protected $fillable = ['id', 'name', 'email', 'phone_number', 'position'];
}
