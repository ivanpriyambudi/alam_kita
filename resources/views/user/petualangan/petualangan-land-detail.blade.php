@extends('landing.app.app-land')

@section('title')
<title>Alam Kita | Petualangan</title>
@endsection

@section('content')


@foreach($petualangan as $pet)

<div class="slider" style="background-color: #fff; height: 65vh;">
	<ul class="slides" style="background-color: #fff; z-index: 0; ">
		<li style="z-index: 0;">
			<img src="{{url('/img/ban/head1.jpg')}}" style="height: 60%;"> <!-- random image -->
			<div class="animated bounceInDown caption" style="left: 15%;">
				<h2 class="white-text center-align"><b>Petualangan</b></h2>
			</div>
		</li>
	</ul>
</div>


<div style="background-color: #fff; padding: 0px 0 80px 0;">
	<div class="container">

		<div class="ak-admin-container">
			<div class="card-panel white no-shadow2 ak-card">

				<div class="row">
					<div class="col s8" style="padding-left: 0;">
						<h6 class="ak-label">Petualangan</h6>
					</div>
					<div class="col s4">

						@if($pet->user_id == Auth::guard('user')->user()->id)
						
						@else

						@if(\App\Anggota::where(['petualangan_id' => $pet->id])->value('user_id') == Auth::guard('user')->user()->id)
						<form method="POST" action="{{route('PetualanganLeave2', Auth::guard('user')->user()->id)}}" >
							@csrf
							<button type="submit" class="waves-effect ak-del ak-bor-bot no-shadow2 btn-flat"><i class="material-icons left">close</i>Tinggalkan</button>
						</form>
						@else
						<form method="POST" action="{{route('AnggotaAdd')}}">
							@csrf

							<input type="hidden" name="petualangan_id" value="{{$pet->id}}">
							<input type="hidden" name="jalur_id" value="{{$pet->jalur_id}}">
							<input type="hidden" name="gunung_id" value="{{$pet->gunung_id}}">
							<input type="hidden" name="user_id" value="{{Auth::guard('user')->user()->id}}">
							<input type="hidden" name="status" value="anggota">


							<button type="submit" class="waves-effect ak-ed ak-bor-bot no-shadow2 btn-flat"><i class="material-icons left">add</i>Gabung</button>
						</form>
						@endif
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

		</div>					
	</div>

	@endforeach

	@endsection
	@section('script')
	@include('landing.app.app-jscript2')
	@endsection
