{{-- modal add Pos --}}
<div id="addPos" class="modal">
	<div class="modal-content">

		<div class="row valign-wrapper">
			<div class="col s6" style="padding-left: 0px;">
				<h5 class="ak-label">Tambah Pos Baru</h5>
			</div>
			<div class="col s6 valign" style="padding-left: 0px;">
				<h6>Pendakian MT {{$gun->nama}} Jalur {{$jal->nama}}</h6>
			</div>
		</div>

		<form action="{{route('AdminAddPosAction')}}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="col s6" style="padding-right: 30px;">
					<div class="input-field ak-field">
						<input name="no_pos" id="no_pos" type="number" class="validate">
						<label for="no_pos">Pos Ke- </label>
					</div>
					<div class="input-field ak-field">
						<input name="nama" id="nama" type="text" class="validate">
						<label for="nama">Nama Pos</label>
					</div>
				</div>
				<div class="col s6">
					<div class="input-field ak-field">
						<input name="estimasi" id="estimasi" type="number" class="validate">
						<label for="estimasi">Estimasi</label>
					</div>
					<div class="file-field input-field ak-field">
						<div class="btn light-green">
							<span>Image Pos</span>
							<input name="foto" type="file">
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text" placeholder="Upload Image Pos">
						</div>
					</div>

					<input type="hidden" name="jalur_id" value="{{$jal->id}}">
					<input type="hidden" name="gunung_id" value="{{$gun->id}}">

				</div>

				<div class="col s12">
					<div class="input-field ak-field">
						<textarea name="deskripsi" id="deskripsi" class="materialize-textarea" style="height: 20%;"></textarea>
						<label for="deskripsi">Deskripsi</label>
					</div>
				</div>
			</div>
			<center>
				<button type="submit" class="waves-effect ak-button btn" style="width: 75%;">Submit</button>
			</center>
			<br>
		</form>

	</div>
</div>
{{-- /modal add Pos --}}

{{-- modal edit Pos --}}
@foreach($pos as $po)
<div id="editPos" class="modal">
	<div class="modal-content">

		<div class="row valign-wrapper">
			<div class="col s6" style="padding-left: 0px;">
				<h5 class="ak-label">Edit Pos {{$po->nama}}</h5>
			</div>
			<div class="col s6 valign" style="padding-left: 0px;">
				<h6>Pendakian MT {{$gun->nama}} Jalur {{$jal->nama}}</h6>
			</div>
		</div>

		<form action="{{url('/admin/edit-pos/action/'.$gun->id.'/'.$jal->id.'/'.$po->id)}}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="col s6" style="padding-right: 30px;">
					<div class="input-field ak-field">
						<input name="no_pos" id="no_pos" type="number" class="validate" value="{{$po->no_pos}}">
						<label for="no_pos">Pos Ke- </label>
					</div>
					<div class="input-field ak-field">
						<input name="nama" id="nama" type="text" class="validate" value="{{$po->nama}}">
						<label for="nama">Nama Pos</label>
					</div>
				</div>
				<div class="col s6">
					<div class="input-field ak-field">
						<input name="estimasi" id="estimasi" type="number" class="validate" value="{{$po->estimasi}}">
						<label for="estimasi">Estimasi</label>
					</div>
					<div class="file-field input-field ak-field">
						<div class="btn light-green">
							<span>Image Pos</span>
							<input name="foto" type="file" value="{{$po->image}}">
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text" placeholder="Upload Image Pos" value="{{$po->image}}">
						</div>
					</div>

					<input type="hidden" name="jalur_id" value="{{$jal->id}}">
					<input type="hidden" name="gunung_id" value="{{$gun->id}}">
					<input type="hidden" name="id" value="{{$po->id}}">

				</div>

				<div class="col s12">
					<div class="input-field ak-field">
						<textarea name="deskripsi" id="deskripsi" class="materialize-textarea" style="height: 20%;">{{$po->deskripsi}}</textarea>
						<label for="deskripsi">Deskripsi</label>
					</div>
				</div>
			</div>
			<center>
				<button type="submit" class="waves-effect ak-button btn" style="width: 75%;">Submit</button>
			</center>
			<br>
		</form>

	</div>
</div>
@endforeach
	{{-- /modal edit Pos --}}