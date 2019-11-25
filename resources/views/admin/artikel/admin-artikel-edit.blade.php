@extends('admin.editor-admin')

@section('title')
<title>Edit Artikel | Admin</title>
@endsection

@section('content')

@foreach($artikel as $art)

@section('linkKembali')
{{ url()->previous() }}
@endsection

@section('namaPage')
Edit Artikel {{$art->judul}}
@endsection

<div class="container">
	<br>

	<div class="card-panel white" style="border-radius: 15px;">
		<div class="row">
			<form action="{{url('/admin/artikel/edit-artikel/action/'.$art->id)}}" method="POST" enctype="multipart/form-data" class="col s12">
				@csrf
				<div class="row">
					
					<div class="col s12">
						<div class="input-field ak-field">
							<input name="judul" id="judul" type="text" class="validate" value="{{$art->judul}}">
							<label for="judul">Judul Artikel</label>
						</div>

						<div class="input-field ak-field">
							<textarea name="konten" id="konten" class="materialize-textarea" style="height: 120px;">{{$art->konten}}</textarea>
							<label for="konten">Konten</label>
						</div>

						<div class="file-field input-field">
							<div class="btn light-green">
								<span>Image Artikel</span>
								<input name="image" type="file" value="{{$art->image}}">
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text" placeholder="Upload Image Artikel" value="{{$art->image}}">
							</div>
						</div>

						<input type="hidden" name="id" value="{{$art->id}}">

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
