<?php

namespace App\Http\Controllers;

use App\Fak;
use App\Pro;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FaksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faks = Fak::orderBy('nm_fak','asc')->get();
        $id = Pro::all();
        foreach($faks as $f){
            $f['count']=Pro::where('fak',$f['id_fak'])->count('fak');
        }
        

        $dnl = DB::table('pros')
        ->where('fak','$faks->id_fak')
        ->count('fak');

        return view('faks.index', compact('faks', 'dnl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('faks.create');
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
            'required' => 'nama fakultas harus diisi!',
            'unique' => 'nama fakultas sudah ada!'
        ];
        $request->validate([
            'nm_fak' => 'required|unique:faks'
        ],$message);
        

        Fak::create($request->all());

        return redirect('/faks')->with('status', 'Data Fakultas Berhasil Ditambahkan');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fak  $fak
     * @return \Illuminate\Http\Response
     */
    public function show(Fak $fak)
    {
        $dnl = DB::table('pros')
        ->join('faks','pros.fak','=','faks.id_fak')
        ->where('fak', $fak->id_fak)
        ->get();
        
        return view('faks.show', compact('fak','dnl'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fak  $fak
     * @return \Illuminate\Http\Response
     */
    public function edit(Fak $fak)
    {
        return view('faks.edit', compact('fak'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fak  $fak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fak $fak)
    {
        $nama = Fak::select('nm_fak')->where('id_fak', $fak->id_fak)->get();
        
        foreach($nama as $a)
        {
            $a1 = $a->nm_fak;
        }
        
        if($request->nm_fak!=$a1)
        {
        $message = [
            'required' => 'nama fakultas harus diisi!',
            'unique' => 'nama fakultas sudah ada!'
        ];
        $request->validate([
            'nm_fak' => 'required|unique:faks'
        ],$message);
        }
        Fak::where('id_fak', $fak->id_fak)
        ->update([
            'nm_fak'=>$request->nm_fak
        ]);
        return redirect('/faks')->with('status', 'Data Fakultas Berhasil Diubah');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fak  $fak
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fak $fak)
    {
        Fak::destroy($fak->id_fak);
        return redirect('/faks')->with('status', 'Data Fakultas Berhasil Dihapus');
        //
    }
}
