@extends('landing.app.app-land')

@section('title')
<title>Alam Kita | Profile</title>
@endsection

@section('content')

@foreach($user as $use)


<div style="background-color: #fff; padding: 0px 0 80px 0;">
	<div class="container">
		<br><br><br>
		<div class="ak-admin-container">
			<div class="card-panel white no-shadow2 ak-card">

				<div class="row">
					<div class="col s8" style="padding-left: 0;">
						<h6 class="ak-label">Profile</h6>
					</div>
					<div class="col s4">
						<h5>{{$use->name}}</h5>
					</div>
				</div>

				<div class="row">
					<br>
					<div class="col s6">
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
						<div class="col s6">
							<img class="materialboxed z-depth-2" width="280" src="{{ str_replace('public/','../../../', $use->image) }}">
							<br>
							<ul class="collection">
								<li class="collection-header center-align"><h5>Petualangan</h5></li>

								@foreach($petualangan as $pet)
								<li class="collection-item">
									<b><h6>Mt {{ \App\Gunung::where(['id' => $pet->gunung_id])->value('nama')}}</h6></b><br>
									Jalur {{ \App\Jalur::where(['id' => $pet->jalur_id])->value('nama')}}, {{$pet->waktu}}
									<br>
									<a href="{{route('PetualanganDetail', $pet->id)}}">detail</a>
								</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>

		</div>					
	</div>

	@endforeach

	@endsection
	@section('script')
	@include('landing.app.app-jscript2')
	@endsection
