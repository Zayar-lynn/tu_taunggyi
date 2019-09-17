<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
  protected $fillable = [
    'id',
    'name_of_peer',
    'research_title',
    'author',
    'subject',
    'year',
    'pdf',
    'account_id'
  ];
}
