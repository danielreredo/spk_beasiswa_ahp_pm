@extends('layout/main')

@section('menu1')
<li class="nav-item has-treeview">
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
<a href="{{ url('/opes') }}" class="nav-link active">
@endsection

@section('sub_fac')
<a href="{{ url('/facs') }}" class="nav-link">
@endsection

@section('report')
<a href="{{ url('/reports') }}" class="nav-link">
@endsection

@section('title')
<h1 class="m-0 text-dark">Tambah Data Kepala Program Studi</h1>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-7">
        <form method="post" action="{{ url('/opes') }}">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Kepala Program Studi</label>
            <input type="text" class="form-control @error ('nm_ope') is-invalid @enderror" id="nm_ope" placeholder="Masukkan Nama" name="nm_ope" value="{{old('nm_ope')}}">
            @error('nm_ope')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="nidn">NIDN</label>
            <input type="text" class="form-control @error ('nidn') is-invalid @enderror" id="nidn" placeholder="Masukkan NIDN" name="nidn" value="{{old('nidn')}}">
            @error('nidn')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="jk_ope">Jenis Kelamin</label>
            <select class="custom-select" id="jk_ope" name="jk_ope">
            <!-- <option selected disabled='true'>-- Jurusan --</option> -->
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="pro">Program Studi</label>
            <select class="custom-select form-control @error ('pro') is-invalid @enderror" id="pro" name="pro">
            <!-- <option selected disabled='true'>-- Jurusan --</option> -->
            @foreach($pro as $prodi)
            <option value="{{$prodi->id_pro}}">{{$prodi->nm_pro}}</option>
            @endforeach
            </select>

            @error('pro')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Tambah Data!</button>
        </form>
        </div>
    </div>
</div>
@endsection