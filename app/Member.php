<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'user_id', 'access', 'group_id', 'status'
    ];
    public function group(){
        return $this->belongsTo('App\Group');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
