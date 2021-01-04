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
<a href="{{ url('/opes') }}" class="nav-link">
@endsection

@section('sub_fac')
<a href="{{ url('/facs') }}" class="nav-link">
@endsection

@section('report')
<a href="{{ url('/reports') }}" class="nav-link active">
@endsection

@section('daftarkan')
<a href="{{ url('/mahs') }}" class="nav-link">
@endsection

@section('hasil')
<a href="{{ url('/hasils') }}" class="nav-link">
@endsection

@section('title')
<h1 class="m-0 text-dark">Hasil Seleksi Beasiswa PPA Periode {{$per->per}} Seluruh Prodi</h1>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-7">
        </div>
    </div>

    <!-- Main content -->
<section class="content">
    <div class="container">
      <div class="row">
        <div class="col-7">
        @foreach($pro as $prod)
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">List Hasil Seleksi Pendaftar Beasiswa PPA Prodi {{$prod->nm_pro}}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                <tr>
                  <th width="180px">Nama Mahasiswa</th>
                  <th width="180px">NPM</th>
                  <th width="80px">Skor</th>
                  <th width="80px">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($prod->mahs as $mahasiswa)
                <tr>
                  <td>{{$mahasiswa->nm_mah}}</td>
                  <td>{{$mahasiswa->npm}}</td>
                  <td>{{$mahasiswa->skor}}</td>
                  <td>
                  <a href="{{ url('/mahs') }}/{{ $mahasiswa->id_mah }}/shw" class="badge badge-success">Show</a>
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          @endforeach
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