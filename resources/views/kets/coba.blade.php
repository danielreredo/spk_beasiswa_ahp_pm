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

@section('title')
<h1 class="m-0 text-dark">Tentukan Kepentingan Kriteria</h1>
@endsection

@section('content')
<div class="container">
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Perbandingan Kriteria</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <div class="row">
    <table class="table table-striped table-hover table-bordered">
	<thead>
		<tr align=center>
			<th>No</th>
			
		</tr>
	</thead>
	<tbody>
    
    <tr align=center>
                  <td>angka</td>
    </tr>
	</tbody>
</table>
    </div>
    </div>
    </div>
</div>
@endsection