<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    public $timestamps = false;
    protected $connection = 'mysql';
    protected $fillable = [
        'x',
        'ld',
        'lma',
        'statement',
    ];

}
