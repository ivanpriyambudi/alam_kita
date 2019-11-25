@extends('admin.app-admin')

@section('title')
<title>Petualangan | Admin</title>
@endsection

@section('content')


{{-- breadcumb --}}
@section('Breadcumb')
<a href="{{route('AdminPetualangan')}}" class="breadcrumb">Petualangan</a>
@endsection

@section('KananBreadcumb')

@endsection
{{-- breadcumb --}}

<div class="ak-admin-container">

	<div class="material-table">
		<table id="datatable2" class="highlight">
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
					<td><div class="ak-detail"><a href="{{route('AdminDetailPetualangan', $pet->id)}}">{{ \App\Gunung::where(['id' => $pet->gunung_id])->value('nama')}}</a></div></td>
					<td>{{ \App\Jalur::where(['id' => $pet->jalur_id])->value('nama')}}</td>
					<td>{{$pet->waktu}}</td>
					<td>{{$pet->status}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

</div>
<br>

@endsection
