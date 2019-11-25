@extends('admin.editor-admin')

@section('title')
<title>Tambah Pendakian Baru | Admin</title>
@endsection

@section('content')

@foreach($gunung as $gun)
@foreach($jalur as $jal)

@section('linkKembali')
{{ url()->previous() }}
@endsection

@section('namaPage')
Edit Jalur Pendakian MT {{$gun->nama}}
@endsection

<div class="container">
	<br>
	<form action="{{url('/admin/edit-jalur/action/'.$gun->id.'/'.$jal->id)}}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="card-panel white" style="border-radius: 15px;">
			<div class="row">
				<div class="col s6" style="padding-right: 30px;">
					<div class="input-field ak-field">
						<input name="nama" id="nama" type="text" class="validate" value="{{$jal->nama}}">
						<label for="nama">Nama Jalur</label>
					</div>

					<div class="input-field ak-field">
						<input name="kontak" id="kontak" type="number" class="validate" value="{{$jal->kontak}}">
						<label for="kontak">Kontak</label>
					</div>
				</div>

				<div class="col s6">
					<div class="input-field ak-field">
						<input name="tarif" id="tarif" type="number" class="validate" value="{{$jal->tarif}}">
						<label for="tarif">Tarif</label>
					</div>

					<div class="input-field ak-field">
						<input name="lokasi" id="lokasi" type="text" class="validate" value="{{$jal->lokasi}}">
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
						<textarea name="akses" id="akses" class="materialize-textarea" style="height: 6rem;">{{$jal->akses}}
						</textarea>
						<label for="akses">Akses</label>
					</div>

					<div class="input-field ak-field">
						<textarea name="deskripsi" id="deskripsi" class="materialize-textarea" style="height: 6rem;">{{$jal->deskripsi}}
						</textarea>
						<label for="deskripsi">Deskripsi</label>
					</div>
				</div>
				<div class="col s6">
					<div class="file-field input-field ak-field">
						<div class="btn light-green">
							<span>Image Peta</span>
							<input name="peta" type="file" value="{{$jal->peta}}">
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text" placeholder="Upload Image Peta" value="{{$jal->peta}}">
						</div>
					</div>
				</div>
				<div class="col s6">
					<div class="file-field input-field ak-field">
						<div class="btn light-green">
							<span>Image Jalur</span>
							<input name="foto" type="file" value="{{$jal->image}}">
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text" placeholder="Upload Image Jalur" value="{{$jal->image}}">
						</div>
					</div>
				</div>
			</div>

			<div class="col s12">
				<input type="hidden" name="status" value="{{$jal->status}}">
				<input type="hidden" name="estimasi" value="{{$jal->estimasi}}">
				<input type="hidden" name="gunung_id" value="{{$gun->id}}">
				<input type="hidden" name="id" value="{{$jal->id}}">
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
@endforeach

@endsection
