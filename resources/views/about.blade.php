@extends('layout/main')

@section('menu1')
<li class="nav-item has-treeview">
            <a href="#" class="nav-link">
@endsection

@section('sub_mhs')
<a href="{{ url('/mahasiswa') }}" class="nav-link">
@endsection

@section('sub_jur')
<a href="{{ url('/jurusan') }}" class="nav-link">
@endsection

@section('sub_std')
<a href="{{ url('/students') }}" class="nav-link">
@endsection

@section('title')
<h1 class="m-0 text-dark">About</h1>
@endsection

@section('content')
<div class="container">
  <h1 class = "mt-3">Hello, {{$nama}}</h1>
</div>
@endsection