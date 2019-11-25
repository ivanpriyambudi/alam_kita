@extends('admin.app-admin')

@section('title')
<title>Artikel | Admin</title>
@endsection

@section('content')


{{-- breadcumb --}}
@section('Breadcumb')
<a href="#!" class="breadcrumb">Artikel</a>
@endsection

@section('KananBreadcumb')
<center>
	<a class="waves-effect ak-button btn" href="{{url('/admin/artikel/add-artikel')}}"><i class="material-icons left">add</i>Tambah Baru</a>
</center>
@endsection
{{-- breadcumb --}}

<div class="ak-admin-container">

	<div class="material-table">
		<table id="datatable2" class="highlight">
			<thead>
				<tr>
					<th>No</th>
					<th>Judul Artikel</th>
					<th>Tgl Terbit</th>
					<th>Status</th>
				</tr>
			</thead>

			<tbody>
				@foreach($artikel as $key=>$art)
				<tr>
					<td>{{ ++$key }}</td>
					<td><div class="ak-detail"><a href="{{route('ArtikelDetailView', $art->id)}}">{{$art->judul}}</a></td>
					<td>{{$art->created_at}}</td>
					<td class="ak-buka">Terbit</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

</div>
<br>

@endsection
