<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OgolneController extends Controller
{
    //
    public function start(){
        return view('ogolne.welcome');
    }
    public function kontakt(){
        return view('ogolne.kontakt');
    }
    public function onas(){
        $zadania = [
        'Zadanie 1',
        'Zadanie 2',
        'Zadanie 3'
    ];
        return view('ogolne.onas',compact('zadania'));
    }
}
