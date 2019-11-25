@extends('admin.editor-admin')

@section('title')
<title>Tambah Artikel Baru | Admin</title>
@endsection

@section('content')

@section('linkKembali')
{{ url()->previous() }}
@endsection

@section('namaPage')
Tambah Artikel Baru
@endsection

<div class="container">
	<br>

	<div class="card-panel white" style="border-radius: 15px;">
		<div class="row">
			<form action="{{route('ArtikelAddAction')}}" method="POST" enctype="multipart/form-data" class="col s12">
				@csrf
				<div class="row">
					
					<div class="col s12">
						<div class="input-field ak-field">
							<input name="judul" id="judul" type="text" class="validate">
							<label for="judul">Judul Artikel</label>
						</div>

						<div class="input-field ak-field">
							<textarea name="konten" id="konten" class="materialize-textarea" style="height: 120px;"></textarea>
							<label for="konten">Konten</label>
						</div>

						<div class="file-field input-field">
							<div class="btn light-green">
								<span>Image Artikel</span>
								<input name="image" type="file">
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text" placeholder="Upload Image Artikel">
							</div>
						</div>

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
