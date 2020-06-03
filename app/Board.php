<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    public $fillable = [
        'name','objective','member_id','group_id'
    ];

    public function group() {
        return $this->belongsTo('App\Group');
    }

    public function task() {
        return $this->hasMany('App\Task');
    }
}
