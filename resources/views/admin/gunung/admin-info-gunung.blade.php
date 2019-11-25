@extends('admin.app-admin')

@section('title')
<title>Info Gunung | Admin</title>
@endsection

@section('content')

{{-- breadcumb --}}
@section('Breadcumb')
<a href="#!" class="breadcrumb">Info Gunung</a>
@endsection

@section('KananBreadcumb')
<center>
	<a class="waves-effect ak-button btn" href="{{url('/admin/add-gunung')}}"><i class="material-icons left">add</i>Tambah Baru</a>
</center>
@endsection
{{-- breadcumb --}}

<div class="ak-admin-container">

	<div class="material-table">
		<table id="datatable" class="highlight">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Gunung</th>
					<th>Daerah</th>
					<th>Ketinggian</th>
					<th>Status</th>
				</tr>
			</thead>

			<tbody>
				@foreach($gunung as $key=>$gun)
				<tr>
					<td>{{ ++$key }}</td>
					<td><div class="ak-detail"><a href="{{route('AdminInfoGunungDetail', $gun->id)}}">{{$gun->nama}}</a></div></td>
					<td>{{$gun->propinsi}}, {{$gun->kota}}</td>
					<td>{{$gun->tinggi}} <b>mdpl</b></td>
					@if($gun->status == "Buka")
					<td class="ak-buka">{{$gun->status}}</td>
					@else
					<td class="ak-tutup">{{$gun->status}}</td>
					@endif
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

</div>
<br>

@endsection
