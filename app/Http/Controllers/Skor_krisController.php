<?php

namespace App\Http\Controllers;

use App\Skor_kri;
use App\Mah;
use App\per;
use Illuminate\Http\Request;

class Skor_krisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
     * @param  \App\Skor_kri  $skor_kri
     * @return \Illuminate\Http\Response
     */
    public function show(Skor_kri $skor_kri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Skor_kri  $skor_kri
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Skor_kri $skor_kri)
    {
        $skor = Skor_kri::join('kris', 'skor_kris.kri', '=', 'kris.id_kri')->where('mah', $id)->get();
        $nama = Mah::select('nm_mah')->where('id_mah', $id)->first();
        return view('skor_kris.edit', compact('skor', 'nama', 'id'));
        // return $nama;
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Skor_kri  $skor_kri
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, Skor_kri $skor_kri)
    {
        $skor = Skor_kri::select('id_skor_kri')->where('mah', $id)->get();
        $per=$request->session()->get('id_per');
        // return $per;
        $no = 1;

        foreach($skor as $skr)
        {
            $message = [
                'k'.$no.'.numeric' => 'Skor harus angka!',
                'k'.$no.'.required' => 'Skor wajib diisi!'
            ];
            $request->validate([
                'k'.$no => 'required|numeric'
            ],$message);
            $get=number_format($request->input('k'.$no));
            if($get<1)
            {
                return redirect()->back()->with('error', 'Skor yang anda masukan tidak valid');
            }
            Skor_kri::where([['mah', '=', $id], ['id_skor_kri', '=', $skr->id_skor_kri]])->update([
            'skor'=>$get]);
            $no++;
        }

        $request->session()->forget('id_per');
        return redirect('/mahs/'.$per)->with('status', 'Input Skor Kriteria Berhasil');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Skor_kri  $skor_kri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skor_kri $skor_kri)
    {
        //
    }
}
