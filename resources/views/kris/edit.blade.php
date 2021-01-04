@extends('layout/main')

@section('menu1')
<li class="nav-item has-treeview menu-open">
<a href="#" class="nav-link active">
@endsection

@section('sub_fak')
<a href="{{ url('/faks') }}" class="nav-link">
@endsection

@section('sub_pro')
<a href="{{ url('/pros') }}" class="nav-link">
@endsection

@section('sub_kri')
<a href="{{ url('/kris') }}" class="nav-link active">
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

@section('title')
<h1 class="m-0 text-dark">Edit Data Kriteria</h1>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-7">
        <form method="post" action="{{ url('/kris') }}/{{$kri->id_kri}}">
        @method('patch')
        @csrf
        <div class="form-group">
            <label for="nama">Nama Kriteria</label>
            <input type="text" class="form-control @error ('nm_kri') is-invalid @enderror" id="nm_kri" placeholder="Masukkan Nama" name="nm_kri" value="{{ $kri->nm_kri }}">
            @error('nm_kri')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="fac">Faktor</label>
            <select class="custom-select" id="fac" name="fac">
            @foreach($fac as $faktor)
            <option value="{{$faktor->id_fac}}"{{$kri->fac===$faktor->id_fac?' selected':''}}>{{$faktor->nm_fac}}</option>
            @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Ubah Data!</button>
        </form>
        </div>
    </div>
</div>
@endsection