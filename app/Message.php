<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'member_id','group_id', 'user_id', 'message','created_at'
    ];

    public function member()
    {
        return $this->belongsTo('App\Member');
    }

    public function group() 
    {
        return $this->hasOne('App\Group');
    }
}
