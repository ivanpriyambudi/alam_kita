@extends('landing.app.app-land')

@section('title')
@foreach($gunung as $gun)
<title>Alam Kita | {{$gun->nama}}</title>
@endforeach
@endsection

@section('content')

@foreach($gunung as $gun)

<div class="slider" style="background-color: #fff; height: 65vh;">
	<ul class="slides" style="background-color: #fff; z-index: 0; ">
		<li style="z-index: 0;">
			<img src="{{url('/img/ban/head1.jpg')}}" style="height: 60%;"> <!-- random image -->
			<div class="animated bounceInDown caption" style="left: 15%;">
				<h2 class="white-text center-align"><b>{{$gun->nama}}</b></h2>
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
					</tbody>
				</table>

			</div>
			<div class="col s9">

				<img class="materialboxed" src="{{ str_replace('public/','../../../', $gun->image) }}">
				<br>
				<blockquote>
					<b><h5>Deskripsi</h5></b>
					<div style="white-space:pre-wrap; word-wrap:break-word;"><p>{{$gun->deskripsi}}</p></div>
				</blockquote>
				<br><br>
				<blockquote>
					<b><h5>Jalur Pendakian</h5></b>
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
								<td ><div class="ak-detail"><a href="{{url('/info-jalur/detail/')}}{{'/'.$jal->gunung_id.'/'.$jal->id}}">{{$jal->nama}}</a></div></td>
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
				</blockquote>

			</div>


		</div>
	</div>					
</div>
@endforeach

@endsection
@section('script')
@include('landing.app.app-jscript2')
@endsection
