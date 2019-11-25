@extends('landing.app.app-land-login')

@section('title')
<title>Alam Kita | Login</title>
@endsection

@section('content')

<div class="slider" style="height: 0vh;">
  <ul class="slides">
    <li>
      <img  src="{{url('/img/ban/1.jpg')}}"> <!-- random image -->
      <div class="animated caption bounceInDown" style="left: 15%;">

        <center>
          <div class="card-panel white ak-card" style="width: 50%;">
            <h5 class="ak-ijo">Login</h5>
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
                  <a class="ak-ijo modal-trigger" href="#regis">Register</a>
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

<div id="regis" class="modal">
  <div class="modal-content">
    <center>
      <h4>Register</h4>
      <p>pilih peran akun anda</p>
    </center>
    <div class="row">

      <a href="{{route('regisUserView')}}">
        <div class="col s6">
          <div class="card ak-rad-10 no-shadow2">
            <div class="ak-cont-card">
              <div style="text-align: center;">
                <i class="large material-icons fas fa-hiking color-icon2"></i>
              </div>
              <br>
              <center>
                <h6 class="center color-icon2"><b>Petualangan</b></h6>
              </center>
            </div>
          </div>
        </div>
      </a>


        <div class="col s6">
          <a href="{{route('regisBasecampViewPil1')}}">
            <div class="card ak-rad-10 no-shadow2">
              <div class="ak-cont-card">
                <div style="text-align: center;">
                  <i class="large material-icons fas fa-campground color-icon2"></i>
                </div>
                <br>
                <center>
                  <h6 class="center color-icon2"><b>Basecamp</b></h6>
                </center>
              </div>
            </div>
          </a>
        </div>


    </div>
  </div>
</div>

@endsection

@section('script')
@include('landing.app.app-jscript2')
@endsection