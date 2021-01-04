@extends('layout/main')

@section('menu1')
<li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
@endsection

@section('sub_fak')
<a href="{{ url('/faks') }}" class="nav-link active">
@endsection

@section('sub_pro')
<a href="{{ url('/pros') }}" class="nav-link">
@endsection

@section('sub_kri')
<a href="{{ url('/kris') }}" class="nav-link">
@endsection

@section('title')
<h1 class="m-0 text-dark">Tambah Data Fakultas</h1>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-7">
        <form method="post" action="{{ url('/faks') }}">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Fakultas</label>
            <input type="text" class="form-control @error ('nm_fak') is-invalid @enderror" id="nm_fak" placeholder="Masukkan Nama" name="nm_fak" value="{{old('nm_fak')}}">
            @error('nm_fak')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Tambah Data!</button>
        </form>
        </div>
    </div>
</div>
@endsection