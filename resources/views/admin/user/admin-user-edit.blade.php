@extends('admin.editor-admin')

@section('title')
<title>Admin | Edit User</title>
@endsection

@section('content')

@foreach($user as $use)

@section('linkKembali')
{{ url()->previous() }}
@endsection

@section('namaPage')
Edit User {{$use->name}}
@endsection

<div class="container">
	<br><br>
	<div class="card-panel white ak-card">

		<form action="{{route('AdminEditActionUser', $use->id)}}" method="post" enctype="multipart/form-data">
			@csrf

			<div class="row">

				<div class="col s6" style="padding-right: 50px;">

					<div class="input-field ak-field">
						<input name="name" id="name" type="text" class="validate" value="{{$use->name}}">
						<label for="name">Nama</label>
					</div>

					<div class="input-field ak-field">
						<input name="email" id="email" type="email" class="validate" value="{{$use->email}}">
						<label for="email">Email</label>
					</div>

					<div class="input-field ak-field">
						<input name="password" id="password" type="password" class="validate" value="{{$use->password}}">
						<label for="password">Password</label>
					</div>

					<div class="input-field ak-field">
						<select name="kelamin">
							<option value="" disabled selected>Pilih Jenis Kelamin</option>
							<option value="laki-laki" {{$use->kelamin == 'laki-laki'  ? 'selected' : ''}}>Laki-laki</option>
							<option value="perempuan" {{$use->kelamin == 'perempuan'  ? 'selected' : ''}}>Perempuan</option>
						</select>
						<label>Jenis Kelamin</label>
					</div>

				</div>

				<div class="col s6">

					<div class="input-field ak-field">
						<input name="tgl_lahir" type="text" class="datepicker" value="{{$use->tgl_lahir}}">
						<label>Tanggal Lahir</label>
					</div>

					<div class="input-field ak-field">
						<textarea name="alamat" id="alamat" class="materialize-textarea" style="height: 13.5em;">{{$use->alamat}}</textarea>
						<label for="alamat">Alamat</label>
					</div>

					<div class="file-field input-field">
						<div class="btn light-green">
							<span>Image User</span>
							<input name="image" type="file" value="{{$use->image}}">
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text" placeholder="Upload gambar" value="{{$use->image}}">
						</div>
					</div>

					<div class="input-field ak-field">
						<input name="tempat_lahir" id="tempat_lahir" type="text" class="validate" value="{{$use->tempat_lahir}}">
						<label for="name">Tempat Lahir</label>
					</div>

					<div class="input-field ak-field">
						<input name="kontak" id="kontak" type="number" class="validate" value="{{$use->kontak}}">
						<label for="name">Kontak</label>
					</div>

					<div class="input-field ak-field">
						<textarea name="deskripsi" id="deskripsi" class="materialize-textarea" style="height: 13.5em;">{{$use->deskripsi}}</textarea>
						<label for="alamat">Deskripsi</label>
					</div>

					<input type="hidden" name="id" value="{{$use->id}}">

				</div>

				<div class="col s12">
					<center>
						<button type="submit" class="waves-effect ak-button btn" style="width: 75%;">Submit</button>
					</center>
				</div>

			</div>
		</form>
	</div>
	<br><br>
</div>

@endforeach

@endsection