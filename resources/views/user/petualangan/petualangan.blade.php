@extends('landing.app.app-land')

@section('title')
<title>Alam Kita | Petualangan</title>
@endsection

@section('content')


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

		<div class="row">
			<div class="col s12">
				<div class="row valign-wrapper">
					<div class="col s2 valign">
						
					</div>
				</div>

				@foreach($petualangan as $pet)

				<div class="card horizontal no-shadow2 ak-card">
					<div class="card-stacked">
						<div class="card-content">

							<h5>{{ \App\Gunung::where(['id' => $pet->gunung_id])->value('nama')}}</h5>
							<p>{{ \App\Jalur::where(['id' => $pet->jalur_id])->value('nama')}}</p>
							<p>{{$pet->waktu}}</p>
							<br>
							<p>{{ Str::limit($pet->deskripsi, 250, '...') }}</p>
						</div>
						<div class="card-action">
							<a href="{{url('/user/pet/detail/'.$pet->id)}}" class="waves-effect waves-teal btn-flat"><i class="material-icons right">keyboard_arrow_right</i>Baca Selanjutnya</a>
						</div>
					</div>
				</div>

				@endforeach

			</div>
		</div>
	</div>					
</div>


@endsection
@section('script')
@include('landing.app.app-jscript2')
@endsection
