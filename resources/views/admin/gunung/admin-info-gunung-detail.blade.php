@extends('admin.app-admin')

@section('title')
<title>Detail Gunung | Admin</title>
@endsection

@section('content')

@foreach($gunung as $gun)

{{-- breadcumb --}}
@section('Breadcumb')
<a href="{{url('/admin/info-gunung')}}" class="breadcrumb">Info Gunung</a>
<a href="{{route('AdminInfoGunungDetail', $gun->id)}}" class="breadcrumb">{{$gun->nama}}</a>
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
				<h6 class="ak-label">Profile</h6>
			</div>
			<div class="col s4 right">
				<div class="col s6">
					<form method="POST" action="{{route('AdminDeleteGunung', $gun->id)}}">
						@csrf
						<button type="submit" class="waves-effect ak-del ak-bor-bot no-shadow2 btn-flat"><i class="material-icons left">delete_forever</i>Hapus</button>
					</form>
				</div>
				<div class="col s6">
					<a class="waves-effect ak-ed ak-bor-bot no-shadow2 btn-flat" href="{{route('AdminInfoGunungEditView', $gun->id)}}"><i class="material-icons left">edit</i>Edit</a>
				</div>
			</div>
		</div>

		<div class="row">
			<br>
			<div class="col s6">
				<h3>MT {{$gun->nama}}</h3>
				<blockquote>
					<table>
						<tbody>
							<tr>
								<td><b>Ketinggian</b></td>
								<td>{{$gun->tinggi}} mdpl</td>
							</tr>
							<tr>
								<td><b>Lokasi</b></td>
								<td>{{$gun->kota}}, {{$gun->propinsi}}</td>
							</tr>
							<tr>
								<td><b>Status</b></td>
								@if($gun->status == "Buka")
								<td class="ak-buka">{{$gun->status}}</td>
								@else
								<td class="ak-tutup">{{$gun->status}}</td>
								@endif
							</tr>
							<tr>
								<td><b>Deskripsi</b></td>
								<td style="white-space:pre-wrap; word-wrap:break-word;"><p>{{$gun->deskripsi}}<p></td>
								</tr>
							</tbody>
						</table>
					</blockquote>
				</div>
				<div class="col s6">

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
												<form method="POST" action="{{route('AdminStatusGunung', $gun->id)}}">
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
												<form method="POST" action="{{route('AdminStatusGunung', $gun->id)}}">
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
						<img class="materialboxed z-depth-2" width="350" src="{{ str_replace('public/','../../', $gun->image) }}">
					</center>
				</div>
			</div>
		</div>

		<div class="card-panel white no-shadow2 ak-card">
			<h6 class="ak-label">Jalur Pendakian</h6>
			<a class="waves-effect ak-button btn right" href="{{route('AdminAddJalurView', $gun->id)}}"><i class="material-icons left">add</i>Tambah Jalur</a>
			<br><br>

			<table class="highlight">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Jalur</th>
						<th>Lokasi</th>
						<th>Jumlah Pos</th>
						<th>Estimasi Puncak</th>
						<th>Status</th>
					</tr>
				</thead>

				<tbody>
					{{-- @foreach($po as $p) --}}
					@foreach($jalur as $key=>$jal)
					<tr>
						<td >{{ ++$key }}</td>
						<td ><div class="ak-detail"><a href="{{url('/admin/detail-jalur/')}}{{'/'.$jal->gunung_id.'/'.$jal->id}}">{{$jal->nama}}</a></div></td>
						<td >{{$jal->lokasi}}</td>

						<td >{{ \App\Pos::where('jalur_id', $jal->id )->count() }}</td>

						<td >{{ \App\Pos::where('jalur_id', $jal->id )->sum('estimasi') }}</td>
						@if($jal->status == "Buka")
						<td class="ak-buka">{{$jal->status}}</td>
						@else
						<td class="ak-tutup">{{$jal->status}}</td>
						@endif
					</tr>
					@endforeach
					{{-- @endforeach --}}
				</tbody>
			</table>
		</div>

	</div>
	<br>

	@endforeach
	@endsection
