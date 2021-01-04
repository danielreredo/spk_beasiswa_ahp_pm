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
    <div class="row">
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
    </div>
</div>


<div class="container">
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Pembobotan Kriteria</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <div class="row">
    <table class="table table-striped table-hover table-bordered">
    <tr>
    <td><b>Kriteria</b></td>
    @for ($i = 1; $i <= count($matriks); $i++)
    <td>K-{{$i}}</td>
    @endfor
    <td>Bobot Kriteria</td>
    </tr>
    @for ($i = 0; $i < count($matriks); $i++)
    <tr>
    <td>K-{{$i+1}}</td>
    @foreach($matriks[$i] as $kolom)
    <td>{{number_format($kolom, 3)}}</td>
    @endforeach
    <td>{{number_format($bk[$i],3)}}</td>
    </tr>
    @endfor
    </table>
    <table class="table table-striped table-hover table-bordered">
    <tr>
    @for($i=1;$i<=count($bk);$i++)
    <td><b>K-{{$i}}</b></td>
    @endfor
    </tr>
    <tr>
    @foreach($bk as $bks)
    <td>{{number_format($bks,3)}}</td>
    @endforeach
    </tr>
    </table>
    Core Factor
    <table class="table table-striped table-hover table-bordered">
    <tr>
    @foreach($hasil['gcf'] as $h)
    <td>K-{{$h+1}}</td>
    @endforeach
    </tr>
    </table>
    Second Factor
    <table class="table table-striped table-hover table-bordered">
    <tr>
    @foreach($hasil['gsf'] as $h)
    <td>K-{{$h+1}}</td>
    @endforeach
    </tr>
    </table>
    CF = {{$hasil['facs'][0]->persen}} %<br>
    SF = {{$hasil['facs'][1]->persen}} %<br>
    T.CF = {{$hasil['t.cf']}}<br>
    T.SF = {{$hasil['t.sf']}}<br>
    HASIL = {{$hasil['r']}}<br>
    </div>
    </div>
    </div>
</div>
@endsection