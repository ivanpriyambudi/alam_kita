@extends('landing.app.app-land')

@section('title')
<title>Alam Kita | Info Gunung</title>
@endsection

@section('content')


<div class="slider" style="background-color: #fff; height: 65vh;">
	<ul class="slides" style="background-color: #fff; z-index: 0; ">
		<li style="z-index: 0;">
			<img src="{{url('/img/ban/head1.jpg')}}" style="height: 60%;"> <!-- random image -->
			<div class="animated bounceInDown caption" style="left: 15%;">
				<h2 class="white-text center-align"><b>Info Gunung</b></h2>
			</div>
		</li>
	</ul>
</div>


<div style="background-color: #fff; padding: 0px 0 80px 0;">
	<div class="container">

		<div class="row">
			<div class="col s12">
				<div class="row valign-wrapper">
					<div class="col s10">
						<form action="" method="">
							<div class="input-field ak-field">
								<input name="cari" type="text" id="autocomplete-input" class="autocomplete">
								<label for="autocomplete-input">Cari Gunung di sini</label>
							</div>
						</form>
					</div>
					<div class="col s2 valign">
						
					</div>
				</div>

				@foreach($gunung as $gun)

				<div class="card horizontal no-shadow2 ak-card">
					<div class="card-image">
						<img class="ak-img-pos" src="{{ str_replace('public/','../../../', $gun->image) }}" style=" height:304px; width:auto; max-width:303px;">
					</div>
					<div class="card-stacked">
						<div class="card-content">
							<div class="row valign-wrapper">
								<div class="col s6">
									<h5>{{$gun->nama}}</h5>
									<b><p>Ketinggian : {{$gun->tinggi}} mdpl</p></b>
									<br>
								</div>
								<div class="col s6 valign">
									<div class="center-align status-gun">
										@if($gun->status == "Buka")
										<div class="ak-buka">{{$gun->status}}</div>
										@else
										<div class="ak-tutup">{{$gun->status}}</div>
										@endif
									</div>
								</div>
							</div>
							<p>{{ Str::limit($gun->deskripsi, 200, '...') }}</p>
						</div>
						<div class="card-action">
							<a href="{{route('LandInfoDetail', $gun->id)}}" class="waves-effect waves-teal btn-flat"><i class="material-icons right">keyboard_arrow_right</i>Baca Selanjutnya</a>
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
@include('landing.app.app-jscript')
@endsection
