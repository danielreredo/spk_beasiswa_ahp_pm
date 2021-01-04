<?php

namespace App\Http\Controllers;

use App\Kri;
use App\Fac;
use App\Per;
use App\Kep;
use App\Ket;
use App\Mah;
use App\Skor_kri;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KrisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $per = Per::orderBy('id_per', 'desc')->get();
        return view('kris.in', compact('per'));
    }

    public function in($per)
    {
        session()->put('per', $per);
        $nm_per = Per::where('id_per', session('per'))->first();
        $dnl = DB::table('kris')
        ->join('facs','kris.fac','=','facs.id_fac')
        ->where('kris.per', session('per'))
        ->get();
        return view('kris.index', compact('dnl', 'nm_per'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $facs = Fac::where('per', session('per'))->get();
        return view('kris.create', compact('facs'));
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
        $per = session('per');
        $ada = Kri::whereRaw('nm_kri=? and per=?', [$request->nm_kri, session('per')])->count();
        if($ada > 0)
        {
            $message = [
                'required' => 'nama kriteria harus diisi!',
                'unique' => 'nama kriteria sudah ada!'
            ];
            $request->validate([
                'nm_kri' => 'required|unique:kris'
            ],$message);
        }
        $kri = New \App\Kri;
        $kri->nm_kri = $request->nm_kri;
        $kri->fac = $request->fac;
        $kri->per = session('per');
        $kri->save();
        
        $kris = Kri::where('per', $per)->get();
        $kets = [];
        $kep = Kep::where('angka','=',1)->first();
        
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

        $mah = Mah::where('per',$per)->get();

        foreach($mah as $m){
            $x = new Skor_kri();
            $x->kri = $kri->id_kri;
            $x->mah = $m->id_mah;
            $x->skor = 0;
            $x->save();

        }

        return redirect('/kris/'.session('per'))->with('status', 'Data Kriteria Berhasil Ditambahkan');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kri  $kri
     * @return \Illuminate\Http\Response
     */
    public function show(Kri $kri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kri  $kri
     * @return \Illuminate\Http\Response
     */
    public function edit(Kri $kri)
    {
        $fac = Fac::where('per', session('per'))->get();
        return view('kris.edit', compact('kri', 'fac'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kri  $kri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kri $kri)
    {
        $nama = Kri::select('nm_kri')->where('id_kri', $kri->id_kri)->first();
        $ada = Kri::whereRaw('nm_kri=? and per=?', [$request->nm_kri, session('per')])->count();
        if($request->nm_kri!=$nama->nm_kri)
        {
            if($ada > 0)
            {
                $message = [
                    'required' => 'nama kriteria harus diisi!',
                    'unique' => 'nama kriteria sudah ada!'
                ];
                $request->validate([
                    'nm_kri' => 'required|unique:kris'
                ],$message);
            }
        }
        Kri::whereRaw('id_kri=? and per=?', [$kri->id_kri, session('per')])
        ->update([
            'nm_kri'=>$request->nm_kri,
            'fac'=>$request->fac
        ]);
        return redirect('/kris/'.session('per'))->with('status', 'Data Kriteria Berhasil Diubah');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kri  $kri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kri $kri)
    {
        //
    }
    public function delete($id_kri)
    {
        Kri::where('id_kri', $id_kri)->delete();
        // Pro::destroy($pro->id);
        return redirect('/kris/'.session('per'))->with('status', 'Data Kriteria Berhasil Dihapus');
        //
    }
}
