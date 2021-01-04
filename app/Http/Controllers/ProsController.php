<?php

namespace App\Http\Controllers;

use App\Pro;
use App\Fak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pros = Pro::orderBy('nm_pro', 'asc')
        // ->get();

        $dnl = DB::table('pros')->join('faks','pros.fak','=','faks.id_fak')->get();
        // return view('students/show', compact('student','dnl'));

        return view('pros.index', compact('dnl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fak = Fak::all();
        return view('pros.create', compact('fak'));
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
            'required' => 'nama prodi harus diisi!',
            'unique' => 'nama prodi sudah ada!'
        ];
        $request->validate([
            'nm_pro' => 'required|unique:pros'
        ],$message);

        Pro::create($request->all());
        return redirect('/pros')->with('status', 'Data Prodi Berhasil Ditambahkan');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pro  $pro
     * @return \Illuminate\Http\Response
     */
    public function show(Pro $pro)
    {
        return view('pros.show', compact('pro'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pro  $pro
     * @return \Illuminate\Http\Response
     */
    public function edit(Pro $pro)
    {
        $fak = Fak::all();
        return view('pros.edit', compact('pro', 'fak'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pro  $pro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pro $pro)
    {
        $nama = Pro::select('nm_pro')->where('id_pro', $pro->id_pro)->get();
        
        foreach($nama as $a)
        {
            $a1 = $a->nm_pro;
        }
        
        if($request->nm_pro!=$a1)
        {
        $message = [
            'required' => 'nama prodi harus diisi!',
            'unique' => 'nama prodi sudah ada!'
        ];
        $request->validate([
            'nm_pro' => 'required|unique:pros'
        ],$message);
        }
        Pro::where('id_pro', $pro->id_pro)
        ->update([
            'nm_pro'=>$request->nm_pro,
            'fak'=>$request->fak
        ]);
        return redirect('/pros')->with('status', 'Data Prodi Berhasil Diubah');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pro  $pro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pro $pro)
    {
        return $pro->id_pro;
        // Pro::destroy($pro->id);
        // return redirect('/pros')->with('status', 'Data Prodi Berhasil Dihapus');
        //
    }
    public function delete($id_pro)
    {
        Pro::where('id_pro', $id_pro)->delete();
        // Pro::destroy($pro->id);
        return redirect('/pros')->with('status', 'Data Prodi Berhasil Dihapus');
        //
    }
}
