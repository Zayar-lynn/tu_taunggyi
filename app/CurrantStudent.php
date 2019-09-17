<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurrantStudent extends Model
{
    protected $fillable = [
        'id',
        'male',
        'female',
        'major',
        'year'
    ];
}
