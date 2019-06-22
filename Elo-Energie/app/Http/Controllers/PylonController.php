<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pylon;
use Illuminate\Support\Facades\Input;

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
        $n=0;
        $msg = "";

        if ($request->validate([
            'ligne' => 'required|max:255|string',
            'numero' => 'required|integer',
            'longitude' => 'nullable',
            'latitude' => 'nullable'
        ])) {
            $pylon = new Pylon();
            $pylon->ligne = $request->ligne;
            $pylon->numero = $request->numero;
            $pylon->longitude = $request->longitude;
            $pylon->latitude = $request->latitude;

            if (Pylon::where(
                    ['ligne' => $pylon->ligne,
                        'numero' => $pylon->numero]
                )->first() != null) {
                $msg = "Pylône déjà référencé !";
            } else {
                $pylon->save();
                $n++;
            }
            return view('pylon.add', ['lignes' => Pylon::getLignes(), 'success' => $n, 'msg' => $msg])->withInput($request->input());
        }
    }
}