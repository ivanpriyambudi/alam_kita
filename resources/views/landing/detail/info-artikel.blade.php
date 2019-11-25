@extends('landing.app.app-land')

@section('title')
@foreach($artikel as $art)
<title>Alam Kita | {{$art->judul}}</title>
@endforeach
@endsection

@section('content')

@foreach($artikel as $art)

<div class="slider" style="background-color: #fff; height: 65vh;">
	<ul class="slides" style="background-color: #fff; z-index: 0; ">
		<li style="z-index: 0;">
			<img src="{{url('/img/ban/head1.jpg')}}" style="height: 60%;"> <!-- random image -->
			<div class="animated bounceInDown caption" style="left: 15%;">
				<h2 class="white-text center-align"><b>{{$art->judul}}</b></h2>
			</div>
		</li>
	</ul>
</div>


<div style="background-color: #fff; padding: 0px 0 80px 0;">
	<div class="container">

		<center>
			<img class="materialboxed" width="650" src="{{ str_replace('public/','../../../', $art->image) }}">
		</center>
		<br>
		<div style="white-space:pre-wrap; word-wrap:break-word;"><p>{{$art->konten}}</p></div>
		<blockquote>
			<table>
				<tbody>
					<tr>
						<td><b>Tanggal Upload</b></td>
						<td>{{$art->created_at}}</td>
					</tr>
				</tbody>
			</table>
		</blockquote>
	</div>					
</div>
@endforeach

@endsection
@section('script')
@include('landing.app.app-jscript2')
@endsection
