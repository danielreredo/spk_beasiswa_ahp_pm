<?php

namespace App\Http\Controllers;

use \App\Fak;
use \App\Pro;
use \App\Ope;
use \App\Kri;
use \App\Per;
use \App\Mah;
use Illuminate\Http\Request;

class DashboardsController extends Controller
{
    public function index()
    {
        $fak = Fak::all()->count();
        $pro = Pro::all()->count();
        $ope = Ope::all()->count();
        $kri = Kri::all()->count();
        $periode = Per::all()->count();
        $per = Per::orderBy('id_per', 'desc')->get();
        foreach ($per as $pers) {
            $pers->jumlah=Mah::where([['per','=',$pers->id_per]])->count();
        }
        //return $per;
        return view ('/dashboards.index', compact('fak', 'pro', 'ope', 'kri', 'per', 'periode'));
    }
    //
}
