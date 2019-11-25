@extends('landing.app.app-land')

@section('title')
<title>Alam Kita | Petualangan</title>
@endsection

@section('style')
<style type="text/css">
	main, footer {
		padding-left: 300px;
	}
</style>
@endsection

@section('style2')
z-index: 1001; border-bottom: 1px solid #e0e0e0;
@endsection

@section('content')



@include('user.app.app-user')

<main>

	<div class="row ak-bread-con valign-wrapper">
		<div class="col s8">
			<nav class="ak-bread">
				<div class="nav-wrapper">
					<div class="col s12" style="padding-left: 30px;">

						<a href="{{-- {{route('PetualanganDashView', Auth::guard('user')->user()->id)}} --}}" class="breadcrumb">Petualangan</a>

					</div>
				</div>
			</nav>
		</div>
		<div class="col s4 valign">
		</div>
	</div>

	<div class="ak-admin-container">
		<div class="card-panel white no-shadow2 ak-card">
			<h6 class="ak-label">Anda sebagai leader </h6>
			<br><br>
			<table class="highlight">
				<thead>
					<tr>
						<th>No</th>
						<th>Gunung</th>
						<th>Jalur</th>
						<th>Waktu</th>
						<th>Status</th>
					</tr>
				</thead>

				<tbody>
					@foreach($petualangan as $key=>$pet)
					<tr>
						<td>{{ ++$key }}</td>
						<td><div class="ak-detail"><a href="{{route('PetualanganDetailDashView', $pet->id)}}">{{ \App\Gunung::where(['id' => $pet->gunung_id])->value('nama')}}</a></div></td>
						<td>{{ \App\Jalur::where(['id' => $pet->jalur_id])->value('nama')}}</td>
						<td>{{$pet->waktu}}</td>
						<td>{{$pet->status}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<br>
		</div>
	</div>
	<br>
	<br>
	<div class="ak-admin-container">
		<div class="card-panel white no-shadow2 ak-card">
			<h6 class="ak-label">Anda sebagai anggota</h6>
			<br><br>
			<table class="highlight">
				<thead>
					<tr>
						<th>No</th>
						<th>Gunung</th>
						<th>Jalur</th>
						<th>Waktu</th>
						<th>Status</th>
					</tr>
				</thead>

				<tbody>
					@foreach($anggota as $key=>$ang)
					<tr>
						<td>{{ ++$key }}</td>
						<td><div class="ak-detail"><a href="{{route('PetualanganDetailDashView', $ang->petualangan_id)}}">{{ \App\Gunung::where(['id' => $ang->gunung_id])->value('nama')}}</a></div></td>
						<td>{{ \App\Jalur::where(['id' => $ang->jalur_id])->value('nama')}}</td>
						<td>{{ \App\Petualangan::where(['id' => $ang->petualangan_id])->value('waktu')}}</td>
						<td>{{ \App\Petualangan::where(['id' => $ang->petualangan_id])->value('status')}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<br>
		</div>
	</div>

	<div style="padding-bottom: 200px;"></div>
</main>


@endsection
@section('script')
@include('landing.app.app-jscript2')
@endsection
