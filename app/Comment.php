<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $fillable = [
        'text'
    ];

    public function commentTo(){
        if ($content = $this->belongsToMany('\Content')) {
            return $content;
        }else {
            return $this->belongsToMany('\Task');
        }
    }
}
