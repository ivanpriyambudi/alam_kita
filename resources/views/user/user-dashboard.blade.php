@extends('landing.app.app-land')

@section('title')
<title>Alam Kita | Dashboard</title>
@endsection

@section('style')
<style type="text/css">
	main, footer {
		padding-left: 300px;
	}
</style>
@endsection

@section('style2')
z-index: 1001; border-bottom: 1px solid #e0e0e0;
@endsection

@section('content')

@include('user.app.app-user')

{{-- /navbar --}}
<main>



</main>


@endsection
@section('script')
@include('landing.app.app-jscript2')
@endsection
