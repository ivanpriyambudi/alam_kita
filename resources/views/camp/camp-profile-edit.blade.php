@extends('landing.app.app-land')

@section('title')
<title>Alam Kita | Regis Basecamp 3</title>
@endsection

@section('content')

@foreach($user as $use)

<div class="container">
  <br><br><br><br>
  <center>
    <div class="card-panel white ak-card">

      <div class="row valig-wrapper">
        <div class="col s6">
          <a class="ak-ijo" href="{{ url()->previous() }}"><i class="ak-ijo material-icons left">arrow_back</i>Kembali</a>
        </div>
        <div class="col s6 right-align valign">
          <h5 class="ak-ijo">Edit Basecamp</h5>
          <p>MT {{ \App\Gunung::where(['id' => $use->gunung_id])->value('nama')}}, jalur {{ \App\Jalur::where(['id' => $use->jalur_id])->value('nama')}}</p>
        </div>
      </div>

      <div class="row">
        <form action="{{route('CampProfileEditAction', $use->id)}}" method="POST" enctype="multipart/form-data" class="col s12">
          @csrf
          <div class="row">

            <div class="col s6" style="padding-right: 30px;">

              <div class="input-field ak-field">
                <input name="nama" id="nama" type="text" class="validate" value="{{$use->nama}}">
                <label for="nama">Nama Camp</label>
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
                <input name="kontak" id="kontak" type="number" class="validate" value="{{$use->kontak}}">
                <label for="kontak">Kontak</label>
              </div>

              <div class="file-field input-field">
                <div class="btn light-green">
                  <span>Image Camp</span>
                  <input name="image" type="file" value="{{$use->image}}">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text" placeholder="Upload gambar" value="{{$use->image}}">
                </div>
              </div>

            </div>

            <div class="col s6">

              <div class="input-field ak-field">
                <textarea name="alamat" id="alamat" class="materialize-textarea" style="height: 13.5em;">{{$use->alamat}}</textarea>
                <label for="deskripsi">Alamat</label>
              </div>

              <div class="input-field ak-field">
                <textarea name="deskripsi" id="deskripsi" class="materialize-textarea" style="height: 13.5em;">{{$use->deskripsi}}</textarea>
                <label for="deskripsi">Deskripsi</label>
              </div>


              <input type="hidden" name="gunung_id" value="{{$use->gunung_id}}">
              <input type="hidden" name="jalur_id" value="{{$use->jalur_id}}">
              <input type="hidden" name="status" value="{{$use->status}}">
              <input type="hidden" name="id" value="{{$use->id}}">

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

@section('script')
@include('landing.app.app-jscript2')
@endsection