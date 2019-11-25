@extends('admin.app-admin')

@section('title')
<title>User | Admin</title>
@endsection

@section('content')

@foreach($user as $use)

{{-- breadcumb --}}
@section('Breadcumb')
<a href="{{route('AdminUser')}}" class="breadcrumb">User</a>
<a href="#" class="breadcrumb">{{$use->name}}</a>
@endsection

@section('KananBreadcumb')

<div class="col s6 right-align">
	<form method="POST" action="{{route('AdminDeleteUser', $use->id)}}">
		@csrf
		<button type="submit" class="waves-effect ak-del ak-bor-bot no-shadow2 btn-flat"><i class="material-icons left">delete_forever</i>Hapus</button>
	</form>
</div>
<div class="col s6">
	<a class="waves-effect ak-ed ak-bor-bot no-shadow2 btn-flat" href="{{route('AdminEditViewUser', $use->id)}}"><i class="material-icons left">edit</i>Edit</a>
</div>

@endsection
{{-- breadcumb --}}

<div class="ak-admin-container">
	<div class="card-panel white no-shadow2 ak-card">

		<div class="row">
			<div class="col s6" style="padding-left: 0;">
				<h6 class="ak-label">User</h6>
			</div>
			
		</div>

		<div class="row">
			<br>
			<div class="col s12">
				<blockquote>
					<table>
						<tbody>
							<tr>
								<td><b>Email</b></td>
								<td>{{$use->email}}</td>
							</tr>
							<tr>
								<td><b>Deskripsi</b></td>
								<td style="white-space:pre-wrap; word-wrap:break-word;"><p>{{$use->deskripsi}}<p></td>
								</tr>
								<tr>
									<td><b>Alamat</b></td>
									<td>{{$use->alamat}}</td>
								</tr>
								<tr>
									<td><b>Tempat, tanggal lahir</b></td>
									<td>{{$use->tempat_lahir}}, {{$use->tgl_lahir}}</td>
								</tr>
								<tr>
									<td><b>Kontak</b></td>
									<td>{{$use->kontak}}</td>
								</tr>
								<tr>
									<td><b>Jenis Kelamin</b></td>
									<td>{{$use->kelamin}}</td>
								</tr>
							</tbody>
						</table>
					</blockquote>
				</div>
			</div>
		</div>
	</div>
	<br>

	@endforeach
	@endsection
