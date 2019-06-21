<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function show($statement)
    {
        return view('data.show', ['id'=>$statement]);
    }

    public function getCsv($statement, $filename='data.csv'){
        $stats = json_decode($this->getGraphStats($statement, 'lma'));
        $lmaMin = $stats[0]->min;

        error_log('Start CSV: '.date('H:i:s1'));

        $calibrage  = DB::table('statements')
            ->select('calibrage')
            ->where("id", "=", $statement)
            ->distinct()
            ->get();
        $calibrage = $calibrage[0]->calibrage;

        $data = DB::table('data')
                    ->select('x', 'ld', 'lma')
                    ->where('statement','=',$statement)
                    ->get();
        error_log('Fin DB: '.date('H:i:s'));


        $f = fopen("php://memory", "w");
        fputcsv($f, ["x","ld","lma"],",");

        foreach ($data as $key => $value)
            fputcsv($f,[$value->x,$value->ld,($value->lma - $lmaMin) * $calibrage],",");

        fseek($f, 0);
        error_log('Fin gen CSV: '.date('H:i:s'));

        header('Content-Type: application/csv');
        header('Content-Disposition: attachment; filename="'.$filename.'";');
        error_log('envoi CSV: '.date('H:i:s:v'));

        fpassthru($f);

        error_log('FIN: '.date('H:i:s'));
    }

    public function getCalibration($statement){
        $calibrage  = DB::table('statements')
            ->select('calibrage')
            ->where("id", "=", $statement)
            ->distinct()
            ->get();
        return $calibrage[0]->calibrage;
    }

    public function getGraphStats($statement, $data){ //TODO fix query -> calc only on return value
        $count = DB::table('data')
            ->select('ld')
            ->where('statement', '=', $statement)
            ->count();

        $count /= 2;
        $data = str_replace('Graph','',$data);
        return json_encode(DB::select(
            DB::raw("
        SELECT AVG(ABS(filtre.$data)) AS 'avg_abs', 
        MAX(filtre.$data) AS 'max', 
        MIN(filtre.$data) AS 'min' 
        FROM 
            ( SELECT $data FROM `data` 
            WHERE statement = $statement 
            LIMIT $count ) AS filtre"))
        );
    }
}