@extends('admin.editor-admin')

@section('title')
<title>Edit Camp Baru | Admin</title>
@endsection

@section('content')

@foreach($camp as $cam)
@foreach($gunung as $gun)
@foreach($jalur as $jal)

@section('linkKembali')
{{ url()->previous() }}
@endsection

@section('namaPage')
Edit Camp MT {{$gun->nama}}, Jalur {{$jal->nama}}
@endsection

<div class="container">
	<br>

	<div class="card-panel white" style="border-radius: 15px;">
		<div class="row">
			<form action="{{url('/admin/camp/editcamp/action/'.$gun->id.'/'.$jal->id.'/'.$cam->id)}}" method="POST" enctype="multipart/form-data" class="col s12">
				@csrf
				<div class="row">
					
					<div class="col s6" style="padding-right: 30px;">

						<div class="input-field ak-field">
							<input name="nama" id="nama" type="text" class="validate" value="{{$cam->nama}}">
							<label for="nama">Nama Camp</label>
						</div>

						<div class="input-field ak-field">
							<input name="email" id="email" type="email" class="validate" value="{{$cam->email}}">
							<label for="email">Email</label>
						</div>

						<div class="input-field ak-field">
							<input name="password" id="password" type="password" class="validate" value="{{$cam->password}}">
							<label for="password">Password</label>
						</div>

						<div class="input-field ak-field">
							<input name="kontak" id="kontak" type="number" class="validate" value="{{$cam->kontak}}">
							<label for="kontak">Kontak</label>
						</div>

						<div class="file-field input-field">
							<div class="btn light-green">
								<span>Image Camp</span>
								<input name="image" type="file" value="{{$cam->image}}">
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text" placeholder="Upload gambar" value="{{$cam->image}}">
							</div>
						</div>
						
					</div>

					<div class="col s6">

						<div class="input-field ak-field">
							<textarea name="alamat" id="alamat" class="materialize-textarea" style="height: 13.5em;">{{$cam->alamat}}</textarea>
							<label for="deskripsi">Alamat</label>
						</div>

						<div class="input-field ak-field">
							<textarea name="deskripsi" id="deskripsi" class="materialize-textarea" style="height: 13.5em;">{{$cam->deskripsi}}</textarea>
							<label for="deskripsi">Deskripsi</label>
						</div>


						<input type="hidden" name="gunung_id" value="{{$gun->id}}">
						<input type="hidden" name="jalur_id" value="{{$jal->id}}">
						<input type="hidden" name="status" value="{{$jal->status}}">
						<input type="hidden" name="status_camp" value="{{$jal->status_camp}}">
						<input type="hidden" name="id" value="{{$cam->id}}">

					</div>

				</div>

				<div class="col s12">

					<center>
						<button type="submit" class="waves-effect ak-button btn" style="width: 75%;">Submit</button>
					</center>

				</div>

			</form>
		</div>
	</div>

</div>

@endforeach
@endforeach
@endforeach

@endsection
