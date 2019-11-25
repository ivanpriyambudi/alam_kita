@extends('admin.app-admin')

@section('title')
<title>Camp Detail | Admin</title>
@endsection

@section('content')


@foreach($camp as $cam)
@foreach($gunung as $gun)
@foreach($jalur as $jal)
{{-- breadcumb --}}
@section('Breadcumb')
<a href="{{route('CampView')}}" class="breadcrumb">Camp</a>
<a href="{{url('/admin/camp/detail/'.$cam->id.'/'.$jal->id.'/'.$gun->id)}}" class="breadcrumb">{{$cam->nama}}</a>
@endsection



@section('KananBreadcumb')

<div class="col s6">
	<form method="POST" action="{{url('/admin/camp/delete/action/'.$cam->id.'/'.$jal->id)}}">
		@csrf
		<input type="hidden" name="status_camp" value="0">
		<button type="submit" class="waves-effect ak-del ak-bor-bot no-shadow2 btn-flat"><i class="material-icons left">delete_forever</i>Hapus</button>
	</form>
</div>
<div class="col s6">
	<a class="waves-effect ak-ed ak-bor-bot no-shadow2 btn-flat" href="{{url('/admin/camp/editcamp/'.$cam->gunung_id.'/'.$cam->jalur_id.'/'.$cam->id)}}"><i class="material-icons left">edit</i>Edit</a>
</div>

@endsection
{{-- breadcumb --}}

<div class="row">
	<div class="col s8" style="padding-right: 0;">
		<div class="ak-admin-container" style="margin-bottom: 10px;">
			<div class="card-panel white no-shadow2 ak-card">

				<div class="row">
					<div class="col s8" style="padding-left: 0;">
						<h6 class="ak-label">Profile</h6>
					</div>
					<div class="col s12">
						<blockquote>
							<table>
								<tbody>
									<tr>
										<td><b>Nama</b></td>
										<td>{{$cam->nama}}</td>
									</tr>
									<tr>
										<td><b>Kontak</b></td>
										<td>{{$cam->kontak}}</td>
									</tr>
									<tr>
										<td><b>Gunung</b></td>
										<td>{{$gun->nama}}</td>
									</tr>
									<tr>
										<td><b>Jalur</b></td>
										<td>{{$jal->nama}}</td>
									</tr>
									<tr>
										<td><b>Status</b></td>
										@if($cam->status == "Buka")
										<td class="ak-buka">{{$cam->status}}</td>
										@else
										<td class="ak-tutup">{{$cam->status}}</td>
										@endif
									</tr>
									<tr>
										<td><b>Deskripsi</b></td>
										<td style="white-space:pre-wrap; word-wrap:break-word;"><p>{{$cam->deskripsi}}</p></td>
									</tr>
									<tr>
										<td><b>Alamat</b></td>
										<td style="white-space:pre-wrap; word-wrap:break-word;"><p>{{$cam->alamat}}</p></td>
									</tr>
								</tbody>
							</table>
						</blockquote>
					</div>
				</div>
			</div>
		</div>

		
	</div>
	<div class="col s4" style="padding-left: 0;">

		<div class="col s12" style="padding-left: 0;">
			<div class="ak-admin-container" style="margin-bottom: 10px;">
				<div class="card-panel white no-shadow2 ak-card">

					<div class="row">
						<div class="col s8" style="padding-left: 0;">
							<h6 class="ak-label">Image</h6>
						</div>
					</div>

					<div class="row">
						<br>
						<div class="col s12">
							<center>
								<img class="materialboxed z-depth-2" width="200" src="{{ str_replace('public/','../../../../../', $cam->image) }}">
							</center>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="col s12" style="padding-left: 0;">
			<div class="ak-admin-container" style="margin-bottom: 10px;">
				<div class="card-panel white no-shadow2 ak-card">

					<div class="row">
						<div class="col s8" style="padding-left: 0;">
							<h6 class="ak-label">Akun</h6>
						</div>
					</div>

					<div class="row">
						<div class="col s12">
							<table>
								<tbody>
									<tr>
										<td><b>Nama</b></td>
										<td>{{$cam->nama}}</td>
									</tr>
									<tr>
										<td><b>Email</b></td>
										<td>{{$cam->email}}</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

				</div>
			</div>
		</div>

	</div>

	<div class="col s12">
		<div class="ak-admin-container" style="margin-bottom: 10px;">
			<div class="card-panel white no-shadow2 ak-card">
				<h6 class="ak-label">Petualangan</h6>


			</div>
		</div>
	</div>

</div>

<br>

@endforeach
@endforeach
@endforeach
@endsection
