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