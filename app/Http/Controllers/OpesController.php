<?php

namespace App\Http\Controllers;

use App\Ope;
use App\Pro;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OpesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dnl = DB::table('opes')
        ->join('pros','opes.pro','=','pros.id_pro')
        ->get();
        return view('opes.index', compact('dnl'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pro = Pro::all();
        return view('opes.create', compact('pro'));
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
            'required' => 'harus diisi!',
            'numeric' => ':attribute harus diisi angka!',
            'digits' => ':attribute harus :digits digit!',
            'unique' => 'sudah digunakan!'
        ];
        $request->validate([
            'nm_ope' => 'required',
            'nidn' => 'required|numeric|digits:11|unique:opes',
            'pro' => 'unique:opes'
        ],$message);


        $user = new \App\User;
        $user->role = "operator";
        $user->name = "$request->nm_ope";
        $user->username = "$request->nidn";
        $user->password = bcrypt("operator");
        $user->save();
        
        $request->request->add(['user'=>$user->id]);
        // return $request;
        Ope::create($request->all());
        return redirect('/opes')->with('status', 'Data Kepla Program Studi Berhasil Ditambah');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ope  $ope
     * @return \Illuminate\Http\Response
     */
    public function show(Ope $ope)
    {
        
        $dnl = DB::table('opes')
        ->join('pros','pros.id_pro','=','opes.pro')
        ->where('id_pro', $ope->pro)
        ->get();

        $pro = DB::table('pros')
        ->join('opes', 'pros.id_pro', '=', 'opes.pro')
        ->where('id_pro', $ope->pro)
        ->get();

        // return $dnl;
        return view('opes.show', compact('pro','ope','dnl'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ope  $ope
     * @return \Illuminate\Http\Response
     */
    public function edit(Ope $ope)
    {
        $pro = Pro::all();
        return view('opes.edit', compact('ope', 'pro'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ope  $ope
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ope $ope)
    {
        $nidn = Ope::select('nidn')->where('id_ope', $ope->id_ope)->get();
        $pro = Ope::select('pro')->where('id_ope', $ope->id_ope)->get();

        foreach($nidn as $nid)
        {
            $a = $nid->nidn;
        }

        foreach($pro as $pr)
        {
            $b = $pr->pro;
        }

        if($request->nidn != $a && $request->pro != $b)
        {
            $message = [
                'required' => 'harus diisi!',
                'numeric' => ':attribute harus diisi angka!',
                'digits' => ':attribute harus :digits digit!',
                'unique' => 'sudah digunakan!'
            ];
            $request->validate([
                'nm_ope' => 'required',
                'nidn' => 'required|numeric|digits:11|unique:opes',
                'pro' => 'unique:opes'
            ],$message);
        }
        if($request->nidn != $a)
        {
            $message = [
                'required' => 'harus diisi!',
                'numeric' => ':attribute harus diisi angka!',
                'digits' => ':attribute harus :digits digit!',
                'unique' => 'sudah digunakan!'
            ];
            $request->validate([
                'nm_ope' => 'required',
                'nidn' => 'required|numeric|digits:11|unique:opes',
                // 'pro' => 'unique:opes'
            ],$message);
        }
        if($request->pro != $b)
        {
            $message = [
                'required' => 'harus diisi!',
                'numeric' => ':attribute harus diisi angka!',
                'digits' => ':attribute harus :digits digit!',
                'unique' => 'sudah digunakan!'
            ];
            $request->validate([
                'nm_ope' => 'required',
                // 'nidn' => 'required|numeric|digits:11|unique:opes',
                'pro' => 'unique:opes'
            ],$message);
        }
        
        User::where('username', $ope->nidn)
        ->update([
            'name'=>$request->nm_ope,
            'username'=>$request->nidn
        ]);
        //
        Ope::where('id_ope', $ope->id_ope)
        ->update([
            'nm_ope'=>$request->nm_ope,
            'nidn'=>$request->nidn,
            'jk_ope'=>$request->jk_ope,
            'pro'=>$request->pro
        ]);

        return redirect('/opes')->with('status', 'Data Kepala Prodi Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ope  $ope
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ope $ope)
    {
        User::where('username', $ope->nidn)
        ->delete();
        Ope::destroy($ope->id_ope);
        return redirect('/opes')->with('status', 'Data Fakultas Berhasil Dihapus');
        //
    }
}
