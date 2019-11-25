@extends('landing.app.app-land')

@section('title')
<title>Alam Kita | Add Petiualangan</title>
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
          <a class="ak-ijo" href="{{ url()->previous() }}"><i class="ak-ijo material-icons left">arrow_back</i>Kembali</a>
        </div>
        <div class="col s6 right-align valign">
          <h5 class="ak-ijo">Tambah Petualangan</h5>
          <p>MT {{$gun->nama}}, jalur {{$jal->nama}}</p>
        </div>
      </div>

      <div class="row">
        <form action="{{route('PetualnganAddAction')}}" method="POST" enctype="multipart/form-data" class="col s12">
          @csrf
          <div class="row">

            <div class="col s12" style="padding-right: 30px;">

              <div class="input-field ak-field">
                <input name="waktu" type="text" class="datepicker">
                <label>Tanggal Petuangan</label>
              </div>

              <div class="input-field ak-field">
                <textarea name="tempat" id="tempat" class="materialize-textarea" style="height: 13.5em;"></textarea>
                <label for="tempat">Tempat Kumpul</label>
              </div>

              <div class="input-field ak-field">
                <textarea name="deskripsi" id="deskripsi" class="materialize-textarea" style="height: 13.5em;"></textarea>
                <label for="deskripsi">Deskripsi</label>
              </div>

              <input type="hidden" name="gunung_id" value="{{$gun->id}}">
              <input type="hidden" name="jalur_id" value="{{$jal->id}}">
              <input type="hidden" name="user_id" value="{{Auth::guard('user')->user()->id}}">
              <input type="hidden" name="status" value="pending">

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