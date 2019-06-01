<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statement extends Model
{
    protected $fillable = [
        'date',
        'nom',
        'pylon_A',
        'pylon_B',
    ];

}
