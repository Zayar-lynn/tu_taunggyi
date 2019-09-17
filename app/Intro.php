<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intro extends Model
{
    protected $fillable = [
       'id',
       'text',
        'sign_photo'
    ];
}
