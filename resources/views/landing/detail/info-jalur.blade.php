@extends('landing.app.app-land')

@section('title')
@foreach($jalur as $jal)
<title>Alam Kita | {{$jal->nama}}</title>
@endforeach
@endsection

@section('content')

@foreach($jalur as $jal)

@foreach($gunung as $gun)

<div class="slider" style="background-color: #fff; height: 65vh;">
	<ul class="slides" style="background-color: #fff; z-index: 0; ">
		<li style="z-index: 0;">
			<img src="{{url('/img/ban/head1.jpg')}}" style="height: 60%;"> <!-- random image -->
			<div class="animated bounceInDown caption" style="left: 15%;">
				<h2 class="white-text center-align"><b>{{$gun->nama}}, jalur {{$jal->nama}}</b></h2>
			</div>
		</li>
	</ul>
</div>


<div style="background-color: #fff; padding: 0px 0 80px 0;">
	<div class="container">

		<div class="row">
			<div class="col s3">
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
					</tbody>
				</table>

				<br>
				

			</div>
			<div class="col s9">
				@auth('user')
				{{-- <a href="{{url('/petualangan/add/')}}" class="waves-effect waves-light btn"><i class="material-icons right">add</i>Tambah Petualangan</a> --}}

				<a href="{{url('/user/petualangan/'.$gun->id.'/'.$jal->id)}}" class="waves-effect waves-light btn"><i class="material-icons right">add</i>Tambah Petualangan</a>
				@endauth

				<br><br>
				<img class="materialboxed" width="650" src="{{ str_replace('public/','../../../', $jal->image) }}">
				<br>
				<blockquote>
					<b><h5>Deskripsi</h5></b>
					<div style="white-space:pre-wrap; word-wrap:break-word;"><p>{{$jal->deskripsi}}</p></div>
				</blockquote>
				<br>
				<blockquote>
					<b><h5>Akses</h5></b>
					<div style="white-space:pre-wrap; word-wrap:break-word;"><p>{{$jal->akses}}</p></div>
				</blockquote>
				<br>
				<blockquote>
					<b><h5>Peta Pendakian</h5></b>
					<img class="materialboxed" width="650" src="{{ str_replace('public/','../../../', $jal->peta) }}">
				</blockquote>

				<hr>

				
				<b><h5>Detail Pendakian</h5></b>
				
				<table class="highlight">

					<tbody>
						@foreach($pos as $po)
						<tr>
							<td>
								<h5>Pos {{$po->no_pos}} : {{$po->nama}}, estimasi {{$po->estimasi}} jam</h5>
								<br>
								<img class="materialboxed" width="650" src="{{ str_replace('public/','../../../', $po->image) }}">
								<br>
								<p>{{$po->deskripsi}}</p>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>


			</div>


		</div>
	</div>					
</div>

@endforeach

@endforeach

@endsection
@section('script')
@include('landing.app.app-jscript2')
@endsection
