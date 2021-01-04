<?php

namespace App\Http\Controllers;

use App\Fac;
use App\Per;
use Illuminate\Http\Request;

class FacsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $per = Per::orderBy('id_per', 'desc')->get();
        return view('facs.in', compact('per'));
        //
    }

    public function in($per)
    {
        session()->put('per', $per);
        $nm_per = Per::where('id_per', session('per'))->first();
        $faktor = Fac::where('per', session('per'))->get();
        $faktor[0]->nm='cf';
        $faktor[1]->nm='sf';
        $faktor[0]->ex='60';
        $faktor[1]->ex='40';
        return view('facs.index', compact('faktor', 'nm_per'));
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
        $per = session('per');
        $message = [
            'cf.required' => 'Persentase core factor harus diisi!',
            'cf.numeric' => 'Persentase core factor harus angka!',
            'sf.required' => 'Persentase secondary factor harus diisi!',
            'sf.numeric' => 'Persentase secondary factor harus angka!',
        ];
        $request->validate([
            'cf' => 'required|numeric',
            'sf' => 'required|numeric',
        ],$message);
        $tot=$request->cf+$request->sf;
        // return $tot;
        if($tot===100){
            Fac::whereRaw('nm_fac=? and per=?',['Core Factor',$per])
        ->update([
            'persen'=>$request->cf
            ]);
        Fac::whereRaw('nm_fac=? and per=?',['Secondary Factor',$per])
        ->update([
            'persen'=>$request->sf
            ]);
            return redirect('facs')->with('status', 'Persentase Berhasil Disimpan');
        } 
        else{
            return back()->with('error', 'Persentase Yang Dimasukan Tidak Falid!');
        }
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fac  $fac
     * @return \Illuminate\Http\Response
     */
    public function show(Fac $fac)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fac  $fac
     * @return \Illuminate\Http\Response
     */
    public function edit(Fac $fac)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fac  $fac
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fac $fac)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fac  $fac
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fac $fac)
    {
        //
    }
}
