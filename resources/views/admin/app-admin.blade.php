<!DOCTYPE html>
<html>
<head>
	@yield('title')
</head>

{{-- css --}}
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('css/materialize.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
{{-- /css --}}

<style type="text/css">
	main, footer {
		padding-left: 300px;
	}
</style>

<body>

	{{-- navbar --}}
	<header>
		<ul id="dropdown1" class="dropdown-content nave">
			<li><a href="#!" class="grey-text text-darken-2"><i class="material-icons">brightness_low</i>Pengaturan</a></li>
			<li class="divider"></li>
			<li><a href="/logout" class="grey-text text-darken-2"><i class="material-icons">power_settings_new</i>Logout</a></li>
		</ul>
		<nav class="navbar-fixed white" style="z-index: 1001;border-bottom: 1px solid #e0e0e0;" >
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

	<ul id="sidenav-1" class="sidenav sidenav-fixed ak-side-nav" style="padding-top: 80px; padding-right: 20px;">
		{{-- <li><a class="subheader">Always out except on mobile</a></li> --}}
		<br>
		<li class="
		{{ (request()->routeIs(

			'AdminDashboard'

			)) ? 'active' : '' }}
			">
			<a href="{{url('/admin/dashboard')}}"><i class="material-icons left">dashboard</i>Dashboard</a>
		</li>
		
		<li class="
		{{ (request()->routeIs(

			'AdminInfoGunung',
			'AdminInfoGunungDetail',
			'AdminDetailJalurView',
			'AdminDetailPosView'

			)) ? 'active' : '' }}
			">
			<a href="{{url('/admin/info-gunung')}}"><i class="material-icons left">change_history</i>Info Gunung</a>
		</li>
		
		<li class="
		{{ (request()->routeIs(

			'ArtikelView',
			'ArtikelDetailView'

			)) ? 'active' : '' }}
			">
			<a href="{{route('ArtikelView')}}"><i class="material-icons left">library_books</i>Artikel</a>
		</li>
		<li class="
		{{ (request()->routeIs(

			'CampView',
			'CampDetailView'

			)) ? 'active' : '' }}
			">
			<a href="{{route('CampView')}}"><i class="material-icons left">poll</i>Camp</a></li>
			<li class="
			{{ (request()->routeIs(

				'AdminPetualangan',
				'AdminDetailPetualangan'

				)) ? 'active' : '' }}
				"><a href="{{route('AdminPetualangan')}}"><i class="material-icons left">share</i>Petualangan</a>
			</li>
			<li class="
			{{ (request()->routeIs(

				'AdminUser',
				'AdminDetailUser'

				)) ? 'active' : '' }}
				"><a href="{{route('AdminUser')}}"><i class="material-icons left">supervised_user_circle</i>Akun</a></li>
			</ul>
			{{-- /navbar --}}
			<main>
				<div class="row ak-bread-con valign-wrapper">
					<div class="col s8">
						<nav class="ak-bread">
							<div class="nav-wrapper">
								<div class="col s12" style="padding-left: 30px;">

									@yield('Breadcumb')

								</div>
							</div>
						</nav>
					</div>
					<div class="col s4 valign">

						@yield('KananBreadcumb')

					</div>
				</div>

				{{--- yield konten --}}

				@yield('content')

				{{--- /yield konten --}}
			</main>

			{{-- js --}}
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

			<script src='https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js'></script>

			<script src="{{asset('js/materialize.min.js')}}"></script>

			<script src="{{asset('js/script.js')}}"></script>

			<script type="text/javascript">
				$(document).ready(function(){
					$('.sidenav').sidenav();
					$('#sidenav-1').sidenav({ edge: 'left' });
				});

				$(".dropdown-trigger").dropdown();

				$(document).ready(function(){
					$('.tabs').tabs();
				});

				$(document).ready(function(){
					$('select').formSelect();
				});

				$(document).ready(function(){
					$('.materialboxed').materialbox();
				});

				$(document).ready(function(){
					$('.modal').modal();
				});
				$(document).ready(function(){
					$('.collapsible').collapsible();
				});
			</script>

			{{-- /js --}}
		</body>
		</html>