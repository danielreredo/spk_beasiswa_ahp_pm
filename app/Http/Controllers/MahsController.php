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

function sKri ($kris, $mah)
{
    $x = array();
    foreach ($kris as $s) {
        $sk=Skor_kri::where([['mah','=',$mah->id_mah],['kri','=',$s->id_kri]])->first();
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

class MahsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $per = Per::orderBy('id_per', 'desc')->get(['id_per','per']);
        return view ('mahs.index', compact('per'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pro = Pro::all();
        return view('mahs.create', compact('pro'));
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
        
        $pro=\App\Ope::where('user',auth()->user()->id)->first();
        $per=$request->session()->get('id_per');

        $count = Mah::select('nm_mah')->where([['npm', '=', $request->npm], ['per', '=', $per]])->count();
        // return $count;
        if($count > 0)
        {
            $message = [
                'npm.digits' => 'npm harus :digits digit!',
                'npm.required' => 'npm harus diisi!',
                'npm.unique' => 'npm sudah terdaftar pada periode ini!',
                'nm_mah.required' => 'nama mahasiswa harus diisi!'
            ];
            $request->validate([
                'npm' => 'required|unique:mahs|digits:10',
                'nm_mah' => 'required'
            ],$message);
        }

        else
        {
            $message = [
                'npm.digits' => 'npm harus :digits digit!',
                'npm.required' => 'npm harus diisi!',
                'npm.unique' => 'npm sudah terdaftar pada periode ini!',
                'nm_mah.required' => 'nama mahasiswa harus diisi!'
            ];
            $request->validate([
                'npm' => 'required|digits:10',
                'nm_mah' => 'required'
            ],$message);
        }

        $kri = Kri::select('id_kri')->where('per', $per)->get();

        $mah = new \App\Mah;
        $mah->npm = "$request->npm";
        $mah->nm_mah = "$request->nm_mah";
        $mah->pro = $pro->pro;
        $mah->per = "$per";
        $mah->jk_mah = "$request->jk_mah";
        $mah->save();
        
        $id = $mah->id_mah;

        foreach($kri as $kris)
        {
            $skor = new \App\Skor_kri;
            $skor->kri = "$kris->id_kri";
            $skor->mah = "$id";
            $skor->skor = "0";
            $skor->save();
        }

        $request->session()->forget('id_per');

        return redirect('/mahs/'.$per)->with('status', 'Data Mahasiswa Pendaftar Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mah  $mah
     * @return \Illuminate\Http\Response
     */
    public function show($a,Request $req)
    {
        session()->put('per', $a);
        $pro=\App\Ope::where('user',auth()->user()->id)->first();
        $mah = Mah::where([['pro','=',$pro->pro],['per','=',$a]])->get();
        $pr = Pro::where('id_pro', $pro->pro)->first('nm_pro');
        // $per = Per::find($a);
        $req->session()->put('id_per',$a);
        return view('mahs.show', compact('mah', 'pr'));
        //
    }
    
    public function shw($b) {
        $mah = Mah::join('pros', 'mahs.pro', '=', 'pros.id_pro')->where('id_mah', $b)->first();
        $p = Per::where('id_per', $mah->per)->first();
        $kris = Kri::where('per', session('per'))->get();
        $matriks=pembobotan($kris);
        $skri =sKri($kris, $mah);
        $ev=eigenValue($matriks);
        $bp=bobotProir($ev);
        $bkxn = bobotBkxn($bp, $skri);
        $jumlah=sumarry($matriks);
        $hasil=hasile($jumlah,$kris,$bkxn);
        // return ['per'=>$p,'mah'=>$mah];
        // return array('mah'=>$mah,'p'=>$p,'matriks'=>$matriks);
        // return $a2;
        return view('mahs.shw', compact('mah','p','matriks','jumlah','hasil', 'bp', 'skri', 'bkxn', 'kris'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mah  $mah
     * @return \Illuminate\Http\Response
     */
    public function edit(Mah $mah)
    {
        return view ('mahs.edit', compact('mah'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mah  $mah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mah $mah)
    {
        $ma = Mah::select('nm_mah', 'npm')->where('id_mah', $mah->id_mah)->first();
        $per=$request->session()->get('id_per');
        $count = Mah::where([['npm', '=', $request->npm], ['per', '=', $per]])->count();

        
        if( $request->nm_mah != $ma->nm_mah && $request->npm != $ma->npm)
        {
            if($count > 0)
            {
                $message = [
                    'npm.digits' => 'npm harus :digits digit!',
                    'npm.required' => 'npm harus diisi!',
                    'npm.unique' => 'npm sudah terdaftar pada periode ini!',
                    'nm_mah.required' => 'nama mahasiswa harus diisi!'
                ];
                $request->validate([
                    'npm' => 'required|unique:mahs|digits:10',
                    'nm_mah' => 'required'
                ],$message);
            }
    
            else
            {
                $message = [
                    'npm.digits' => 'npm harus :digits digit!',
                    'npm.required' => 'npm harus diisi!',
                    'npm.unique' => 'npm sudah terdaftar pada periode ini!',
                    'nm_mah.required' => 'nama mahasiswa harus diisi!'
                ];
                $request->validate([
                    'npm' => 'required|digits:10',
                    'nm_mah' => 'required'
                ],$message);
            }
        }
        
        else if($request->nm_mah != $ma->nm_mah)
        {
            if($count > 0)
            {
                $message = [
                    // 'npm.digits' => 'npm harus :digits digit!',
                    // 'npm.required' => 'npm harus diisi!',
                    // 'npm.unique' => 'npm sudah terdaftar pada periode ini!',
                    'nm_mah.required' => 'nama mahasiswa harus diisi!'
                ];
                $request->validate([
                    // 'npm' => 'required|unique:mahs|digits:10',
                    'nm_mah' => 'required'
                ],$message);
            }
    
            else
            {
                $message = [
                    // 'npm.digits' => 'npm harus :digits digit!',
                    // 'npm.required' => 'npm harus diisi!',
                    // 'npm.unique' => 'npm sudah terdaftar pada periode ini!',
                    'nm_mah.required' => 'nama mahasiswa harus diisi!'
                ];
                $request->validate([
                    // 'npm' => 'required|unique:mahs|digits:10',
                    'nm_mah' => 'required'
                ],$message);
            }
            
        }
        else if($request->npm != $ma->npm)
        {
            if($count > 0)
            {
                $message = [
                    'npm.digits' => 'npm harus :digits digit!',
                    'npm.required' => 'npm harus diisi!',
                    'npm.unique' => 'npm sudah terdaftar pada periode ini!',
                    // 'nm_mah.required' => 'nama mahasiswa harus diisi!'
                ];
                $request->validate([
                    'npm' => 'required|unique:mahs|digits:10',
                    // 'nm_mah' => 'required'
                ],$message);
            }
    
            else
            {
                $message = [
                    'npm.digits' => 'npm harus :digits digit!',
                    'npm.required' => 'npm harus diisi!',
                    'npm.unique' => 'npm sudah terdaftar pada periode ini!',
                    // 'nm_mah.required' => 'nama mahasiswa harus diisi!'
                ];
                $request->validate([
                    'npm' => 'required|digits:10',
                    // 'nm_mah' => 'required'
                ],$message);
            }
        }

        else
            {
                $message = [
                    'npm.digits' => 'npm harus :digits digit!',
                    'npm.required' => 'npm harus diisi!',
                    'npm.unique' => 'npm sudah terdaftar pada periode ini!',
                    'nm_mah.required' => 'nama mahasiswa harus diisi!'
                ];
                $request->validate([
                    'npm' => 'required|digits:10',
                    'nm_mah' => 'required'
                ],$message);
            }
        
        Mah::where('id_mah', $mah->id_mah)
        ->update([
            'nm_mah'=>$request->nm_mah,
            'npm'=>$request->npm,
            'jk_mah'=>$request->jk_mah
        ]);
        $request->session()->forget('id_per');
        return redirect('/mahs/'.$per)->with('status', 'Data Pendaftar Beasiswa Berhasil Diubah');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mah  $mah
     * @return \Illuminate\Http\Response
     */
    public function destroy($a, Request $request)
    {
        $per=$request->session()->get('id_per');
        // return $per;
        Mah::destroy($a);
        $request->session()->forget('id_per');
        return redirect('/mahs/'.$per)->with('status', 'Data Pendaftar Berhasil Dihapus');
        //
    }
}
