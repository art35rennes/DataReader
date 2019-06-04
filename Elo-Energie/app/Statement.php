<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Statement extends Model
{
    protected $fillable = [
        'date',
        'nom',
        'pylon_A',
        'pylon_B',
    ];

    protected $connection = 'mysql';

    static public function show(){
        return (DB::select(DB::raw('SELECT statements.id, statements.date, statements.nom, COUNT(data.id) AS donnees, PA.numero AS pylon_A, PA.ligne AS ligne_A, PB.numero AS pylon_B, PB.ligne AS ligne_B FROM statements JOIN data ON statements.id = data.statement JOIN pylons AS PA ON statements.pylon_A = PA.id JOIN pylons AS PB ON statements.pylon_B = PB.id GROUP BY statements.id')));
    }

}
