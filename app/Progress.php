<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    public $incrementing = false;
    public $table = 'progress';
    protected $fillable = [
        'id','content_id','status'
    ];
}
