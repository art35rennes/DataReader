<?php

namespace App\Http\Controllers;

use App\Statement;
use Illuminate\Http\Request;
use App\Pylon;
use Illuminate\Support\Facades\Input;

class StatementController extends Controller
{
    public function show()
    {
//        dd(Statement::all());
        return view('statement.show', ['statements' => Statement::all()]);
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
                //"data" => 'required', //TODO implemente file system for data graph
                "newPylonA" => 'required',
                "ligneA" => 'required|string|max:255',
                "numeroA" => 'required|integer',
                "longitudeA" => 'required',
                "latitudeA" => 'required',
                "newPylonB" => 'required',
                "ligneB" => 'required|string|max:255',
                "numeroB" => 'required|integer',
                "longitudeB" => 'required',
                "latitudeB" => 'required'
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
//                $statement->save();
            }
        }else{
            if (!$request->input('newPylonA', false)
                && $request->input('newPylonB', false) == "on"){
//                dd("b new");
                if ($request->validate([
                    "nom" => 'required|string|max:255',
                    "date" => 'required|date',
                    //"data" => 'required', //TODO implemente file system for data graph
                    "pylonA" => 'required',
                    "newPylonB" => 'required',
                    "ligneB" => 'required|string|max:255',
                    "numeroB" => 'required|integer',
                    "longitudeB" => 'required',
                    "latitudeB" => 'required'
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
//                    $statement->save();
                }
            }else{
                if ($request->input('newPylonA', false) == "on"
                    && !$request->input('newPylonB', false)){
//                    dd('a new');
                    if ($request->validate([
                        "nom" => 'required|string|max:255',
                        "date" => 'required|date',
                        //"data" => 'required', //TODO implemente file system for data graph
                        "pylonB" => 'required',
                        "newPylonA" => 'required',
                        "ligneA" => 'required|string|max:255',
                        "numeroA" => 'required|integer',
                        "longitudeA" => 'required',
                        "latitudeA" => 'required'
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
//                        $statement->save();
                    }
                }else{
                    if (!$request->input('newPylonA', false)
                        && !$request->input('newPylonB', false)){
                        if ($request->validate([
                            "nom" => 'required|string|max:255',
                            "date" => 'required|date',
                            //"data" => 'required', //TODO implemente file system for data graph
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
            $statement->save();
            $success = 1;
            $msg = "";
        }
        return view('statement.add',
            ['pylones' => Pylon::getByLigne(),
            'lignes'=> Pylon::getLignes(),
            'success'=>$success,
            'msg'=> $msg,
            ])
            ->withInput($request->input());
    }
}