<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    public $incrementing = false;
    protected $fillable = [
        'id','name','objective','member_id','group_id'
    ];

    public function group() {
        return $this->belongsTo('App\Group');
    }

    public function member() {
        return $this->belongsTo('App\Member');
    }

    public function task() {
        return $this->hasMany('App\Task');
    }
}
