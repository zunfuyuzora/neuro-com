<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public $incrementing = false;
    protected $fillable = [
        "id","name","description","avatar"
    ];

    public function getMembers(){
        return $this->hasMany('\Member');
    }

    public function getBoards(){
        return $this->hasMany('\Board');
    }
}
