@extends('admin.app-admin')

@section('title')
<title>User | Admin</title>
@endsection

@section('content')


{{-- breadcumb --}}
@section('Breadcumb')
<a href="{{route('AdminUser')}}" class="breadcrumb">User</a>
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
					<th>Nama</th>
					<th>Email</th>
					<th>Jenis Kelamin</th>
				</tr>
			</thead>

			<tbody>
				@foreach($user as $key=>$use)
				<tr>
					<td>{{ ++$key }}</td>
					<td><div class="ak-detail"><a href="{{route('AdminDetailUser', $use->id)}}">{{$use->name}}</a></div></td>
					<td>{{$use->email}}</td>
					<td>{{$use->kelamin}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

</div>
<br>

@endsection
