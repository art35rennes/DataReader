<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'x',
        'td',
        'lma',
        'statement',
    ];
    //
}
