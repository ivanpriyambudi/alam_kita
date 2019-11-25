<!DOCTYPE html>
<html>
<head>
	@yield('title')
</head>

{{-- css --}}
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('css/materialize.min.css')}}">
{{-- /css --}}

<body>

	{{-- navbar --}}
	<header>
		<ul id="dropdown1" class="dropdown-content nave">
			<li><a href="#!" class="grey-text text-darken-2"><i class="material-icons">brightness_low</i>Pengaturan</a></li>
			<li class="divider"></li>
			<li><a href="#!" class="grey-text text-darken-2"><i class="material-icons">power_settings_new</i>Logout</a></li>
		</ul>
		<nav class="navbar-fixed white" style="z-index: 1001;" >
			<div class="nav-wrapper">
				<div class="container" style="width: 100%;">
					<div class="row">
						<div class="col s12">
							<a href="#" data-target="sidenav-1" class="left sidenav-trigger hide-on-medium-and-up"><i class="material-icons">menu</i></a>
							<a href="#" class="brand-logo light-green-text" style="font-size: 25px;"><img src="{{url('/img/logo/alamm.png')}}" style="width: 30px;">admin</a>
						</div>

						<ul class="right hide-on-med-and-down">
							<li><a class="grey-text text-darken-2 dropdown-trigger" href="#!" data-target="dropdown1"><i class="material-icons right">account_circle</i>Akun Admin</a></li>
						</ul>

					</div>
				</div>
			</div>
		</nav>
	</header>

	{{-- /navbar --}}

	<nav class="light-green">
		<div class="container" style="width: 100%;">
			<div class="nav-wrapper">
				<ul class="left hide-on-med-and-down">
					<li><a href="@yield('linkKembali')"><i class="material-icons left">arrow_back</i>Kembali</a></li>
				</ul>
				<ul class="right hide-on-med-and-down">
					<li><h5>@yield('namaPage')</h5></li>
				</ul>
			</div>
		</div>
	</nav>

	{{--- yield konten --}}

	@yield('content')

	{{--- /yield konten --}}

	{{-- js --}}
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

	<script src="{{asset('js/materialize.min.js')}}"></script>
	
	<script type="text/javascript">
		$(document).ready(function(){
			$('select').formSelect();
		});
		
		$('#textarea1').val('New Text');
		M.textareaAutoResize($('#textarea1'));

		$(".dropdown-trigger").dropdown();
	</script>

	{{-- /js --}}
</body>
</html>