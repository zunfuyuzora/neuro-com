<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    public $incrementing = false;
    protected $fillable = [
        "id","member_id", "group_id", "caption", "type"
    ];

}
