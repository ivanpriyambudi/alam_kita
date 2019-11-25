@extends('landing.app.app-land')

@section('title')
<title>Alam Kita | Regis Basecamp 2</title>
@endsection

@section('content')

@foreach($gunung as $gun)
<div class="container">

  <br><br><br>
  <div class="card-panel white ak-card">

    <div class="row valig-wrapper">
      <div class="col s6">
        <a class="ak-ijo" href="{{route('regisBasecampViewPil1')}}"><i class="ak-ijo material-icons left">arrow_back</i>Kembali</a>
      </div>
      <div class="col s6 right-align valign">
        <h5 class="ak-ijo">Registrasi Basecamp</h5>
        <p>MT {{$gun->nama}}, pilih jalur</p>
      </div>
    </div>


    <div class="material-table">
      <table class="highlight">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Jalur</th>
            <th>Lokasi</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>
          {{-- @foreach($po as $p) --}}
          @foreach($jalur as $key=>$jal)
          <tr>
            <td >{{ ++$key }}</td>
            <td >{{$jal->nama}}</td>
            <td >{{$jal->lokasi}}</td>

            @if($jal->status_camp == "0")

            <td ><a href="{{url('/registration/basecamp/add/3/'.$gun->id.'/'.$jal->id)}}" class="waves-effect waves-light btn"><i class="material-icons right">navigate_next</i>pilih</a></td>

            @else
            <td><a class="btn disabled">pilih</a></td>
            @endif


          </tr>
          @endforeach
          {{-- @endforeach --}}
        </tbody>
      </table>
    </div>

  </div>

  <div style="padding-bottom: 200px;"></div>
</div>

@endforeach
@endsection

@section('script')
@include('landing.app.app-jscript2')
@endsection