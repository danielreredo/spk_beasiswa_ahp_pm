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
<h1 class="m-0 text-dark">Detail Data Kepala Prodi</h1>
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
                    @foreach($dnl as $daniel)
                    <h5 class="card-title">Program Studi : {{$daniel->nm_pro}}</h5>
                    <p class="card-text"></p>
                    <h5 class="card-title">Nama Kepala Prodi : {{$ope->nm_ope}}</h5>
                    <p class="card-text"></p>
                    <h5 class="card-title">NIDN : {{$ope->nidn}}</h5>
                    <p class="card-text"></p>
                    @endforeach
                    <a href="{{ url('/opes') }}/{{ $ope->id_ope }}/edit" class="btn btn-primary mr-2">Edit</a>
                    <a href="{{ url('/users') }}/{{ $ope->user }}/rp" class="btn btn-warning mr-2">Reset Password</a>
                <form action="{{ url('/opes') }}/{{ $ope->id_ope }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger mr-2">Delete</button>
                </form>
                    <a href="{{ url('/opes') }}" class="card-link">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection