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
<a href="{{ url('/pers') }}" class="nav-link">
@endsection

@section('sub_kep')
<a href="{{ url('/kets') }}" class="nav-link active">
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
<h1 class="m-0 text-dark">Tentukan Kepentingan Kriteria</h1>
@endsection

@section('content')
<div class="container">
<form method="post" action="{{ url('/kets/update') }}">
    @csrf
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{$status}}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <div class="row">
    <table class="table table-striped table-hover table-bordered">
	<thead>
		<tr align=center>
			<th>Nama Kriteria</th>
			<th>Nilai Perbandingan</th>
			<th>Nama Kriteria</th>
			<th>Aksi</th>
			
		</tr>
	</thead>
	<tbody>
    @foreach($kets as $ket)
    <tr align=center>
                  <td>{{$ket->krit1->nm_kri}}</td>
                  <td>
                  <select class="custom-select" id="ket" name="ket{{$ket->k1}}m{{$ket->k2}}">
                    @foreach($k as $ke)
                    <option value="{{$ke->nm_kep}}"{{$ket->kep===$ke->nm_kep?' selected':''}}>
                    {{$ke->nm_kep}}</option>
                    @endforeach
                  </select>
                  </td>
                  <td>{{$ket->krit2->nm_kri}}</td>
                  
                  <td align=center>
                  <a href="{{ url('/kets/'.$ket->k1.'/'.$ket->k2) }}" class="badge badge-success">Swipe</a>
                  </td>
                  </td>
    </tr>
    @endforeach
	</tbody>
</table>
    </div>
    </div>

    <div class="card-footer">
    <button type="submit" class="btn btn-primary">Simpan Perbandingan</button>
    </div>

    </div>
    </form>
</div>

<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><b><u>KETERANGAN</u></b></h5>
                    <p class="card-text"></p>
                    <?php
                    $no = 1;
                    ?>
                    @foreach($kris as $kri)
                    <h5 class="card-title"><b>K-{{$no}}</b> : {{$kri->nm_kri}}</h5><br>
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
        <h3 class="card-title"><b>Perbandingan Kriteria</b></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <div class="row">
    <table class="table table-striped table-hover table-bordered">
    <tr>
    <td><b>Kriteria</b></td>
    @foreach($kris as $k)
    <td><b>{{$k->no}}</b></td>
    @endforeach
    <td><b>Eigen Value</b></td>
    <td><b>Bobot Prioritas</b></td>
    </tr>

	@for ($i = 0; $i < count($matriks); $i++)
    <tr>
    <td><b>K-{{$i+1}}</b></td>
    @foreach($matriks[$i] as $kolom)
    <td>{{number_format($kolom, 3)}}</td>
    @endforeach
    <td>{{number_format($ev[$i],3)}}</td>
    <td>{{number_format($bp[$i],3)}}</td>
    </tr>
    @endfor
    <tr>
    <td><b>Jumlah</b></td>
    @foreach($jumlah as $j)
    <td>{{number_format($j, 3)}}</td>
    @endforeach
    </tr>
    </table>
    </div>
    </div>
    </div>
</div>

<div class="container">
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><b>Normalisasi Kriteria</b></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <div class="row">
    <table class="table table-striped table-hover table-bordered">
    <tr>
    <td><b>Kriteria</b></td>
    @foreach($kris as $k)
    <td><b>{{$k->no}}</b></td>
    @endforeach
    <td><b>Bobot Sintesa</b></td>
    <td><b>Eigen Maks(x)</b></td>
    </tr>
	@for ($i = 0; $i < count($normal); $i++)
    <tr>
    <td><b>K-{{$i+1}}</b></td>
    @foreach($normal[$i] as $kolom)
    <td>{{number_format($kolom, 3)}}</td>
    @endforeach
    <td>{{number_format($bs[$i],3)}}</td>
    <td>{{number_format($em[$i],3)}}</td>
    </tr>
    @endfor
    </table>
    </div>
    <b>Sum EM</b> : {{$hasil['sumem']}}<br>
    <b>Lambda</b> : {{$hasil['lambda']}}<br>
    <b>CI</b> : {{$hasil['ci']}}<br>
    <b>CR</b> : {{$hasil['cr']}}<br>
    <b>IR</b> : {{$hasil['ir']}}
    </div>
    </div>
</div>

@endsection