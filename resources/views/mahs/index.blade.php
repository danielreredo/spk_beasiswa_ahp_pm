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
<h1 class="m-0 text-dark">Periode Beasiswa PPA</h1>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-7">

    <ul class="list-group">
        @foreach($per as $periode)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Periode {{ $periode->per }}
        <a href="{{ url('/mahs') }}/{{ $periode->id_per }}" class="badge badge-success">Detail</a>
        </li>
        @endforeach
    </ul>

        </div>
    </div>

</div>
@endsection