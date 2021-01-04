@extends('layout/main')

@section('menu1')
<li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
@endsection

@section('sub_fak')
<a href="{{ url('/faks') }}" class="nav-link active">
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

@section('title')
<h1 class="m-0 text-dark">Detail Data Fakultas</h1>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-7">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Fakultas {{$fak->nm_fak}}</h5>
                    <p class="card-text"></p>
                    <a href="{{ url('/faks') }}/{{ $fak->id_fak }}/edit" class="btn btn-primary mr-2">Edit</a>
                <form action="{{ url('/faks') }}/{{ $fak->id_fak }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger mr-2">Delete</button>
                </form>
                    <a href="{{ url('/faks') }}" class="card-link">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="container">
      <div class="row">
        <div class="col-7">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Prodi Fakultas {{ $fak->nm_fak }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="220px">Program Studi</th>
                  <th width="220px">Fakultas</th>
                </tr>
                </thead>
                <tbody>
                @foreach($dnl as $daniel)
                <tr>
                  <td>{{$daniel->nm_pro}}</td>
                  <td>{{$daniel->nm_fak}}</td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th width="220px">Prodi</th>
                  <th width="220px">Fakultas</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
</section>
    <!-- /.content -->

@endsection