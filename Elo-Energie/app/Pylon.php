<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Pylon extends Model
{
    protected $fillable = [
        'ligne',
        'numero',
        'longitude',
        'latitude',
    ];
    protected $attributes = [
        'longitude' => null,
        'latitude' => null,
    ];

    protected $casts = [
        'ligne' => 'string',
        'numero' => 'int',
        'longitude' => 'float',
        'latitude' => 'float',
    ];

    protected $connection = 'mysql';

    static public function getLignes(){
        return DB::table('pylons')
            ->select('ligne', DB::raw('count(id) as nb'))
            ->groupBy('ligne')
            ->get();
    }
}
