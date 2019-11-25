@extends('admin.app-admin')

@section('title')
<title>Detail Pos | Admin</title>
@endsection

@section('content')

@foreach($pos as $po)
@foreach($jalur as $jal)
@foreach($gunung as $gun)

{{-- breadcumb --}}
@section('Breadcumb')
<a href="{{url('/admin/info-gunung')}}" class="breadcrumb">Info Gunung</a>
<a href="{{route('AdminInfoGunungDetail', $gun->id)}}" class="breadcrumb">{{$gun->nama}}</a>
<a href="{{url('/admin/detail-jalur/')}}{{'/'.$jal->gunung_id.'/'.$jal->id}}" class="breadcrumb">{{$jal->nama}}</a>
<a href="{{url('/admin/detail-jalur/')}}{{'/'.$po->gunung_id.'/'.$po->jalur_id.'/'.$po->id}}" class="breadcrumb">{{$po->nama}}</a>
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
					<form method="POST" action="{{url('/admin/delete-pos/'.$gun->id.'/'.$jal->id.'/'.$po->id)}}">
						@csrf
						<button type="submit" class="waves-effect ak-del ak-bor-bot no-shadow2 btn-flat"><i class="material-icons left">delete_forever</i>Hapus</button>
					</form>
				</div>
				<div class="col s6">
					<a class="waves-effect ak-ed ak-bor-bot no-shadow2 btn-flat modal-trigger" href="#editPos"><i class="material-icons left">edit</i>Edit</a>
				</div>
			</div>
		</div>

		<div class="row valign-wrapper">
			<br>
			<div class="col s7">
				<br>
				<h6>Pendakian MT {{$gun->nama}}, Jalur {{$jal->nama}}, Pos {{$po->nama}}</h6>
				<br>
				<blockquote>
					<table>
						<tbody>
							<tr>
								<td><b>Pos Ke : </b></td>
								<td>{{$po->no_pos}}</td>
							</tr>
							<tr>
								<td><b>Estimasi</b></td>
								<td>{{$po->estimasi}} Jam</td>
							</tr>
							<tr>
								<td><b>Deskripsi</b></td>
								<td style="white-space:pre-wrap; word-wrap:break-word;">
									<p>{{$po->deskripsi}}<p>
									</td>
								</tr>
							</tbody>
						</table>
					</blockquote>	
				</div>
				<div class="col s5 valign">
					<center>
						<h6><b>Foto Pos :</b></h6>
						<img class="materialboxed z-depth-2" width="280" src="{{ str_replace('public/','../../../../', $po->image) }}">
					</center>
				</div>
			</div>
		</div>

	</div>
	<br>

@include('admin.app-modal')

	@endforeach
	@endforeach
	@endforeach
	@endsection
