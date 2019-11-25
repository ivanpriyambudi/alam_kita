@extends('landing.app.app-land')

@section('title')
<title>Alam Kita | Register User</title>
@endsection

@section('content')

<div class="container">

  <br><br>
  <div class="card-panel white ak-card">
    <h5 class="ak-ijo">Registrasi User</h5>

    <form action="{{route('regisUserAction')}}" method="post" enctype="multipart/form-data">
     @csrf

     <div class="row">

      <div class="col s6" style="padding-right: 50px;">

       <div class="input-field ak-field">
        <input name="name" id="name" type="text" class="validate">
        <label for="name">Nama</label>
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
        <select name="kelamin">
          <option value="" disabled selected>Pilih Jenis Kelamin</option>
          <option value="laki-laki">Laki-laki</option>
          <option value="perempuan">Perempuan</option>
        </select>
        <label>Jenis Kelamin</label>
      </div>

    </div>

    <div class="col s6">

      <div class="input-field ak-field">
        <input name="tgl_lahir" type="text" class="datepicker">
        <label>Tanggal Lahir</label>
      </div>

      <div class="input-field ak-field">
        <textarea name="alamat" id="alamat" class="materialize-textarea" style="height: 13.5em;"></textarea>
        <label for="alamat">Alamat</label>
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

      <input type="hidden" name="tempat_lahir" value="null">
      <input type="hidden" name="kontak" value="0">
      <input type="hidden" name="deskripsi" value="null">

      
    </div>

    <div class="col s12">
      <center>
        <button type="submit" class="waves-effect ak-button btn" style="width: 75%;">Submit</button>
      </center>
    </div>

  </div>

</form>
</div>

<br><br>
</div>

@endsection

@section('script')
@include('landing.app.app-jscript2')
@endsection