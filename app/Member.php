<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public $incrementing = false;
    protected $fillable = [
        'id', 'user_id', 'group_id', 'access',  'status'
    ];
    public function group(){
        return $this->belongsTo('App\Group');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
