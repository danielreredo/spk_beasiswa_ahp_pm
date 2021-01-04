@extends('layout/main')

@section('menu1')
<li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link">
@endsection

@section('sub_fak')
<a href="{{ url('/faks') }}" class="nav-link">
@endsection

@section('sub_pro')
<a href="{{ url('/pros') }}" class="nav-link">
@endsection

@section('sub_kri')
<a href="{{ url('/kris') }}" class="nav-link">
@endsection

@section('sub_per')
<a href="{{ url('/pers') }}" class="nav-link">
@endsection

@section('sub_kep')
<a href="{{ url('/kets') }}" class="nav-link">
@endsection

@section('operator')
<a href="{{ url('/opes') }}" class="nav-link">
@endsection

@section('sub_fac')
<a href="{{ url('/facs') }}" class="nav-link">
@endsection

@section('hasil')
<a href="{{ url('/hasils') }}" class="nav-link">
@endsection

@section('report')
<a href="{{ url('/reports') }}" class="nav-link">
@endsection

@section('title')
<h1 class="m-0 text-dark">Edit Profile Admin</h1>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-7">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form method="post" action="{{ url('/users') }}/Auth::user()->id">
        @method('patch')
        @csrf
        <div class="form-group">
            <label for="nama">Nama Admin</label>
            <input type="text" class="form-control @error ('name') is-invalid @enderror" id="name" placeholder="Masukkan Nama Admin" name="name" value="{{ $user->name }}">
            @error('name')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="nama">Username</label>
            <input type="text" class="form-control @error ('username') is-invalid @enderror" id="username" placeholder="Masukkan Username" name="username" value="{{ $user->username }}">
            @error('username')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="nama">Password</label>
            <input type="password" class="form-control @error ('pass') is-invalid @enderror" id="pass" placeholder="Masukkan Password" name="pass" >
            @error('pass')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Ubah Data!</button>
        <p></p>
        <a href="{{ url('/users') }}/{{auth()->user()->id}}/edit_pass">Ubah Password</a>
        </form>
        </div>
    </div>
</div>
@endsection