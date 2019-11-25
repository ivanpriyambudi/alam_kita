@extends('landing.app.app-land')

@section('title')
<title>Alam Kita | Camp Petualangan</title>
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

@include('camp.app.app-camp')

{{-- /navbar --}}
<main>
	<div class="row ak-bread-con valign-wrapper">
		<div class="col s6">
			<nav class="ak-bread">
				<div class="nav-wrapper">
					<div class="col s12" style="padding-left: 30px;">
						<a href="#" class="breadcrumb">Petualangan</a>
					</div>
				</div>
			</nav>
		</div>
		<div class="col s6 valign">

		</div>
	</div>

	<div style="padding-top: 50px;"></div>
	<div class="ak-admin-container">
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
					<td><div class="ak-detail"><a href="{{route('CampPetualanganDetail', $pet->id)}}">{{ \App\Gunung::where(['id' => $pet->gunung_id])->value('nama')}}</a></div></td>
					<td>{{ \App\Jalur::where(['id' => $pet->jalur_id])->value('nama')}}</td>
					<td>{{$pet->waktu}}</td>
					<td>{{$pet->status}}</td>
				</tr>
				@endforeach

			</tbody>
		</table>
	</div>


	<div style="padding-bottom: 350px;"></div>
</main>


@endsection
@section('script')
@include('landing.app.app-jscript2')
@endsection
