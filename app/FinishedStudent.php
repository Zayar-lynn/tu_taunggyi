<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinishedStudent extends Model
{
    protected $fillable = [
        'id',
        'degree_name',
        'start',
        'end',
        'total'
    ];
}
