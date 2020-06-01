<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        "name","description","avatar"
    ];

    public function getMembers(){
        return $this->hasMany('\Member');
    }
}
