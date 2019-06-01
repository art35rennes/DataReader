<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pylon;

class LigneController extends Controller
{
    public function show()
    {
        return view('ligne.show', ['lignes' => Pylon::getLignes()]);
    }
}