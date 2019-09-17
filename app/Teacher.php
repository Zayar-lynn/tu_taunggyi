<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable=[
       'name',
       'phone',
       'email',
       'address',
       'position',
       'degree',
       'detail',
       'department_id',
       'photo',
       'fb_link',
       'role',
    ];

    public function department(){
        return $this->belongsTo('App\Department');
    }
}
