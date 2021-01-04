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
<h1 class="m-0 text-dark">Input Skor Kriteria {{$nama->nm_mah}}</h1>
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
        <form method="post" action="{{ url('/skor_kris') }}/{{$id}}">
        @method('patch')
        @csrf
        <?php
        $no = 1;
        ?>
        @foreach($skor as $skr)
        <div class="form-group">
            <label for="nama">K-{{$no}} Kriteria {{$skr->nm_kri}}</label>
            <input type="text" class="form-control @error ('k'.$no) is-invalid @enderror" id="nm_mah" placeholder="Skor Kriteria" name="k{{$no}}" value="{{$skr->skor}}">
            @error('k'.$no)
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <?php
        $no++;
        ?>
        @endforeach
        <button type="submit" class="btn btn-primary">Simpan Data!</button>
        </form>
        </div>
    </div>
</div>
@endsection