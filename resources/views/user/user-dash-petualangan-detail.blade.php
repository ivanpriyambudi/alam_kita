@extends('landing.app.app-land')

@section('title')
<title>Alam Kita | Petualangan</title>
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



@include('user.app.app-user')
@foreach($petualangan as $pet)
<main>
	<div class="row ak-bread-con valign-wrapper">
		<div class="col s8">
			<nav class="ak-bread">
				<div class="nav-wrapper">
					<div class="col s12" style="padding-left: 30px;">
						<a href="{{route('PetualanganDashView', Auth::guard('user')->user()->id)}}" class="breadcrumb">Petualangan</a>
						<a href="#" class="breadcrumb">{{ \App\Gunung::where(['id' => $pet->gunung_id])->value('nama')}}, {{$pet->waktu}}</a>
					</div>
				</div>
			</nav>
		</div>
		<div class="col s4 valign">
		</div>
	</div>

	<div class="ak-admin-container">
		<div class="card-panel white no-shadow2 ak-card">

			<div class="row">
				<div class="col s8" style="padding-left: 0;">
					<h6 class="ak-label">Petualangan</h6>
				</div>
				<div class="col s4 right">
					@if($pet->user_id == Auth::guard('user')->user()->id)
					<div class="col s6">					
						<form method="POST" action="{{url('/petualangan/delete/'.Auth::guard('user')->user()->id.'/'.$pet->id)}}">
							@csrf
							<button type="submit" class="waves-effect ak-del ak-bor-bot no-shadow2 btn-flat"><i class="material-icons left">delete_forever</i>Hapus</button>
						</form>
					</div>
					<div class="col s6">
						<a class="waves-effect ak-ed ak-bor-bot no-shadow2 btn-flat" href="{{route('PetualanganEditView', $pet->id)}}"><i class="material-icons left">edit</i>Edit</a>
					</div>
					@else
					<div class="col s12">
						<form method="POST" action="{{route('PetualanganLeave', Auth::guard('user')->user()->id)}}" >
							<button type="submit" class="waves-effect ak-del ak-bor-bot no-shadow2 btn-flat"><i class="material-icons left">close</i>Tinggalkan</button>
						</form>
					</div>
					@endif

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
					<div class="col s12">
						<center>
							<a href="{{route('DiskusiView', $pet->id)}}" class="waves-effect ak-button btn" style="width: 75%;">Mulai Diskusi</a>
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
