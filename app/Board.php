<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    public $fillable = [
        'name','objective'
    ];

    public function group() {
        return $this->belongsTo('\Group');
    }

    public function task() {
        return $this->hasMany('\Task');
    }
}
