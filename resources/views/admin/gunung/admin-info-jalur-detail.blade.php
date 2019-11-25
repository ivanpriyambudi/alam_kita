@extends('../admin/app-admin')

@section('title')
<title>Detail Jalur | Admin</title>
@endsection

@section('content')

@foreach($jalur as $jal)
@foreach($gunung as $gun)


{{-- breadcumb --}}
@section('Breadcumb')
<a href="{{url('/admin/info-gunung')}}" class="breadcrumb">Info Gunung</a>
<a href="{{route('AdminInfoGunungDetail', $gun->id)}}" class="breadcrumb">{{$gun->nama}}</a>
<a href="{{url('/admin/detail-jalur/')}}{{'/'.$jal->gunung_id.'/'.$jal->id}}" class="breadcrumb">{{$jal->nama}}</a>
@endsection

@section('KananBreadcumb')
<center>
	
</center>
@endsection
{{-- breadcumb --}}

<div class="ak-admin-container" style="margin-bottom: 100px;">
	<div class="card-panel white no-shadow2 ak-card">
		
		<div class="row">
			<div class="col s8" style="padding-left: 0;">
				<h6 class="ak-label">Profile Jalur Pendakian</h6>
			</div>
			<div class="col s4 right">
				<div class="col s6">
					<form method="POST" action="{{url('/admin/delete-jalur/'.$gun->id.'/'.$jal->id)}}">
						@csrf
						<button type="submit" class="waves-effect ak-del ak-bor-bot no-shadow2 btn-flat"><i class="material-icons left">delete_forever</i>Hapus</button>
					</form>
				</div>
				<div class="col s6">
					<a class="waves-effect ak-ed ak-bor-bot no-shadow2 btn-flat" href="{{url('/admin/edit-jalur/'.$gun->id.'/'.$jal->id)}}"><i class="material-icons left">edit</i>Edit</a>
				</div>
			</div>
		</div>

		<div class="row valign-wrapper">
			<br>
			<div class="col s7">
				<br>
				<h5>Pendakian MT {{$gun->nama}} Jalur {{$jal->nama}}</h5>
				<br>
				<blockquote>
					<table>
						<tbody>
							<tr>
								<td><b>Estimasi Total</b></td>
								<td>{{ \App\Pos::where('jalur_id', $jal->id )->sum('estimasi') }} Jam</td>
							</tr>
							<tr>
								<td><b>Tarif</b></td>
								<td>Rp {{$jal->tarif}}</td>
							</tr>
							<tr>
								<td><b>Lokasi</b></td>
								<td>{{$jal->lokasi}}, {{$gun->kota}}, {{$gun->propinsi}}</td>
							</tr>
							<tr>
								<td><b>Kontak</b></td>
								<td>{{$jal->kontak}}</td>
							</tr>
							<tr>
								<td><b>Status</b></td>
								@if($gun->status == "Buka")
								<td class="ak-buka">{{$jal->status}}</td>
								@else
								<td class="ak-tutup">{{$jal->status}}</td>
								@endif
							</tr>
							<tr>
								<td><b>Akses</b></td>
								<td style="white-space:pre-wrap; word-wrap:break-word;"><p>{{$jal->akses}}<p></td>
								</tr>
								<tr>
									<td><b>Deskripsi</b></td>
									<td style="white-space:pre-wrap; word-wrap:break-word;"><p>{{$jal->deskripsi}}<p></td>
									</tr>
								</tbody>
							</table>
						</blockquote>
					</div>
					<div class="col s5 valign">

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
													<form method="POST" action="{{url('/admin/info-gunung/jalur/status/'.$jal->id.'/'.$gun->id)}}">
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
													<form method="POST" action="{{url('/admin/info-gunung/jalur/status/'.$jal->id.'/'.$gun->id)}}">
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

						<center>
							<h6><b>Foto Jalur :</b></h6>
							<img class="materialboxed z-depth-2" width="280" src="{{ str_replace('public/','../../../', $jal->image) }}">
						</center>
						<br>
						<br>
						<center>
							<h6><b>Peta Jalur :</b></h6>
							<img class="materialboxed z-depth-2" width="280" src="{{ str_replace('public/','../../../', $jal->peta) }}">
						</center>
					</div>
				</div>
			</div>

			@if($jal->status_camp == "1")

			<div class="card-panel green lighten-4 no-shadow2 ak-card" style="padding: 10px;">
				<div class="row valign-wrapper" style="margin-bottom: 0;">
					<div class="col s7 valign">
						@foreach($camp as $cam)
						<h5 style="margin-top: 5px;">Basecamp : {{$cam->nama}}</h5>
						@endforeach
					</div>
					<div class="col s5">
						@foreach($camp as $cam)
						<div class="col s6">
							<form method="POST" action="{{url('/admin/camp/delete/action/'.$cam->id.'/'.$jal->id)}}">
								@csrf
								<input type="hidden" name="status_camp" value="0">

								<button type="submit" class="waves-effect red darken-1 ak-button btn right"><i class="material-icons left">delete_forever</i>Hapus</button>
							</form>
						</div>
						<div class="col s6">
							<a class="waves-effect ak-button btn left" href="{{url('/admin/camp/editcamp/'.$cam->gunung_id.'/'.$cam->jalur_id.'/'.$cam->id)}}"><i class="material-icons left">edit</i>Edit</a>
						</div>
						@endforeach
					</div>
				</div>
			</div>

			@else
			<div class="card-panel white no-shadow2 ak-card">
				<div class="row valign-wrapper" style="margin-bottom: 0;">
					<div class="col s7 valign">
						<h5 style="margin-top: 5px;">Basecamp : basecamp belum ditambahkan</h5>
					</div>
					<div class="col s5">
						<a class="waves-effect ak-button btn right" href="{{url('/admin/camp/addcamp/'.$gun->id.'/'.$jal->id)}}"><i class="material-icons left">add</i>Tambah Basecamp</a>
					</div>
				</div>
			</div>
			@endif

			<div class="card-panel white no-shadow2 ak-card">
				<h6 class="ak-label">Pos Jalur Pendakian</h6>
				<a class="waves-effect ak-button btn right modal-trigger" href="#addPos"><i class="material-icons left">add</i>Tambah Pos</a>
				<br><br>

				<table class="highlight">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Pos</th>
							<th>Pos Ke-</th>
							<th>Estimasi</th>
						</tr>
					</thead>

					<tbody>
						@foreach($pos as $key=>$po)
						<tr>
							<td >{{ ++$key }}</td>
							<td ><div class="ak-detail"><a href="{{url('/admin/detail-pos/')}}{{'/'.$po->gunung_id.'/'.$po->jalur_id.'/'.$po->id}}">{{$po->nama}}</a></div></td>
							<td>Pos {{$po->no_pos}}</td>
							<td >{{$po->estimasi}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>

		</div>
		<br>

		@include('admin.app-modal')



		@endforeach
		@endforeach
		@endsection
