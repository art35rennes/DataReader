<?php

namespace App\Http\Controllers;

use App\Data;
use App\Statement;
use App\Pylon;
use Illuminate\Http\Request;


class StatementController extends Controller
{
    public function show()
    {
//        dd(Statement::all());
        return view('statement.show', ['statements' => Statement::show()]);
    }

    public function addView()
    {
//        dd(Pylon::getLignes());
        return view('statement.add',
            ['pylones' => Pylon::getByLigne(),
                'lignes'=> Pylon::getLignes(),
            ]);
    }

    public function addDb(Request $request){

//        dd($request->all());
        if($request->input('newPylonA', false)
            && $request->input('newPylonB', false)){
            if ($request->validate([
                "nom" => 'required|string|max:255',
                "date" => 'required|date',
                "data" => 'nullable|mimes:csv,txt',
                "newPylonA" => 'required',
                "ligneA" => 'required|string|max:255',
                "numeroA" => 'required|integer',
                "longitudeA" => 'nullable',
                "latitudeA" => 'nullable',
                "newPylonB" => 'required',
                "ligneB" => 'required|string|max:255',
                "numeroB" => 'required|integer',
                "longitudeB" => 'nullable',
                "latitudeB" => 'nullable',
                "calibration" => 'nullable'
            ])){
                $pylon = new Pylon();
                $pylon->ligne = $request->ligneA;
                $pylon->numero = $request->numeroA;
                $pylon->longitude = $request->longitudeA;
                $pylon->latitude = $request->latitudeA;

                if (Pylon::where(
                        ['ligne' => $pylon->ligne,
                            'numero' => $pylon->numero]
                    )->first() != null) {
                    $pylonA = Pylon::where(['ligne' => $pylon->ligne, 'numero' => $pylon->numero])->first()->id;
                } else {
                    $pylon->save();
                    $pylonA = $pylon->id;
                }

                $pylon = new Pylon();
                $pylon->ligne = $request->ligneB;
                $pylon->numero = $request->numeroB;
                $pylon->longitude = $request->longitudeB;
                $pylon->latitude = $request->latitudeB;

                if (Pylon::where(
                        ['ligne' => $pylon->ligne,
                            'numero' => $pylon->numero]
                    )->first() != null) {
                    $pylonB = Pylon::where(['ligne' => $pylon->ligne, 'numero' => $pylon->numero])->first()->id;
                } else {
                    $pylon->save();
                    $pylonB = $pylon->id;
                }

                $statement = new Statement();
                $statement->date = $request->date;
                $statement->nom = $request->nom;
                $statement->pylon_A = $pylonA;
                $statement->pylon_B = $pylonB;
                $statement->calibrage = is_float($request->calibration)?$request->calibration:-2.25;
                //                $statement->save();
            }
        }else{
            if (!$request->input('newPylonA', false)
                && $request->input('newPylonB', false) == "on"){
//                dd("b new");
                if ($request->validate([
                    "nom" => 'required|string|max:255',
                    "date" => 'required|date',
                    "data" => 'nullable|mimes:csv,txt',
                    "pylonA" => 'required',
                    "newPylonB" => 'required',
                    "ligneB" => 'required|string|max:255',
                    "numeroB" => 'required|integer',
                    "longitudeB" => 'nullable',
                    "latitudeB" => 'nullable',
                    "calibration" => 'required'
                ])){
                    $PAL = explode(' - n°',$request->input('pylonA'));
                    $PAN = $PAL[1];
                    $PAL = $PAL[0];

                    $pylon = new Pylon();
                    $pylon->ligne = $request->ligneB;
                    $pylon->numero = $request->numeroB;
                    $pylon->longitude = $request->longitudeB;
                    $pylon->latitude = $request->latitudeB;

                    if (Pylon::where(
                            ['ligne' => $pylon->ligne,
                                'numero' => $pylon->numero]
                        )->first() != null) {
                        $pylonB = Pylon::where(['ligne' => $pylon->ligne, 'numero' => $pylon->numero])->first()->id;
                    } else {
                        $pylon->save();
                        $pylonB = $pylon->id;
                    }

                    $statement = new Statement();
                    $statement->date = $request->date;
                    $statement->nom = $request->nom;
                    $statement->pylon_A = Pylon::findIdOf($PAL, $PAN);
                    $statement->pylon_B = $pylonB;
                    $statement->calibrage = is_float($request->calibration)?$request->calibration:-2.25;
//                    $statement->save();
                }
            }else{
                if ($request->input('newPylonA', false) == "on"
                    && !$request->input('newPylonB', false)){
//                    dd('a new');
                    if ($request->validate([
                        "nom" => 'required|string|max:255',
                        "date" => 'required|date',
                        "data" => 'nullable|mimes:csv,txt',
                        "pylonB" => 'required',
                        "newPylonA" => 'required',
                        "ligneA" => 'required|string|max:255',
                        "numeroA" => 'required|integer',
                        "longitudeA" => 'nullable',
                        "latitudeA" => 'nullable'
                    ])) {
                        $PBL = explode(' - n°', $request->input('pylonB'));
                        $PBN = $PBL[1];
                        $PBL = $PBL[0];

                        $pylon = new Pylon();
                        $pylon->ligne = $request->ligneA;
                        $pylon->numero = $request->numeroA;
                        $pylon->longitude = $request->longitudeA;
                        $pylon->latitude = $request->latitudeA;

                        if (Pylon::where(
                                ['ligne' => $pylon->ligne,
                                    'numero' => $pylon->numero]
                            )->first() != null) {
                            $pylonA = Pylon::where(['ligne' => $pylon->ligne, 'numero' => $pylon->numero])->first()->id;
                        } else {
                            $pylon->save();
                            $pylonA = $pylon->id;
                        }

                        $statement = new Statement();
                        $statement->date = $request->date;
                        $statement->nom = $request->nom;
                        $statement->pylon_A = $pylonA;
                        $statement->pylon_B = Pylon::findIdOf($PBL, $PBN);
                        $statement->calibrage = is_float($request->calibration)?$request->calibration:-2.25;
//                        $statement->save();
                    }
                }else{
                    if (!$request->input('newPylonA', false)
                        && !$request->input('newPylonB', false)){
                        if ($request->validate([
                            "nom" => 'required|string|max:255',
                            "date" => 'required|date',
                            "data" => 'nullable|mimes:csv,txt',
                            "pylonA" => 'required',
                            "pylonB" => 'required',
                        ])) {
                            $PAL = explode(' - n°',$request->input('pylonA'));
                            $PAN = $PAL[1];
                            $PAL = $PAL[0];
                            $PBL = explode(' - n°',$request->input('pylonB'));
                            $PBN = $PBL[1];
                            $PBL = $PBL[0];

                            $statement = new Statement();
                            $statement->date = $request->date;
                            $statement->nom = $request->nom;
                            $statement->pylon_A = Pylon::findIdOf($PAL, $PAN);
                            $statement->pylon_B = Pylon::findIdOf($PBL, $PBN);
                            $statement->calibrage = is_float($request->calibration)?$request->calibration:-2.25;
//                            $statement->save();
                        }
                    }
                }
            }
        }

        if(Statement::where(['date'=>$statement->date, 'nom'=>$statement->nom])->first()!=null){
            $msg = 'Un relevé portant le même nom et ayant la même date existe déjà !';
            $success = 0;
        }
        else{
            $n = 0;
//            dd($statement);
            $statement->save();
            if ($request->hasFile('data') && $request->file('data')->isValid()){
                $indexX = 1;
                $indexLD = 2;
                $indexLMA = 3;

                $data = new Data();
                $dataToInsert = [];

                $file = $request->data;
                $fn = fopen($file,"r");
                while(! feof($fn))  {
                    $line = fgets($fn);
                    if (is_numeric($line[0])){
                        $split = preg_split('/[;]/', $line);
//                        echo 'X: '.$split[$indexX].
//                            ' / LD: '.$split[$indexLD].
//                            ' / LMA: '.$split[$indexLMA].
//                            ' / line: '.$line.'<br>';
//                        dd($split);

                        if ($split[$indexX] != '' &&
                            $split[$indexLD] != '' &&
                            $split[$indexLMA] != '') {
                            array_push($dataToInsert, [
                                'x' => floatval(preg_replace('/[,]/','/[.]/',$split[$indexX])),
                                'ld' => floatval(preg_replace('/[,]/','/[.]/',$split[$indexLD])),
                                'lma' => floatval(preg_replace('/[,]/','/[.]/',$split[$indexLMA])),
                                'statement' => $statement->id
                            ]);
                            $n++;
                        }else{
                            echo [
                                'x' => $split[$indexX],
                                'ld' => $split[$indexLD],
                                'lma' => $split[$indexLMA],
                                'statement' => $statement->id
                            ].'<br>';
                        }
                    }
//                    if (count($dataToInsert) == 500 ){
//                        $data->save($dataToInsert);
//                        unset($dataToInsert);
//                        $dataToInsert = [];
//                    }

                }
                if (count($dataToInsert) > 0 ){
//                    echo '<h3>N: '.$n.'</h3><br>';
//                    foreach ($dataToInsert as $tab){
//                        echo 'x: '.$tab['x'].'<br>';
//                        echo $tab['x']=="" ? 'problème' : null;
//                    }
//                    dd('stop');
                    $collectionToInsert = collect($dataToInsert);
                    $chunkToInsert = $collectionToInsert->chunk(1000);
                    foreach ($chunkToInsert as $chunk) {
                        Data::insert($chunk->toArray());
                    }
                }
                fclose($fn);
            }
            $success = 1;
            $msg = $n." données ajouté !";
        }

//        dd('no return is possible '.$msg);
        return view('statement.add',
            ['pylones' => Pylon::getByLigne(),
            'lignes'=> Pylon::getLignes(),
            'success'=>$success,
            'msg'=> $msg,
            ])
            ->withInput($request->input());
    }
}