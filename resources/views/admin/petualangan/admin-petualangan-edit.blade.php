@extends('admin.editor-admin')

@section('title')
<title>Alam Kita | Edit Petiualangan</title>
@endsection

@section('content')

@foreach($petualangan as $pet)

@section('linkKembali')
{{ url()->previous() }}
@endsection

@section('namaPage')
Edit Petualangan 
MT {{ \App\Gunung::where(['id' => $pet->gunung_id])->value('nama')}}, 
jalur {{ \App\Jalur::where(['id' => $pet->jalur_id])->value('nama')}}
@endsection

<div class="container">
	<br><br><br><br>
	<center>
		<div class="card-panel white ak-card">

			<div class="row">
				<form action="{{route('AdminEditActionPetualangan', $pet->id)}}" method="POST" enctype="multipart/form-data" class="col s12">
					@csrf
					<div class="row">

						<div class="col s12" style="padding-right: 30px;">

							<div class="input-field ak-field">
								<input name="waktu" type="text" class="datepicker" value="{{$pet->waktu}}">
								<label>Tanggal Petuangan</label>
							</div>

							<div class="input-field ak-field">
								<textarea name="tempat" id="tempat" class="materialize-textarea" style="height: 13.5em;">{{$pet->tempat}}</textarea>
								<label for="tempat">Tempat Kumpul</label>
							</div>

							<div class="input-field ak-field">
								<textarea name="deskripsi" id="deskripsi" class="materialize-textarea" style="height: 13.5em;">{{$pet->deskripsi}}</textarea>
								<label for="deskripsi">Deskripsi</label>
							</div>

							<input type="hidden" name="gunung_id" value="{{$pet->gunung_id}}">
							<input type="hidden" name="jalur_id" value="{{$pet->jalur_id}}">
							<input type="hidden" name="user_id" value="{{$pet->user_id}}">
							<input type="hidden" name="status" value="{{$pet->status}}">
							<input type="hidden" name="id" value="{{$pet->id}}">

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
	</center>
	<br><br><br><br>
</div>

@endforeach


@endsection