<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public function group(){
        return $this->belongsTo('\Group');
    }

    public function user(){
        return $this->belongsTo('\User');
    }
}
