@extends('admin.app-admin')

@section('title')
<title>Artikel | Admin</title>
@endsection

@section('content')


@foreach($artikel as $art)
{{-- breadcumb --}}
@section('Breadcumb')
<a href="{{route('ArtikelView')}}" class="breadcrumb">Artikel</a>
<a href="#!" class="breadcrumb">{{$art->judul}}</a>
@endsection
@endforeach


@section('KananBreadcumb')

<div class="col s6">
	<form method="POST" action="{{route('ArtikelDeleteAction', $art->id)}}">
		@csrf
		<button type="submit" class="waves-effect ak-del ak-bor-bot no-shadow2 btn-flat"><i class="material-icons left">delete_forever</i>Hapus</button>
	</form>
</div>
<div class="col s6">
	<a class="waves-effect ak-ed ak-bor-bot no-shadow2 btn-flat" href="{{route('ArtikelEditView', $art->id)}}"><i class="material-icons left">edit</i>Edit</a>
</div>

@endsection
{{-- breadcumb --}}

@foreach($artikel as $art)
<div class="row">
	<div class="col s8" style="padding-right: 0;">
		<div class="ak-admin-container" style="margin-bottom: 10px;">
			<div class="card-panel white no-shadow2 ak-card">

				<div class="row">
					<div class="col s8" style="padding-left: 0;">
						<h6 class="ak-label">Judul</h6>
					</div>
					<div class="col s12">
						<h5>{{$art->judul}}</h5>
					</div>
				</div>
			</div>
		</div>

		<div class="ak-admin-container" style="margin-bottom: 10px;">
			<div class="card-panel white no-shadow2 ak-card">

				<div class="row">
					<div class="col s8" style="padding-left: 0;">
						<h6 class="ak-label">Konten</h6>
					</div>
				</div>

				<div class="row">
					<br>
					<div class="col s12">
						<p>{{$art->konten}}</p>
					</div>
				</div>

			</div>
		</div>
	</div>
	<div class="col s4" style="padding-left: 0;">
		<div class="col s12" style="padding-left: 0;">
			<div class="ak-admin-container" style="margin-bottom: 10px;">
			<div class="card-panel white no-shadow2 ak-card">

				<div class="row">
					<div class="col s8" style="padding-left: 0;">
						<h6 class="ak-label">Data</h6>
					</div>
				</div>

				<div class="row">
					<div class="col s12">
						<table>
						<tbody>
							<tr>
								<td><b>Tanggal Upload</b></td>
								<td>{{$art->created_at}}</td>
							</tr>
							<tr>
								<td><b>Tanggal Edit</b></td>
								<td>{{$art->updated_at}}</td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
				
			</div>
		</div>
		</div>
		<div class="col s12" style="padding-left: 0;">
			<div class="ak-admin-container" style="margin-bottom: 10px;">
			<div class="card-panel white no-shadow2 ak-card">

				<div class="row">
					<div class="col s8" style="padding-left: 0;">
						<h6 class="ak-label">Image</h6>
					</div>
				</div>

				<div class="row">
					<br>
					<div class="col s12">
						<center>
						<img class="materialboxed z-depth-2" width="200" src="{{ str_replace('public/','../../../', $art->image) }}">
						</center>
					</div>
				</div>
				
			</div>
		</div>
		</div>
	</div>
</div>
@endforeach
<br>



@endsection
