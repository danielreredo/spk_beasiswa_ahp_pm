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

@section('sub_per')
<a href="{{ url('/pers') }}" class="nav-link active">
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
<h1 class="m-0 text-dark">Detail Periode</h1>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-7">
        <div class="card">
            <div class="card-body">
                
                <p class="card-text">Periode {{$per->per}}</p>
                

                <a href="{{ url('/pers') }}/{{ $per->id_per }}/edit" class="btn btn-primary mr-2">Edit</a>
                <form action="{{ url('/pers') }}/{{ $per->id_per }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                <button type="submit" class="btn btn-danger mr-2">Delete</button>
                </form>
                <a href="{{ url('/pers') }}" class="card-link">Kembali</a>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection