<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public $fillable = [
        'objective', 'status'
    ];

    public function thisBoard(){
        return $this->belongsTo('\Board');
    }

    public function comments(){
        return $this->belongsToMany('\Comment');
    }

    public function media(){
        return $this->belongsToMany('\File');
    }
}
