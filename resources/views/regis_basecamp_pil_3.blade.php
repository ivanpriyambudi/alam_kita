@extends('landing.app.app-land')

@section('title')
<title>Alam Kita | Regis Basecamp 3</title>
@endsection

@section('content')

@foreach($gunung as $gun)
@foreach($jalur as $jal)


<div class="container">
  <br><br><br><br>
  <center>
    <div class="card-panel white ak-card">

      <div class="row valig-wrapper">
        <div class="col s6">
          <a class="ak-ijo" href="{{url('/registration/basecamp/2/'.$gun->id)}}"><i class="ak-ijo material-icons left">arrow_back</i>Kembali</a>
        </div>
        <div class="col s6 right-align valign">
          <h5 class="ak-ijo">Registrasi Basecamp</h5>
          <p>MT {{$gun->nama}}, jalur {{$jal->nama}}</p>
        </div>
      </div>

      <div class="row">
        <form action="{{url('/registration/basecamp/action/'.$gun->id.'/'.$jal->id)}}" method="POST" enctype="multipart/form-data" class="col s12">
          @csrf
          <div class="row">

            <div class="col s6" style="padding-right: 30px;">

              <div class="input-field ak-field">
                <input name="nama" id="nama" type="text" class="validate">
                <label for="nama">Nama Camp</label>
              </div>

              <div class="input-field ak-field">
                <input name="email" id="email" type="email" class="validate">
                <label for="email">Email</label>
              </div>

              <div class="input-field ak-field">
                <input name="password" id="password" type="password" class="validate">
                <label for="password">Password</label>
              </div>

              <div class="input-field ak-field">
                <input name="kontak" id="kontak" type="number" class="validate">
                <label for="kontak">Kontak</label>
              </div>

              <div class="file-field input-field">
                <div class="btn light-green">
                  <span>Image Camp</span>
                  <input name="image" type="file">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text" placeholder="Upload gambar">
                </div>
              </div>

            </div>

            <div class="col s6">

              <div class="input-field ak-field">
                <textarea name="alamat" id="alamat" class="materialize-textarea" style="height: 13.5em;"></textarea>
                <label for="deskripsi">Alamat</label>
              </div>

              <div class="input-field ak-field">
                <textarea name="deskripsi" id="deskripsi" class="materialize-textarea" style="height: 13.5em;"></textarea>
                <label for="deskripsi">Deskripsi</label>
              </div>


              <input type="hidden" name="gunung_id" value="{{$gun->id}}">
              <input type="hidden" name="jalur_id" value="{{$jal->id}}">
              <input type="hidden" name="status" value="{{$jal->status}}">
              <input type="hidden" name="status_camp" value="1">

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
@endforeach

@endsection

@section('script')
@include('landing.app.app-jscript2')
@endsection