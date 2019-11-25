@extends('admin.app-admin')

@section('title')
<title>Camp | Admin</title>
@endsection

@section('content')


{{-- breadcumb --}}
@section('Breadcumb')
<a href="{{route('CampView')}}" class="breadcrumb">Camp</a>
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
					<th>Nama Camp</th>
					<th>Jalur</th>
					<th>Gunung</th>
					<th>Status</th>
				</tr>
			</thead>

			<tbody>
				@foreach($camp as $key=>$cam)
				@foreach($gunung as $gun)
				@foreach($jalur as $jal)
				<tr>
					<td>{{ ++$key }}</td>
					<td><div class="ak-detail"><a href="{{url('/admin/camp/detail/'.$cam->id.'/'.$jal->id.'/'.$gun->id)}}">{{$cam->nama}}</a></div></td>
					<td>{{$jal->nama}}</td>			
					<td>{{$gun->nama}}</td>

					@if($cam->status == "Buka")
					<td class="ak-buka">{{$cam->status}}</td>
					@else
					<td class="ak-tutup">{{$cam->status}}</td>
					@endif

				</tr>
				@endforeach
				@endforeach
				@endforeach
			</tbody>
		</table>
	</div>

</div>
<br>

@endsection
