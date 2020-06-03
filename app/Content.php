<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        "member_id", "group_id", "caption", "type"
    ];

}
