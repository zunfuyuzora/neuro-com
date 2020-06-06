<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $incrementing = false;
    public $fillable = [
        'id', 'text', 'member_id', 'content_id'
    ];

    public function commentTo(){
        return $this->belongsTo('App\Content');
    }
    public function member(){
        return $this->belongsTo('App\Member');
    }
}
