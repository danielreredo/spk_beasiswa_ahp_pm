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
@if(auth()->user()->role == 'admin')
<a href="{{ url('/reports') }}" class="nav-link active">
@endif
@if(auth()->user()->role == 'operator')
<a href="{{ url('/reports') }}" class="nav-link">
@endif
@endsection

@section('daftarkan')
@if(auth()->user()->role == 'operator')
<a href="{{ url('/mahs') }}" class="nav-link active">
@endif
@if(auth()->user()->role == 'admin')
<a href="{{ url('/mahs') }}" class="nav-link">
@endif
@endsection

@section('hasil')
<a href="{{ url('/hasils') }}" class="nav-link">
@endsection

@section('title')
<h1 class="m-0 text-dark">Detail Pendaftar Beasiswa PPA</h1>
@endsection

@section('content')
<div class="container">
    <!-- <div class="row">
        <div class="col-7">
        <div class="card">
            <div class="card-body">
                <p class="card-text">Nama : {{$mah->nm_mah}}</p>
                <p class="card-text">NPM : {{$mah->npm}}</p>
                <p class="card-text">Jenis Kelamin : {{$mah->jk_mah}}</p>
                <p class="card-text">Prodi : {{$mah->nm_pro}}</p>
                <p class="card-text">Periode : {{$p->per}}</p>
                @if(auth()->user()->role == 'operator')
                <a href="{{ url('/mahs') }}/{{ $mah->id_mah }}/edit" class="btn btn-primary mr-2">Edit</a>
                <form action="" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                <button type="submit" class="btn btn-danger mr-2">Delete</button>
                </form>
                <a href="{{ url('/mahs')}}/{{$p->id_per}}" class="card-link">Kembali</a>
                @endif
            </div>
            </div>
        </div>
    </div> -->

    <div class="row row-cols-1 row-cols-md-2">
  <div class="col mb-7">
    <div class="card">
      <div class="card-body">
      <p class="card-text"><b>Nama</b> : {{$mah->nm_mah}}</p>
        <p class="card-text"><b>NPM</b> : {{$mah->npm}}</p>
        <p class="card-text"><b>Jenis Kelamin</b> : {{$mah->jk_mah}}</p>
        <p class="card-text"><b>Prodi</b> : {{$mah->nm_pro}}</p>
        <p class="card-text"><b>Periode</b> : {{$p->per}}</p>
        @if(auth()->user()->role == 'operator')
        <a href="{{ url('/mahs') }}/{{ $mah->id_mah }}/edit" class="btn btn-primary mr-2">Edit</a>
        <form action="" method="post" class="d-inline">
            @method('delete')
            @csrf
        <button type="submit" class="btn btn-danger mr-2">Delete</button>
        </form>
        <a href="{{ url('/mahs')}}/{{$p->id_per}}" class="card-link">Kembali</a>
        @endif
      </div>
    </div>
  </div>
  <div class="col mb-7">
    <div class="card">
      <div class="card-body">
      <u><b><p class="card-text">KETERANGAN</p></b></u>
      <br>
      <?php
        $no = 1;
      ?>
      @foreach($kris as $kr)
        <p class="card-text"><b>K-{{$no}}</b> : {{$kr->nm_kri}}</p>
        <?php
        $no++;
        ?>
      @endforeach
      </div>
    </div>
  </div>
</div>

</div>


<div class="container">
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><b>Pembobotan Kriteria</b></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <div class="row">
    <table class="table table-striped table-hover table-bordered">
    <tr>
    <td width = '20px'><b>Kriteria</b></td>
    <td><b>Bobot Kriteria AHP</b></td>
    <td><b>Skor Kriteria</b></td>
    <td><b>Bobot Kriteria Final</b></td>
    </tr>
    @for ($i = 0; $i < count($matriks); $i++)
    <tr>
    <td><b>K-{{$i+1}}</b></td>
    <td>{{number_format($bp[$i],3)}}</td>
    <td>{{number_format($skri[$i],1)}}</td>
    <td>{{number_format($bkxn[$i],3)}}</td>
    </tr>
    @endfor
    </table>
    <table class="table table-striped table-hover table-bordered">
    <tr>
    @for($i=1;$i<=count($bkxn);$i++)
    <td><b>K-{{$i}}</b></td>
    @endfor
    </tr>
    <tr>
    @foreach($bkxn as $bks)
    <td>{{number_format($bks,3)}}</td>
    @endforeach
    </tr>
    </table>
    <p><b>Faktor Utama</b></p>
    <table class="table table-striped table-hover table-bordered">
    <tr>
    @foreach($hasil['gcf'] as $h)
    <td>K-{{$h+1}}</td>
    @endforeach
    </tr>
    </table>
    <p><b>Faktor Pendukung</b></p>
    <table class="table table-striped table-hover table-bordered">
    <tr>
    @foreach($hasil['gsf'] as $h)
    <td>K-{{$h+1}}</td>
    @endforeach
    </tr>
    </table>
    </div>
    <u><b>Persentase Faktor</b></u><br>
    Faktor Utama = {{$hasil['facs'][0]->persen}} %<br>
    Faktor Pendukung = {{$hasil['facs'][1]->persen}} %<br><br>
    <u><b>Hasil Hitung</b></u><br>
    Total Faktor Utama = {{$hasil['t.cf']}}<br>
    Total Faktor Pendukung = {{$hasil['t.sf']}}<br>
    Hasil Akhir = {{$hasil['r']}}<br>
    </div>
    </div>
</div>
@endsection