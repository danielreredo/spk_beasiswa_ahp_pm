@extends('layout/main')

@section('menu1')
<li class="nav-item has-treeview menu-open">
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

@section('report')
<a href="{{ url('/reports') }}" class="nav-link">
@endsection

@section('daftarkan')
<a href="{{ url('/mahs') }}" class="nav-link active">
@endsection

@section('hasil')
<a href="{{ url('/hasils') }}" class="nav-link">
@endsection

@section('title')
<h1 class="m-0 text-dark">Edit Pendaftar Beasiswa PPA</h1>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-7">
        <form method="post" action="{{ url('/mahs') }}/{{$mah->id_mah}}">
        @method('patch')
        @csrf
        <div class="form-group">
            <label for="nama">Nama Mahasiswa</label>
            <input type="text" class="form-control @error ('nm_mah') is-invalid @enderror" id="nm_mah" placeholder="Masukkan Nama" name="nm_mah" value="{{$mah->nm_mah}}">
            @error('nm_mah')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="nidn">NPM</label>
            <input type="text" class="form-control @error ('npm') is-invalid @enderror" id="npm" placeholder="Masukkan NPM" name="npm" value="{{$mah->npm}}">
            @error('npm')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="jk_mah">Jenis Kelamin</label>
            <select class="custom-select" id="jk_mah" name="jk_mah">
            <!-- <option selected disabled='true'>-- Jurusan --</option> -->
            @if($mah->jk_mah === 'Laki-laki')
            <option value="Laki-laki" selected>Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
            @endif
            @if($mah->jk_mah === 'Perempuan')
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan" selected>Perempuan</option>
            @endif
            </select>
        </div>
        

        <button type="submit" class="btn btn-primary">Simpan Data!</button>
        </form>
        </div>
    </div>
</div>
@endsection