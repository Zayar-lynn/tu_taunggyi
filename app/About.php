<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
  protected $fillable = [
    'id',
    'about',
    'photo',
    'vision',
    'mission',
    'phone',
    'email',
    'address'
  ];
}
