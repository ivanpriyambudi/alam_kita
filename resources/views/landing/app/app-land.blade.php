<!DOCTYPE html>
<html>
<head>
	@yield('title')
</head>

{{-- css --}}
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('css/materialize.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">
{{-- /css --}}

<style type="text/css">
	.secondary-content {
		top: 100%;
		position: absolute;
	}
</style>

@yield('style')

{{-- navbar --}}
<header>

	<ul id="dropdown1" class="dropdown-content nave">
		<li><a href="/user" class="grey-text text-darken-2"><i class="material-icons">brightness_low</i>Dashboard</a></li>
		<li class="divider"></li>
		<li><a href="/logout" class="grey-text text-darken-2"><i class="material-icons">power_settings_new</i>Logout</a></li>
	</ul>

	<ul id="dropdown2" class="dropdown-content nave">
		<li><a href="/camp" class="grey-text text-darken-2"><i class="material-icons">brightness_low</i>Dashboard</a></li>
		<li class="divider"></li>
		<li><a href="/logout" class="grey-text text-darken-2"><i class="material-icons">power_settings_new</i>Logout</a></li>
	</ul>

	<div class="navbar-fixed" style="@yield('style2')">
		<nav id="navbar">
			<div class="nav-wrapper">
				<div class="container" style="width: 85%;">
					<div class="row">
						<div class="col s12">
							<a href="#" data-target="sidenav-1" class="left sidenav-trigger hide-on-medium-and-up"><i class="material-icons">menu</i></a>
							<a href="{{route('home')}}" class="brand-logo light-green-text" style="font-size: 25px;"><img src="{{url('/img/logo/alamm.png')}}" style="width: 30px;"> alam kita</a>
						</div>

						<ul id="nav-mobile" class="right hide-on-med-and-down">
							<li class="
							{{ (request()->routeIs(

								'home'

								)) ? 'active' : '' }}
								"><a class="ak-ijo" href="{{route('home')}}">Home</a>
							</li>
							<li class="
							{{ (request()->routeIs(

								'LandInfo',
								'LandInfoDetail',
								'LandJalurDetail'

								)) ? 'active' : '' }}
								"><a class="ak-ijo" href="{{route('LandInfo')}}">Info Gunung</a>
							</li>

							@auth('user')
							<li class="
							{{ (request()->routeIs(

								'Petualangan'

								)) ? 'active' : '' }}
								"><a class="ak-ijo" href="{{route('Petualangan')}}">Petualangan</a>
							</li>
							@endauth

							<li class="
							{{ (request()->routeIs(

								'LandArtikel',
								'LandArtikelDetail'

								)) ? 'active' : '' }}
								"><a class="ak-ijo" href="{{route('LandArtikel')}}">Artikel</a>
							</li>

							

							<li class="
							{{ (request()->routeIs(

								'login'

								)) ? 'active' : '' }}
								"><a class="ak-ijo" href="{{route('login')}}">Login</a>
							</li>
							

							@auth('user')
							<li><a class="grey-text text-darken-2 dropdown-trigger" href="#!" data-target="dropdown1"><i class="material-icons right">account_circle</i>{{Auth::guard('user')->user()->name}}</a></li>
							@endauth

							@auth('camp')
							<li><a class="grey-text text-darken-2 dropdown-trigger" href="#!" data-target="dropdown2"><i class="material-icons right">account_circle</i>{{Auth::guard('camp')->user()->nama}}</a></li>
							@endauth
						
						</ul>

					</div>
				</div>
			</div>
		</nav>
	</div>
</header>
{{-- /navbar --}}
<body>

	@yield('content')

	{{-- Footer --}}
	<footer class="page-footer">
		<div class="container">

		</div>
		<div class="footer-copyright">
			<div class="container">
				© 2019 Copyright Alam Kita
			</div>
		</div>
	</footer>
	{{-- /Footer --}}

	{{-- js --}}
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src='https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js'></script>
	<script src="{{asset('js/materialize.min.js')}}"></script>
	<script src="{{asset('js/script.js')}}"></script>

	@yield('script')
	{{-- /js --}}

</body>
</html>