@extends('landing.app.app-land')

@section('title')
<title>Alam Kita | Registration</title>
@endsection

@section('content')

<div class="slider" style="height: 0vh;">
  <ul class="slides">
    <li>
      <img  src="{{url('/img/ban/1.jpg')}}"> <!-- random image -->
      <div class="animated caption bounceInDown" style="left: 15%;">

        <center>
          <div class="card-panel white ak-card" style="width: 50%;">
            <h5 class="ak-ijo">Registrasi</h5>
            <div class="row">
              <div class="col s12">
                <form action="/login" method="post">
                 @csrf
                 <div class="input-field ak-field" style="right: 10px;">
                  <input type="text" name="email" id="email" class="validate">
                  <label for="lokasi">Email</label>
                </div>
                <div class="input-field ak-field" style="right: 10px;">
                  <input type="password" name="password" id="password" class="validate">
                  <label for="lokasi">Password</label>
                </div>
                <center>
                  <button type="submit" class="waves-effect ak-button btn" style="width: 75%;">Submit</button>
                  <br>
                  <br>
                  <a class="ak-ijo" href="">Register</a>
                </center>
              </form>

            </div>
          </div>
        </div>
      </center>

    </div>
  </li>
</ul>
</div>

@endsection

@section('script')
@include('landing.app.app-jscript2')
@endsection