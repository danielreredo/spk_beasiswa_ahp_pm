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

@section('daftarkan')
<a href="{{ url('/mahs') }}" class="nav-link">
@endsection

@section('title')
<h1 class="m-0 text-dark">Profile Admin</h1>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-7">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Nama : {{$user->nm_ope}}</h5>
                    <p class="card-text"></p>
                    <h5 class="card-title">NIDN : {{$user->nidn}}</h5>
                    <p class="card-text"></p>
                    <h5 class="card-title">Jenis Kelamin : {{$user->jk_ope}}</h5>
                    <p class="card-text"></p>
                    <a href="{{ url('/users') }}/{{auth()->user()->id}}/edit1" class="btn btn-primary mr-2">Edit</a>
                    <a href="{{ url('/') }}" class="card-link">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection