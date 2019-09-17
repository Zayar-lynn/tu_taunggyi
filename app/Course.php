<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
      'id',
      'course_name',
      'course_detail',
      'course_photo',
      'account_id'
    ];
}
