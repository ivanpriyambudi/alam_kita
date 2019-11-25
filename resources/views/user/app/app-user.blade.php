
<ul id="sidenav-1" class="sidenav sidenav-fixed ak-side-nav" style="padding-top: 80px; padding-right: 20px;">
	{{-- <li><a class="subheader">Always out except on mobile</a></li> --}}
	<br>
	<li class="
	{{ (request()->routeIs(

		'userDashboard'

		)) ? 'active' : '' }}
		">
		<a href="{{url('/admin/dashboard')}}"><i class="material-icons left">dashboard</i>Dashboard</a>
	</li>

	<li class="
	{{ (request()->routeIs(

		'PetualanganDashView',
		'PetualanganDetailDashView'

		)) ? 'active' : '' }}
		">
		<a href="{{route('PetualanganDashView', Auth::guard('user')->user()->id)}}"><i class="material-icons left">share</i>Petualangan</a>
	</li>
	<li class="
	{{ (request()->routeIs(

		'ProfileEditView'

		)) ? 'active' : '' }}
		"><a href="{{route('ProfileEditView', Auth::guard('user')->user()->id)}}"><i class="material-icons left">supervised_user_circle</i>Edit Profile</a>
	</li>
</ul>