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
<br><br><br>

@foreach($petualangan as $pet)
<div class="ak-admin-container">
	<div class="row">
		<div class="col s12">
			<div class="card-panel white no-shadow2 ak-card">

				<div class="row valign-wrapper">
					<div class="col s8" style="padding-left: 0;">
						<h6 class="ak-label">Diskusi Petualangan</h6>
					</div>
					<div class="col s4 right valign">
						<h5>Petualangan Mt {{ \App\Gunung::where(['id' => $pet->gunung_id])->value('nama')}}</h5> 
						<h6>Jalur {{ \App\Jalur::where(['id' => $pet->jalur_id])->value('nama')}}, {{$pet->waktu}}</h6>
					</div>
				</div>

				<div class="row">
					<div class="col s4">
						<ul class="collection">

							<li class="collection-header center-align"><h5>User</h5></li>

							<li class="collection-item avatar">
								<img src="{{ str_replace('public/','../../', \App\User::where(['id' => $pet->user_id])->value('image')) }}" alt="" class="circle">
								<span class="title">{{ \App\User::where(['id' => $pet->user_id])->value('name')}}</span>
								<br>
								<a href="{{route('ProfileView', $pet->user_id)}}">Lihat Profile</a>
							</li>
							@foreach($anggota as $ang)
							<li class="collection-item avatar">
								<img src="{{ str_replace('public/','../../', \App\User::where(['id' => $ang->user_id])->value('image')) }}" alt="" class="circle">
								<span class="title">{{ \App\User::where(['id' => $ang->user_id])->value('name')}}</span>
								<br>
								<a href="{{route('ProfileView', $ang->user_id)}}">Lihat Profile</a>
							</li>
							@endforeach

						</ul>
					</div>
					<div class="card-panel white no-shadow2 ak-card col s8">
						<br>
						@foreach($komen as $kom)

						@if($kom->user_id == Auth::guard('user')->user()->id)
						<div class="row" style="padding: 0 15px 0 15px;">
							<div class="col s6"></div>
							<div class="col s6" style="border:1px solid #e0e0e0; border-radius: 10px; background-color: #eaf1e5;">
								<p><b>{{ \App\User::where(['id' => $kom->user_id])->value('name')}}</b></p>
								<p>{{$kom->komen}}</p>
							</div>
						</div>
						@else

						<div class="row" style="padding: 0 15px 0 15px;">
							<div class="col s6" style="border:1px solid #e0e0e0; border-radius: 10px;">
								<p><b>{{ \App\User::where(['id' => $kom->user_id])->value('name')}}</b></p>
								<p>{{$kom->komen}}</p>
							</div>
							<div class="col s6"></div>
						</div>
						@endif

						@endforeach

						<div class="col s12">
							<form action="{{route('DiskusiAdd')}}" method="POST">
								@csrf
								<div class="input-field ak-field">
									<textarea name="komen" id="komen" class="materialize-textarea" style="height: 5em;"></textarea>
									<label for="deskripsi">Ketik sesuatu di sini</label>
								</div>

								<input type="hidden" name="petualangan_id" value="{{$pet->id}}">
								<input type="hidden" name="user_id" value="{{Auth::guard('user')->user()->id}}">

								<center>
									<button type="submit" class="waves-effect ak-button btn" style="width: 75%;">Kirim</button>
								</center>
							</form>
							<br>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endforeach

<div style="padding-bottom: 300px;"></div>
@endsection

@section('script')
@include('landing.app.app-jscript2')
@endsection
