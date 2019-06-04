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
        error_log('Start CSV: '.date('H:i:s'));

        $data = DB::table('data')
                    ->select('x', 'ld', 'lma')
                    ->where('statement','=',$statement)
                    ->get();
        error_log('Fin DB: '.date('H:i:s'));


        $f = fopen("php://memory", "w");
        fputcsv($f, ["x","ld","lma"],",");

        foreach ($data as $key => $value)
            fputcsv($f,[$value->x,$value->ld,$value->lma],",");

        fseek($f, 0);
        error_log('Fin gen CSV: '.date('H:i:s'));

        header('Content-Type: application/csv');
        header('Content-Disposition: attachment; filename="'.$filename.'";');
        error_log('envoi CSV: '.date('H:i:s:v'));

        fpassthru($f);

        error_log('FIN: '.date('H:i:s'));
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

//->select(
//    " AVG(ABS($data)) as 'avg_abs'",
//    " MAX($data)) as 'max'",
//    " MIN($data)) as 'min'")