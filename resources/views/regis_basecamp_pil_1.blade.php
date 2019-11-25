@extends('landing.app.app-land')

@section('title')
<title>Alam Kita | Register User</title>
@endsection

@section('content')

<div class="container">

  <br><br><br>
  <div class="card-panel white ak-card">

    <div class="row valig-wrapper">
      <div class="col s6">
        <a class="ak-ijo" href="{{route('login')}}"><i class="ak-ijo material-icons left">arrow_back</i>Kembali</a>
      </div>
      <div class="col s6 right-align valign">
        <h5 class="ak-ijo">Registrasi Basecamp</h5>
        <p>pilih gunung</p>
      </div>
    </div>

    <div class="material-table">
      <table class="highlight">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Gunung</th>
            <th>Daerah</th>
            <th>Ketinggian</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>
          @foreach($gunung as $key=>$gun)
          <tr>
            <td>{{ ++$key }}</td>
            <td>{{$gun->nama}}</td>
            <td>{{$gun->propinsi}}, {{$gun->kota}}</td>
            <td>{{$gun->tinggi}} <b>mdpl</b></td>
            <td><a href="{{route('regisBasecampViewPil2', $gun->id)}}" class="waves-effect waves-light btn"><i class="material-icons right">navigate_next</i>pilih</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>

  <div style="padding-bottom: 200px;"></div>
</div>

@endsection

@section('script')
@include('landing.app.app-jscript2')
@endsection