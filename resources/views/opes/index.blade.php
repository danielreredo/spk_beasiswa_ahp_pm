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
<h1 class="m-0 text-dark">Data Kepala Program Studi</h1>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-7">
        <a href="{{ url('/opes/create') }}" class="btn btn-primary mb-3">Tambah Data Kepala Prodi</a>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        </div>
    </div>

<!-- Main content -->
<section class="content">
    <div class="container">
      <div class="row">
        <div class="col-7">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">List Kepala Program Studi</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="220px">Nama</th>
                  <th width="220px">Program Studi</th>
                  <th width="60px">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($dnl as $daniel)
                
                <tr>
                  <td>{{$daniel->nm_ope}}</td>
                  <td>{{$daniel->nm_pro}}</td>                  
                  <td align=center>
                  
                    <a href="{{ url('/opes') }}/{{ $daniel->id_ope }}" class="badge badge-success">Show</a>
                  
                  </td>
                </tr>
              
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  
                  <th width="220px">Fakultas</th>
                  <th width="220px">Jumlah Prodi</th>
                  <th width="60px">Action</th>
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

</div>
@endsection