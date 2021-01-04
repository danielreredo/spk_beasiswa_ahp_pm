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

@section('title')
<h1 class="m-0 text-dark">Data Fakultas</h1>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-7">
        <a href="{{ url('/faks/create') }}" class="btn btn-primary mb-3">Tambah Data Fakultas</a>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

<ul class="list-group">
@foreach($faks as $fak)
  <li class="list-group-item d-flex justify-content-between align-items-center">
    {{ $fak->nm_fak }}
    <a href="{{ url('/faks') }}/{{ $fak->id_fak }}" class="badge badge-info">Show</a>
  </li>
  @endforeach
</ul>

<!-- Main content -->
<section class="content">
    <div class="container">
      <div class="row">
        <div class="col-7">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">List Prodi</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Prodi</th>
                  <th>Fakultas</th>
                  <th width="60px">Action</th>
                </tr>
                </thead>
                <tbody>
                
                <tr>
                  <td></td>
                  <td></td>
                  <td>
                  
                    <a href="" class="badge badge-info">Edit</a>
                    <a href="" class="badge badge-danger">Delete</a>
                  
                  </td>
                </tr>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Prodi</th>
                  <th>Fakultas</th>
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
    </div>
</div>
@endsection