<?php

namespace App\Http\Controllers;

use App\Per;
use Illuminate\Http\Request;

class PersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $per=Per::orderBy('id_per', 'desc')->get();
        return view('pers.index', compact('per'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pers.create');
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
        $message = [
            'required' => 'periode harus diisi!',
            'unique' => 'periode sudah ada!'
        ];
        $request->validate([
            'per' => 'required|unique:pers'
        ],$message);

        // Per::create($request->all());
        $per = New \App\Per;
        $per->per = $request->per;
        $per->save();
        $request->request->add(['per'=>$per->id_per]);
        $facs = New \App\fac;
        $facs->nm_fac = 'Core Factor';
        $facs->persen = 60;
        $facs->per = $request->per;
        $facs->save();
        $facs2 = New \App\fac;
        $facs2->nm_fac = 'Secondary Factor';
        $facs2->persen = 40;
        $facs2->per = $request->per;
        $facs2->save();

        return redirect('/pers')->with('status', 'Periode Berhasil Ditambahkan');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Per  $per
     * @return \Illuminate\Http\Response
     */
    public function show(Per $per)
    {
        return view('pers.show', compact('per'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Per  $per
     * @return \Illuminate\Http\Response
     */
    public function edit(Per $per)
    {
        return view('pers.edit', compact('per'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Per  $per
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Per $per)
    {
        $nama = Per::select('per')->where('id_per', $per->id_per)->get();
        
        foreach($nama as $a)
        {
            $a1 = $a->per;
        }
        
        if($request->per!=$a1)
        {
        $message = [
            'required' => 'periode harus diisi!',
            'unique' => 'periode sudah ada!'
        ];
        $request->validate([
            'per' => 'required|unique:pers'
        ],$message);
        }
        Per::where('id_per', $per->id_per)
        ->update([
            'per'=>$request->per
        ]);
        return redirect('/pers')->with('status', 'Periode Berhasil Diubah');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Per  $per
     * @return \Illuminate\Http\Response
     */
    public function destroy(Per $per)
    {
        Per::destroy($per->id_per);
        return redirect('/pers')->with('status', 'Periode Berhasil Dihapus');
        //
    }
}
