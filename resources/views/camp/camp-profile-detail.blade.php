@extends('landing.app.app-land')

@section('title')
<title>Alam Kita | Camp Profile</title>
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

@foreach($user as $use)
<main>
	<div class="row ak-bread-con valign-wrapper">
		<div class="col s6">
			<nav class="ak-bread">
				<div class="nav-wrapper">
					<div class="col s12" style="padding-left: 30px;">
						<a href="#" class="breadcrumb">Profile</a>
					</div>
				</div>
			</nav>
		</div>
		<div class="col s6 valign">
			<div class="col s2"></div>
			<div class="col s5 right-align">
				<a class="waves-effect ak-ed ak-bor-bot no-shadow2 btn-flat" href="{{route('CampProfileEditView', $use->id)}}"><i class="material-icons left">edit</i>Edit Profile</a>
			</div>
			<div class="col s5">
				<form action="{{url('/camp/profile/delete/action/'.$use->id.'/'.$use->jalur_id)}}" method="POST">
					@csrf
					<input type="hidden" name="status_camp" value="0">
					<button type="submit" class="waves-effect ak-del ak-bor-bot no-shadow2 btn-flat"><i class="material-icons left">delete_forever</i>Hapus Akun</button>
				</form>
			</div>
		</div>
	</div>


	<div class="ak-admin-container">
		<div class="card-panel white no-shadow2 ak-card">

			<div class="row">

				<div class="col s6" style="padding-left: 0;">
					<h6 class="ak-label">Profile</h6>
				</div>

				<div class="col s6 right">
					<ul class="collapsible ak-rad-30">
						<li>
							<div class="collapsible-header ak-rad-30">
								<i class="material-icons">edit</i>
								Ganti Status
							</div>
							<div class="collapsible-body">
								<ul class="collection with-header">
									<li class="collection-item">
										<div class="row valign-wrapper">
											<div class="col s6 valign">Buka</div>
											<div class="col s6">
												<form method="POST" action="{{url('/camp/status/'.$use->jalur_id.'/'.$use->id)}}">
													@csrf
													<input type="hidden" name="status" value="Buka">
													<button type="submit" class="waves-effect ak-del ak-bor-bot no-shadow2 btn-flat">Buka</button>
												</form>
											</div>
										</div>
									</li>
									<li class="collection-item">
										<div class="row valign-wrapper">
											<div class="col s6 valign">Tutup</div>
											<div class="col s6">
												<form method="POST" action="{{url('/camp/status/'.$use->jalur_id.'/'.$use->id)}}">
													@csrf
													<input type="hidden" name="status" value="Tutup">
													<button type="submit" class="waves-effect ak-del ak-bor-bot no-shadow2 btn-flat">Tutup</button>
												</form>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</div>

			<div class="row">
				<br>
				<div class="col s6">
					<blockquote>
						<table>
							<tbody>
								<tr>
									<td><b>Nama</b></td>
									<td>{{$use->nama}}</td>
								</tr>
								<tr>
									<td><b>Email</b></td>
									<td>{{$use->email}}</td>
								</tr>
								<tr>
									<td><b>Kontak</b></td>
									<td>{{$use->kontak}}</td>
								</tr>
								<tr>
									<td><b>Gunung</b></td>
									<td>{{ \App\Gunung::where(['id' => $use->gunung_id])->value('nama')}}</td>
								</tr>
								<tr>
									<td><b>Jalur</b></td>
									<td>{{ \App\Jalur::where(['id' => $use->jalur_id])->value('nama')}}</td>
								</tr>
								<tr>
									<td><b>Status Jalur</b></td>
									<td><b>{{ \App\Jalur::where(['id' => $use->jalur_id])->value('status')}}</b></td>
								</tr>
								<tr>
									<td><b>Alamat</b></td>
									<td style="white-space:pre-wrap; word-wrap:break-word;"><p>{{$use->alamat}}<p></td>
									</tr>
									<tr>
										<td><b>Deskripsi</b></td>
										<td style="white-space:pre-wrap; word-wrap:break-word;"><p>{{$use->deskripsi}}<p></td>
										</tr>
									</tbody>
								</table>
							</blockquote>
						</div>

						<div class="col s6">
							<center>
								<img class="materialboxed z-depth-2" width="280" src="{{ str_replace('public/','../../../../', $use->image) }}">
							</center>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</main>

		@endsection
		@section('script')
		@include('landing.app.app-jscript2')
		@endsection
