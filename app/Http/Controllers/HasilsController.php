<?php

namespace App\Http\Controllers;

use App\Mah;
use App\Per;
use App\Pro;
use App\Kri;
use App\Ket;
use App\Kep;
use App\Fac;
use App\Skor_kri;
use Illuminate\Http\Request;

function pembobotan($kris){
    $m = array();
    foreach ($kris as $bawah) {
        $b = array();
        //array_push($b,$bawah['no']);
        foreach ($kris as $kanan) {
            if ($bawah!==$kanan) {
                $atas=Ket::whereRaw('k1=? and k2=?',[$bawah['id_kri'],$kanan['id_kri']])->first();
                $kiri=Ket::whereRaw('k1=? and k2=?',[$kanan['id_kri'],$bawah['id_kri']])->first();
                if($atas!==null)array_push($b,Kep::find($atas['kep'])['angka']);
                elseif($kiri!==null)array_push($b,1.0/Kep::find($kiri['kep'])['angka']);
            } else array_push($b,1);
        }
        array_push($m,$b);
    }
    return $m;
}

function eigenValue($matriks)
{
    $ev=array();
    $pangkat=1.0/count($matriks);
    foreach($matriks as $baris){
        $e=pow(array_product($baris),$pangkat);
        array_push($ev,$e);
    }
    return $ev;
}

function bobotProir($ev){
    $bp=array();
    $a=array_sum($ev);
    foreach ($ev as $e) {
        array_push($bp,$e/$a);
    }
    return $bp;
}

function sumarry($matriks){
    $a=array();
    for($i=0;$i<count($matriks);$i++){
        $v=0;
        for($ii=0;$ii<count($matriks);$ii++)
            $v+=$matriks[$ii][$i];
        array_push($a,$v);
    }
    return $a;
}

function bobotKri($matriks){
    $bk=array();
    foreach ($matriks as $bkr){
        array_push($bk,array_sum($bkr));
    }
    return $bk;
}

function sKri ($kris, $maha)
{
    $x = array();
    foreach ($kris as $s) {
        $sk=Skor_kri::where([['mah','=',$maha->id_mah],['kri','=',$s->id_kri]])->first();
        $skor=floatval($sk->skor);
        array_push($x, $skor);
        
    }
    return $x;
}

function bobotBkxn($skri, $bp){
    $x = array();
    for($i=0;$i<count($skri);$i++)
    {
        array_push($x, $skri[$i]*$bp[$i]);
    }
    return $x;
}

function hasile($jumlah,$kris,$bkxn){
    $cf = Fac::whereRaw('nm_fac=? and per=?', ['Core Factor', session('per')])->first();
    $sf = Fac::whereRaw('nm_fac=? and per=?', ['Secondary Factor', session('per')])->first();
    $h=array();
    $cfs=array();
    $sfs=array();
    for($i=0;$i<count($kris);$i++){
        $kri=$kris[$i];
        if($kri->fac===$cf->id_fac)array_push($cfs,$i);
        elseif($kri->fac===$sf->id_fac) array_push($sfs,$i);
    } $a2=buat_array($bkxn,$cfs);
    $a3=buat_array($bkxn,$sfs);
    $h['gcf']=$cfs;
    $h['gsf']=$sfs;
    $h['t.cf']=avg($a2);
    $h['t.sf']=avg($a3);
    $h['facs']=Fac::where('per', session('per'))->get();
    $h['r']=($h['t.cf']*$h['facs'][0]->persen/100)+($h['t.sf']*$h['facs'][1]->persen/100);
    return $h;
}

function avg($a2){
    $s=0.0;
    foreach($a2 as $a)$s+=$a;
    $s/=count($a2);
    return $s;
}

function buat_array($bkxn,$cfs){
    $a=array();
    foreach($cfs as $c)array_push($a,$bkxn[$c]);
    return $a;
}

function sorting($mah){
    for($i=0;$i<count($mah);$i++)for($ii=0;$ii<count($mah);$ii++){
        $a=$mah[$i];
        $b=$mah[$ii];
        if($b->skor<$a->skor){
            $mah[$i]=$b;
            $mah[$ii]=$a;
        }
    }
}

class HasilsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $per = Per::orderBy('id_per', 'desc')->get();
        return view ('hasils.index', compact('per'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($a, Request $req)
    {
        session()->put('per', $a);
        $pro=\App\Ope::where('user',auth()->user()->id)->first();
        $mah = Mah::where([['pro','=',$pro->pro],['per','=',$a]])->get();
        $per = Per::select('per')->where('id_per', $a)->first();
        $pr = Pro::where('id_pro', $pro->pro)->first('nm_pro');
        foreach($mah as $maha){
        $kris = Kri::where('per', session('per'))->get();
        $matriks=pembobotan($kris);
        $skri =sKri($kris, $maha);
        $ev=eigenValue($matriks);
        
        $bp=bobotProir($ev);
        $bkxn = bobotBkxn($bp, $skri);
        $bk=bobotKri($matriks);
        $jumlah=sumarry($matriks);
        $hasil=hasile($jumlah,$kris,$bkxn);
        $maha->skor=$hasil['r'];
        } sorting($mah);
        return view('hasils.show', compact('pr', 'mah', 'per'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
