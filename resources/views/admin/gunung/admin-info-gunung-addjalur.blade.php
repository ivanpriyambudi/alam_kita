@extends('admin.editor-admin')

@section('title')
<title>Tambah Pendakian Baru | Admin</title>
@endsection

@section('content')

@foreach($gunung as $gun)

@section('linkKembali')
{{ url()->previous() }}
@endsection

@section('namaPage')
Tambah Jalur Pendakian MT {{$gun->nama}}
@endsection

<div class="container">
	<br>
	<form action="{{route('AdminAddJalurAction')}}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="card-panel white" style="border-radius: 15px;">
			<div class="row">
				<div class="col s6" style="padding-right: 30px;">
					<div class="input-field ak-field">
						<input name="nama" id="nama" type="text" class="validate">
						<label for="nama">Nama Jalur</label>
					</div>

					<div class="input-field ak-field">
						<input name="kontak" id="kontak" type="number" class="validate">
						<label for="kontak">Kontak</label>
					</div>
				</div>

				<div class="col s6">
					<div class="input-field ak-field">
						<input name="tarif" id="tarif" type="number" class="validate">
						<label for="tarif">Tarif</label>
					</div>

					<div class="input-field ak-field">
						<input name="lokasi" id="lokasi" type="text" class="validate">
						<label for="lokasi">Lokasi</label>
					</div>
				</div>
			</div>
		</div>
		<br>
		<div class="card-panel white" style="border-radius: 15px;">
			<div class="row">		
				<div class="col s12">
					<div class="input-field ak-field">
						<textarea name="akses" id="akses" class="materialize-textarea" style="height: 6rem;"></textarea>
						<label for="akses">Akses</label>
					</div>

					<div class="input-field ak-field">
						<textarea name="deskripsi" id="deskripsi" class="materialize-textarea" style="height: 6rem;"></textarea>
						<label for="deskripsi">Deskripsi</label>
					</div>
				</div>
				<div class="col s6">
					<div class="file-field input-field ak-field">
						<div class="btn light-green">
							<span>Image Peta</span>
							<input name="peta" type="file">
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text" placeholder="Upload Image Peta">
						</div>
					</div>
				</div>
				<div class="col s6">
					<div class="file-field input-field ak-field">
						<div class="btn light-green">
							<span>Image Jalur</span>
							<input name="foto" type="file">
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text" placeholder="Upload Image Jalur">
						</div>
					</div>
				</div>
			</div>

			<div class="col s12">
				<input type="hidden" name="status" value="tutup">
				<input type="hidden" name="estimasi" value="0">
				<input type="hidden" name="status_camp" value="0">
				<input type="hidden" name="gunung_id" value="{{$gun->id}}">
				<center>
					<button type="submit" class="waves-effect ak-button btn" style="width: 75%;">Submit</button>
				</center>
			</div>
			<br>
		</div>
		<br>
	</form>
</div>

@endforeach

@endsection
