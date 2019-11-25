@extends('admin.editor-admin')

@section('title')
<title>Tambah Gunung Baru | Admin</title>
@endsection

@section('content')

@section('linkKembali')
{{ url()->previous() }}
@endsection

@section('namaPage')
Tambah Gunung Baru
@endsection

<div class="container">
	<br>

	<div class="card-panel white" style="border-radius: 15px;">
		<div class="row">
			<form action="{{route('AdminInfoGunungAddAction')}}" method="POST" enctype="multipart/form-data" class="col s12">
				@csrf
				<div class="row">
					
					<div class="col s6" style="padding-right: 30px;">

						<div class="input-field ak-field">
							<input name="nama" id="nama" type="text" class="validate">
							<label for="nama">Nama Gunung</label>
						</div>

						<div class="input-field ak-field">
							<input name="tinggi" id="ketinggian" type="number" class="validate">
							<label for="tinggi">Ketinggian</label>
						</div>

						<div class="input-field ak-field">
							<select name="propinsi">
								<option value="" disabled selected>Pilih Propinsi</option>
								<option value="aceh">Aceh</option>
								<option value="Sumut">Sumatera Utara</option>
								<option value="sumbar">Sumatera Barat</option>
								<option value="Riau">Riau</option>
								<option value="Jambi">Jambi</option>
								<option value="Sumsel">Sumatera Selatan</option>
								<option value="Bengkulu">Bengkulu</option>
								<option value="Lampung">Lampung</option>
								<option value="BaBel">Kep. Bangka Belitung</option>
								<option value="kepRiau">Kepulauan Riau</option>
								<option value="Jakarta">Jakarta</option>
								<option value="Jabar">Jawa Barat</option>
								<option value="Banten">Banten</option>
								<option value="Jateng">Jawa Tengah</option>
								<option value="Yogyakarta">Yogyakarta</option>
								<option value="Jatim">Jawa Timur</option>
								<option value="Kalbar">Kalimantan Barat</option>
								<option value="Kalteng">Kalimantan Tengah</option>
								<option value="Kalsel">Kalimantan Selatan</option>
								<option value="Kaltim">Kalimantan Timur</option>
								<option value="Kaltra">Kalimantan Utara</option>
								<option value="Bali">Bali</option>
								<option value="NTT">Nusa Tenggara Timur</option>
								<option value="NTB">Nusa Tenggara Barat</option>
								<option value="Sulut">Sulawesi Utara</option>
								<option value="Sulteng">Sulawesi Tengah</option>
								<option value="Sulsel">Sulawesi Selatan</option>
								<option value="Sultengg">Sulawesi Tenggara</option>
								<option value="Sulbar">Sulawesi Barat</option>
								<option value="Gorontalo">Gorontalo</option>
								<option value="Maluku">Maluku</option>
								<option value="Maluku Utara">Maluku Utara</option>
								<option value="Papua">Papua</option>
								<option value="Papua Barat">Papua Barat</option>
							</select>
							<label>Propinsi</label>
						</div>

						<div class="input-field ak-field">
							<input name="kota" id="kota" type="text" class="validate">
							<label for="kota">Kota</label>
						</div>

					</div>

					<div class="col s6">

						<div class="input-field ak-field">
							<textarea name="deskripsi" id="deskripsi" class="materialize-textarea" style="height: 17.5em;"></textarea>
							<label for="deskripsi">Deskripsi</label>
						</div>

						<div class="file-field input-field">
							<div class="btn light-green">
								<span>Image Gunung</span>
								<input name="foto" type="file">
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text" placeholder="Upload gambar">
							</div>
						</div>

						<input type="hidden" name="status" value="tutup">

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

@endsection
