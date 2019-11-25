@extends('admin.editor-admin')

@section('title')
<title>Tambah Gunung Baru | Admin</title>
@endsection

@section('content')

@section('linkKembali')
{{ url()->previous() }}
@endsection

@foreach($gunung as $gun)

@section('namaPage')
Edit Gunung {{$gun->nama}}
@endsection

<div class="container">
	<br>

	<div class="card-panel white" style="border-radius: 15px;">
		<div class="row">
			<form action="{{route('AdminInfoGunungEditAction', $gun->id)}}" method="POST" enctype="multipart/form-data" class="col s12">
				@csrf
				<div class="row">
					
					<div class="col s6" style="padding-right: 30px;">

						<div class="input-field ak-field">
							<input name="nama" id="nama" type="text" class="validate" value="{{$gun->nama}}">
							<label for="nama">Nama Gunung</label>
						</div>

						<div class="input-field ak-field">
							<input name="tinggi" id="ketinggian" type="number" class="validate" value="{{$gun->tinggi}}">
							<label for="tinggi">Ketinggian</label>
						</div>

						<div class="input-field ak-field">
							<select name="propinsi">
								<option value="" disabled selected>Pilih Propinsi</option>
								<option value="aceh" {{$gun->propinsi == 'aceh'  ? 'selected' : ''}}>Aceh</option>
								<option value="Sumut" {{$gun->propinsi == 'Sumut'  ? 'selected' : ''}}>Sumatera Utara</option>
								<option value="sumbar" {{$gun->propinsi == 'sumbar'  ? 'selected' : ''}}>Sumatera Barat</option>
								<option value="Riau" {{$gun->propinsi == 'Riau'  ? 'selected' : ''}}>Riau</option>
								<option value="Jambi" {{$gun->propinsi == 'Jambi'  ? 'selected' : ''}}>Jambi</option>
								<option value="Sumsel" {{$gun->propinsi == 'Sumsel'  ? 'selected' : ''}}>Sumatera Selatan</option>
								<option value="Bengkulu" {{$gun->propinsi == 'Bengkulu'  ? 'selected' : ''}}>Bengkulu</option>
								<option value="Lampung" {{$gun->propinsi == 'Lampung'  ? 'selected' : ''}}>Lampung</option>
								<option value="BaBel" {{$gun->propinsi == 'BaBel'  ? 'selected' : ''}}>Kep. Bangka Belitung</option>
								<option value="kepRiau"{{$gun->propinsi == 'kepRiau'  ? 'selected' : ''}}>Kepulauan Riau</option>
								<option value="Jakarta" {{$gun->propinsi == 'Jakarta'  ? 'selected' : ''}}>Jakarta</option>
								<option value="Jabar" {{$gun->propinsi == 'Jabar'  ? 'selected' : ''}}>Jawa Barat</option>
								<option value="Banten" {{$gun->propinsi == 'Banten'  ? 'selected' : ''}}>Banten</option>
								<option value="Jateng" {{$gun->propinsi == 'Jateng'  ? 'selected' : ''}}>Jawa Tengah</option>
								<option value="Yogyakarta" {{$gun->propinsi == 'Yogyakarta'  ? 'selected' : ''}}>Yogyakarta</option>
								<option value="Jatim" {{$gun->propinsi == 'Jatim'  ? 'selected' : ''}}>Jawa Timur</option>
								<option value="Kalbar" {{$gun->propinsi == 'Kalbar'  ? 'selected' : ''}}>Kalimantan Barat</option>
								<option value="Kalteng" {{$gun->propinsi == 'Kalteng'  ? 'selected' : ''}}>Kalimantan Tengah</option>
								<option value="Kalsel" {{$gun->propinsi == 'Kalsel'  ? 'selected' : ''}}>Kalimantan Selatan</option>
								<option value="Kaltim" {{$gun->propinsi == 'Kaltim'  ? 'selected' : ''}}>Kalimantan Timur</option>
								<option value="Kaltra" {{$gun->propinsi == 'Kaltra'  ? 'selected' : ''}}>Kalimantan Utara</option>
								<option value="Bali" {{$gun->propinsi == 'Bali'  ? 'selected' : ''}}>Bali</option>
								<option value="NTT" {{$gun->propinsi == 'NTT'  ? 'selected' : ''}}>Nusa Tenggara Timur</option>
								<option value="NTB" {{$gun->propinsi == 'NTB'  ? 'selected' : ''}}>Nusa Tenggara Barat</option>
								<option value="Sulut" {{$gun->propinsi == 'Sulut'  ? 'selected' : ''}}>Sulawesi Utara</option>
								<option value="Sulteng" {{$gun->propinsi == 'Sulteng'  ? 'selected' : ''}}>Sulawesi Tengah</option>
								<option value="Sulsel" {{$gun->propinsi == 'Sulsel'  ? 'selected' : ''}}>Sulawesi Selatan</option>
								<option value="Sultengg" {{$gun->propinsi == 'Sultengg'  ? 'selected' : ''}}>Sulawesi Tenggara</option>
								<option value="Sulbar" {{$gun->propinsi == 'Sulbar'  ? 'selected' : ''}}>Sulawesi Barat</option>
								<option value="Gorontalo" {{$gun->propinsi == 'Gorontalo'  ? 'selected' : ''}}>Gorontalo</option>
								<option value="Maluku" {{$gun->propinsi == 'Maluku'  ? 'selected' : ''}}>Maluku</option>
								<option value="Maluku Utara" {{$gun->propinsi == 'Maluku Utara'  ? 'selected' : ''}}>Maluku Utara</option>
								<option value="Papua" {{$gun->propinsi == 'Papua'  ? 'selected' : ''}}>Papua</option>
								<option value="Papua Barat" {{$gun->propinsi == 'Papua Barat'  ? 'selected' : ''}}>Papua Barat</option>
							</select>
							<label>Propinsi</label>
						</div>

						<div class="input-field ak-field">
							<input name="kota" id="kota" type="text" class="validate" value="{{$gun->kota}}">
							<label for="kota">Kota</label>
						</div>

					</div>

					<div class="col s6">

						<div class="input-field ak-field">
							<textarea name="deskripsi" id="deskripsi" class="materialize-textarea">{{$gun->deskripsi}}</textarea>
							<label for="deskripsi">Deskripsi</label>
						</div>

						<div class="file-field input-field">
							<div class="btn light-green">
								<span>Image Gunung</span>
								<input name="foto" type="file" value="{{$gun->image}}">
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text" placeholder="Upload gambar" value="{{$gun->image}}">
							</div>
						</div>

						<input type="hidden" name="status" value="{{$gun->status}}">
						<input type="hidden" name="id" value="{{$gun->id}}">

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
@endsection
