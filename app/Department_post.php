<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department_post extends Model
{
  protected $fillable = [
  'id',
  'title',
  'photo',
  'description',
  'department_name'
];
}
