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
<a href="{{ url('/kris') }}" class="nav-link">
@endsection

@section('sub_fac')
<a href="{{ url('/facs') }}" class="nav-link active">
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

@section('report')
<a href="{{ url('/reports') }}" class="nav-link">
@endsection

@section('daftarkan')
<a href="{{ url('/mahs') }}" class="nav-link">
@endsection

@section('title')
<h1 class="m-0 text-dark">Persentase Faktor Periode {{$nm_per->per}}</h1>
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
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form method="post" action="{{ url('/facs/update') }}">
        @csrf
    @foreach($faktor as $fac)
        <div class="form-group">
            <label for="{{$fac->nm}}">{{$fac->nm_fac}}</label>
            <input type="text" class="form-control @error ($fac->nm) is-invalid @enderror" id="{{$fac->nm}}" placeholder="Masukkan Angka Persentase {{$fac->nm_fac}} (EX : {{$fac->ex}} %)" value="{{$fac->persen}}" name="{{$fac->nm}}">
            @error($fac->nm)
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    @endforeach
        <button type="submit" class="btn btn-primary">Simpan!</button>
        </form>
        </div>
    </div>
</div>
@endsection