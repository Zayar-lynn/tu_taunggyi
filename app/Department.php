<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable=[
        'name','head_of_department','phone','email','description','photo'
    ];

    public function teachers(){
        return $this->hasMany('App\Teacher');
    }
}
