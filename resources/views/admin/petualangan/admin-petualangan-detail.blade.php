@extends('admin.app-admin')

@section('title')
<title>Petualangan | Admin</title>
@endsection

@section('content')
@foreach($petualangan as $pet)

{{-- breadcumb --}}
@section('Breadcumb')
<a href="{{route('AdminPetualangan')}}" class="breadcrumb">Petualangan</a>
<a href="#" class="breadcrumb">{{ \App\Gunung::where(['id' => $pet->gunung_id])->value('nama')}}, {{$pet->waktu}}</a>
@endsection

@section('KananBreadcumb')

<div class="col s6">
	<form method="POST" action="{{route('AdminDeletePetualangan', $pet->id)}}">
		@csrf
		<button type="submit" class="waves-effect ak-del ak-bor-bot no-shadow2 btn-flat"><i class="material-icons left">delete_forever</i>Hapus</button>
	</form>
</div>
<div class="col s6">
	<a class="waves-effect ak-ed ak-bor-bot no-shadow2 btn-flat" href="{{route('AdminEditViewPetualangan', $pet->id)}}"><i class="material-icons left">edit</i>Edit</a>
</div>

@endsection
{{-- breadcumb --}}



<div class="ak-admin-container">
	<div class="card-panel white no-shadow2 ak-card">

		<div class="row valign-wrapper">
			<div class="col s6 valign" style="padding-left: 0;">
				<h6 class="ak-label">Petualangan</h6>
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
										<div class="col s6 valign">Terima</div>
										<div class="col s6">
											<form method="POST" action="{{route('AdminStatusPetualangan', $pet->id)}}">
												@csrf
												<input type="hidden" name="status" value="Terima">
												<button type="submit" class="waves-effect ak-del ak-bor-bot no-shadow2 btn-flat">Terima</button>
											</form>
										</div>
									</div>
								</li>
								<li class="collection-item">
									<div class="row valign-wrapper">
										<div class="col s6 valign">Tolak</div>
										<div class="col s6">
											<form method="POST" action="{{route('AdminStatusPetualangan', $pet->id)}}">
												@csrf
												<input type="hidden" name="status" value="Tolak">
												<button type="submit" class="waves-effect ak-del ak-bor-bot no-shadow2 btn-flat">Tolak</button>
											</form>
										</div>
									</div>
								</li>
								<li class="collection-item">
									<div class="row valign-wrapper">
										<div class="col s6 valign">Pending</div>
										<div class="col s6">
											<form method="POST" action="{{route('AdminStatusPetualangan', $pet->id)}}">
												@csrf
												<input type="hidden" name="status" value="Pending">
												<button type="submit" class="waves-effect ak-del ak-bor-bot no-shadow2 btn-flat">Pending</button>
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
								<td><b>Gunung</b></td>
								<td>{{ \App\Gunung::where(['id' => $pet->gunung_id])->value('nama')}}</td>
							</tr>
							<tr>
								<td><b>Jalur</b></td>
								<td>{{ \App\Jalur::where(['id' => $pet->jalur_id])->value('nama')}}</td>
							</tr>
							<tr>
								<td><b>waktu</b></td>
								<td>{{$pet->waktu}}</td>
							</tr>
							<tr>
								<td><b>Status</b></td>
								<td>{{$pet->status}}</td>
							</tr>
							<tr>
								<td><b>tempat</b></td>
								<td>{{$pet->tempat}}</td>
							</tr>
							<tr>
								<td><b>Deskripsi</b></td>
								<td style="white-space:pre-wrap; word-wrap:break-word;"><p>{{$pet->deskripsi}}<p></td>
								</tr>
							</tbody>
						</table>
					</blockquote>
				</div>

				<div class="col s6">
					<ul class="collection with-header">
						<li class="collection-header"><h5>Daftar Pendaki</h5></li>
						<li class="collection-item"><b>Leader :</b> {{\App\User::where(['id' => $pet->user_id])->value('name')}}</li>
						@foreach($anggota as $ang)
						<li class="collection-item">{{ \App\User::where(['id' => $ang->user_id])->value('name')}}</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
	@endforeach
	<br>

	@endsection
