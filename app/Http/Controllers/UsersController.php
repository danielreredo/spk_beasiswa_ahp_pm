<?php

namespace App\Http\Controllers;

use App\User;
use App\Ope;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class UsersController extends Controller
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id, User $user)
    {
        $user = User::where('id', $id)->first();
        return view('users.show', compact('user'));
        //
    }
    public function show1($id, User $user)
    {
        $user = User::join('opes', 'users.id', 'opes.user')->where('id', Auth::user()->id)->first();
        return view('users.show1', compact('user'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id ,User $user)
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('users.edit', compact('user'));
        //
    }
    
    public function edit1($id ,User $user)
    {
        $user = User::join('opes', 'users.id', 'opes.user')->where('id', Auth::user()->id)->first();
        return view('users.edit1', compact('user'));
        //
    }

    public function edit_pass($id ,User $user)
    {
        return view('users.edit_pass');
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, User $user)
    {
        if(Hash::check($request->pass, Auth::user()->password))
        {
            if($request->name != Auth::user()->name && $request->username != Auth::user()->username)
            {   
                $message = [
                    'name.required' => 'nama harus diisi!',
                    'username.required' => 'username harus diisi!',
                    'username.unique' => 'username sudah digunakan!',
                ];
                $request->validate([
                    'name' => 'required',
                    'username' => 'required|unique:users'
                ],$message);
            }
            if($request->username != Auth::user()->username)
            {   
                $message = [
                    // 'name.required' => 'nama harus diisi!',
                    'username.required' => 'username harus diisi!',
                    'username.unique' => 'username sudah digunakan!',
                ];
                $request->validate([
                    // 'name' => 'required',
                    'username' => 'required|unique:users'
                ],$message);
            }
            if($request->name != Auth::user()->name)
            {   
                $message = [
                    'name.required' => 'nama harus diisi!',
                    // 'username.required' => 'username harus diisi!',
                    // 'username.unique' => 'username sudah digunakan!',
                ];
                $request->validate([
                    'name' => 'required',
                    // 'username' => 'required|unique:users'
                ],$message);
            }
        }

        else
        {
            return redirect()->back()->with('error', 'Password yang dimasukan tidak sesuai!');
        }

        User::where('id', Auth::user()->id)
        ->update([
            'name'=>$request->name,
            'username'=>$request->username
        ]);

        return redirect('/users/'.auth()->user()->id.'/show')->with('status', 'Data Berhasil Diubah');
        //
    }

    public function update1($id, Request $request, User $user)
    {
        if(Hash::check($request->pass, Auth::user()->password))
        {
            if($request->name != Auth::user()->name && $request->username != Auth::user()->username)
            {   
                $message = [
                    'name.required' => 'nama harus diisi!',
                    'username.required' => 'nidn harus diisi!',
                    'username.unique' => 'nidn sudah digunakan!',
                    'username.digits' => 'nidn harus :digits digit!',
                ];
                $request->validate([
                    'name' => 'required',
                    'username' => 'required|unique:users|digits:11'
                ],$message);
            }
            if($request->username != Auth::user()->username)
            {   
                $message = [
                    // 'name.required' => 'nama harus diisi!',
                    'username.required' => 'nidn harus diisi!',
                    'username.unique' => 'nidn sudah digunakan!',
                    'username.digits' => 'nidn harus :digits digit!',
                ];
                $request->validate([
                    // 'name' => 'required',
                    'username' => 'required|unique:users|digits:11'
                ],$message);
            }
            if($request->name != Auth::user()->name)
            {   
                $message = [
                    'name.required' => 'nama harus diisi!',
                    // 'username.required' => 'nidn harus diisi!',
                    // 'username.unique' => 'nidn sudah digunakan!',
                    // 'username.digits' => 'nidn harus :digits digit!',
                ];
                $request->validate([
                    'name' => 'required',
                    // 'username' => 'required|unique:users|digits:11'
                ],$message);
            }
        }
        
        else
        {
            return redirect()->back()->with('error', 'Password yang dimasukan tidak sesuai!');
        }

        // return $request;
        User::where('id', Auth::user()->id)
        ->update([
            'name'=>$request->name,
            'username'=>$request->username
        ]);
        Ope::where('user', Auth::user()->id)
        ->update([
            'nm_ope'=>$request->name,
            'nidn'=>$request->username,
            'jk_ope'=>$request->jk_ope
        ]);

        return redirect('/users/'.auth()->user()->id.'/show1')->with('status', 'Data Berhasil Diubah');
        //
    }
    public function ubah_pass($id, Request $request, User $user)
    {
        if(Hash::check($request->pass, Auth::user()->password))
        {   
                $message = [
                    'passb.required' => 'Password baru harus diisi!',
                    'passb.min' => 'Password baru minimal :min karakter!',
                ];
                $request->validate([
                    'passb' => 'required|min:5',
                ],$message);
        }

        else
        {
            return redirect()->back()->with('error', 'Password yang dimasukan tidak sesuai!');
        }

        User::where('id', Auth::user()->id)
        ->update([
            'password'=>bcrypt("$request->passb")
        ]);

        if(Auth::user()->role == "admin")
        {
            return redirect('/users/'.auth()->user()->id.'/show')->with('status', 'Password Berhasil Diubah');
        }
        else if(Auth::user()->role == "operator")
        {
            return redirect('/users/'.auth()->user()->id.'/show1')->with('status', 'Password Berhasil Diubah');
        }
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function rp(User $user)
    {
        User::where('id', $user->id)
        ->update([
            'password'=>bcrypt("operator")
        ]);
        return redirect()->back()->with('status', 'Password berhasil direset!');   
        //
    }
}
