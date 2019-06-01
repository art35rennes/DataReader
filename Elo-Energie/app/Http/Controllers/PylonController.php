<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pylon;

class PylonController extends Controller
{
    public function show()
    {
        return view('pylon.show', ['pylons' => Pylon::all()]);
    }

    public function addView()
    {
//        dd(Pylon::getLignes());
        return view('pylon.add', ['lignes' => Pylon::getLignes()]);
    }

    public function addDb(Request $request){
//        dd($request->all());
        $n=0;

        if ($request->validate([
            'ligne_p_A' => 'required|max:255',
            'num_p_A' => 'required',
            'longitude_p_A' => 'required',
            'latitude_p_A' => 'required'
        ])) {
            $pylonA = new Pylon();
            $pylonA->ligne = $request->ligne_p_A;
            $pylonA->numero = $request->num_p_A;
            $pylonA->longitude = $request->longitude_p_A;
            $pylonA->latitude = $request->latitude_p_A;

            if (Pylon::where(
                    ['ligne' => $pylonA->ligne,
                        'numero' => $pylonA->numero]
                )->first() != null) {
                //dd('exist');
            } else {
                //dd('not exist');
                $pylonA->save();
                $n++;
            }

            if ($request->validate([
                'ligne_p_B' => 'required|max:255',
                'num_p_B' => 'required',
                'longitude_p_B' => 'required',
                'latitude_p_B' => 'required'
            ])) {
                $pylonB = new Pylon();
                $pylonB->ligne = $request->ligne_p_B;
                $pylonB->numero = $request->num_p_B;
                $pylonB->longitude = $request->longitude_p_B;
                $pylonB->latitude = $request->latitude_p_B;

                if (Pylon::where(
                        ['ligne' => $pylonB->ligne,
                            'numero' => $pylonB->numero]
                    )->first() != null) {
//                dd('exist');
                } else {
//                dd('not exist b');
                    $pylonB->save();
                    $n++;
                }
            }
            else{
                dd('nop');
            }

            return view('pylon.add', ['lignes' => Pylon::getLignes()])->withInput($request->input())->with('success', $n);
        }
    }
}