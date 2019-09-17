<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentVideo extends Model
{
    protected $fillable = [
        'id',
        'department_name',
        'department_video'
    ];
}
