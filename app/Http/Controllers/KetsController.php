<?php

namespace App\Http\Controllers;

use App\Ket;
use App\Kep;
use App\Kri;
use App\Per;
use Illuminate\Support\Facades\DB;
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

function jumlah($bobot)
{
    $jum=array();
    for($kolom=0;$kolom<count($bobot[0]);$kolom++){
        $n=0;
        for($baris=0;$baris<count($bobot);$baris++)
            $n+=$bobot[$baris][$kolom];
        array_push($jum,$n);
    }
    return $jum;
}

function normalisasi($matriks,$jumlah)
{
    $norm=array();
    foreach($matriks as $baris){
        $b=array();
        for($i=0;$i<count($baris);$i++){
            array_push($b,$baris[$i]/$jumlah[$i]);
        } array_push($norm,$b);
    }
    return $norm;
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

function bobotSint($normal){
    $bs=array();
    foreach ($normal as $b) {
        array_push($bs,array_sum($b));
    }
    return $bs;
}

function bobotKri($matriks){
    $bk=array();
    foreach ($matriks as $bkr){
        array_push($bk,array_sum($bkr));
    }
    return $bk;
}

function eigenMax($bp,$bs){
    $em=array();
    for($i=0;$i<count($bp);$i++){
        array_push($em,$bs[$i]/$bp[$i]);
    }
    return $em;
}

function hasilEM($em){
    $hasil=array();
    $ir=array(0,0,0.58,0.9,1.12,1.24,1.32,1.41,1.45,1.49,1.51,1.48,1.56,1.57,1.59);
    $qty=count($em);
    $hasil['sumem']=array_sum($em);
    $hasil['lambda']=$hasil['sumem']/$qty;
    $hasil['ci']=($hasil['lambda']-$qty)/($qty-1);
    $hasil['ir']=$ir[$qty-1];
    $hasil['cr']=$hasil['ci']/$hasil['ir'];
    return $hasil;
}

class KetsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $per = Per::orderBy('id_per', 'desc')->get();
        return view('kets.in', compact('per'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function in($per)
    {
        session()->put('per', $per);
        $kris = Kri::where('per', $per)->get();
        $kets = [];
        $kep = Kep::where('angka','=',1)->first();
        $k = Kep::orderBy('angka', 'asc')->get();
    
        for($i=0; $i<count($kris); $i++)
        {
            for($ii=0; $ii<count($kris); $ii++)
            {
                if($i < $ii)
                {
                    $y=!Ket::whereRaw('k1=? and k2=? and per=?',[$kris[$i]['id_kri'],$kris[$ii]['id_kri'],$per])->exists()
                    &&!Ket::whereRaw('k1=? and k2=? and per=?',[$kris[$ii]['id_kri'],$kris[$i]['id_kri'],$per])->exists();
                    if ($y){
                    $b = new Ket();
                    $b->k1=$kris[$i]['id_kri'];
                    $b->k2=$kris[$ii]['id_kri'];
                    $b->kep=$kep['nm_kep'];
                    $b->per=$per;
                    $b->save();
                    array_push($kets, $b);
                } else {
                    $b=Ket::whereRaw('k1=? and k2=? and per=?',[$kris[$i]['id_kri'],$kris[$ii]['id_kri'],$per])->first();
                    if($b===null)
                    $b=Ket::whereRaw('k1=? and k2=? and per=?',[$kris[$ii]['id_kri'],$kris[$i]['id_kri'],$per])->first();
                    array_push($kets, $b);
                }
                }
            }
        }
        foreach($kets as $ket){
            $ket['krit1']=Kri::where('per', $per)->find($ket['k1']);
            $ket['krit2']=Kri::where('per', $per)->find($ket['k2']);
        }

        $urt = 1;
        foreach($kris as $no)
        {
            $no['no'] = 'K-'.$urt;
            $urt++;
        }
        // return $kris;
        $matriks=pembobotan($kris);
        $jumlah=jumlah($matriks);
        $normal=normalisasi($matriks,$jumlah);
        $ev=eigenValue($matriks);
        array_push($jumlah,array_sum($ev));
        $bp=bobotProir($ev);
        array_push($jumlah,array_sum($bp));
        $bs=bobotSint($normal);
        $bk=bobotKri($matriks);
        $em=eigenMax($bp,$bs);
        $hasil=hasilEM($em);

        if($hasil['cr']<=0.1){
            $status="Perbandingan Kriteria Konsisten.";
            return view('kets.index', compact('kets', 'k', 'matriks', 'kris', 'jumlah'
            ,'normal','ev','bp','bs','em','hasil', 'status'));
        }
        else{
            $status="Perbandingan Kriteria Tidak Konsisten.
            Harap Ulangi Perbandingan Untuk Hasil Akurat!";
            return view('kets.index', compact('kets', 'k', 'matriks', 'kris', 'jumlah'
            ,'normal','ev','bp','bs','em','hasil', 'status'));
        }
        // return $kep;
        //
        //return $matriks;
    }
    
    public function swipe($k1,$k2)
    {
        // return session('per');
        Ket::whereRaw('k1=? and k2=? and per=?',[$k1,$k2,session('per')])->update(['k1'=>$k2,'k2'=>$k1]);
        return redirect('/kets/'.session('per'));
    }
    
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
    public function show($id)
    {
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
    public function update(Request $request)
    {
        // foreach ($request as $kep) {
        // Kep::->update([
        //         'kep'=>$kep->ket{{}}
        //     ]);
        // }
        foreach (Ket::where('per', session('per'))->get() as $kep) {
            $nm='ket'.$kep['k1'].'m'.$kep['k2'];
            Ket::whereRaw('k1=? and k2=?',[$kep['k1'],$kep['k2']])->update(['kep'=>$request->input($nm)]);
        }
        return redirect('/kets/'.session('per'))->with('status', 'Data Pendaftar Beasiswa Berhasil Diubah');
        //return $request;
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
