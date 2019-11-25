
<ul id="sidenav-1" class="sidenav sidenav-fixed ak-side-nav" style="padding-top: 80px; padding-right: 20px;">
	{{-- <li><a class="subheader">Always out except on mobile</a></li> --}}
	<br>
	<li class="
	{{ (request()->routeIs(

		'campDashboard'

		)) ? 'active' : '' }}
		">
		<a href="{{url('/camp')}}"><i class="material-icons left">dashboard</i>Dashboard</a>
	</li>

	<li class="
	{{ (request()->routeIs(

		'CampPetualangan',
		'CampPetualanganDetail'

		)) ? 'active' : '' }}
		">
		<a href="{{route('CampPetualangan', Auth::guard('camp')->user()->jalur_id)}}"><i class="material-icons left">share</i>Petualangan</a>
	</li>

	<li class="
	{{ (request()->routeIs(

		'CampProfile'

		)) ? 'active' : '' }}
		">
		<a href="{{route('CampProfile', Auth::guard('camp')->user()->id)}}"><i class="material-icons left">account_circle</i>Profile</a>
	</li>
</ul>