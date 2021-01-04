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
<h1 class="m-0 text-dark">Data Pendaftar Beasiswa PPA</h1>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-7">
        <a href="{{ url('/mahs/create') }}" class="btn btn-primary mb-3">Tambah Pendaftar Beasiswa PPA</a>
        
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
              <h3 class="card-title">List Pendaftar Prodi {{$pr->nm_pro}}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="180px">Nama Mahasiswa</th>
                  <th width="180px">NPM</th>
                  <th width="80px">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($mah as $mahasiswa)
                <tr>
                  <td>{{$mahasiswa->nm_mah}}</td>
                  <td>{{$mahasiswa->npm}}</td>
                  <td>
                    <a href="{{ url('/mahs') }}/{{ $mahasiswa->id_mah }}/shw" class="badge badge-success">Show</a>
                    <a href="{{ url('/skor_kris') }}/{{ $mahasiswa->id_mah }}/edit" class="badge badge-warning">Nilai</a>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th width="180px">Nama Mahasiswa</th>
                  <th width="180px">NPM</th>
                  <th width="80px">Action</th>
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