@extends('landing.app.app-land')

@section('title')
<title>Alam Kita | Home</title>
@endsection

@section('content')


<div class="slider">
	<ul class="slides">
		<li>
			<img class="animated bounceInDown" src="{{url('/img/ban/h.jpg')}}"> <!-- random image -->
			<div class="animated caption bounceInLeft">
				<h2 class="ak-ijo"><b>Alam Kita</b></h2>
				<h5 class="ak-ijo">Mendaki bersama <b>Alam Kita</b> <br>akan terasa berbeda</h5>
				<a class="waves-effect ak-reg ak-bor-bot no-shadow2 btn-flat center-align" href="#">Register</a>
			</div>
		</li>
	</ul>
</div>

<div style="background-color: #558b2f; padding: 60px 0 80px 0;">
	<div class="scroll-animations">
		<div class="container">

			<div class="animated is-visible">
				<center>
					<div class="ak-jud-putih">
						<h3 class="white-text center-align"><b>Fitur</b></h3>
					</div>
				</center>
				<p class="white-text ak-kon center-align">Aplikasi ini dibuat dengan tujuan mempermudah para pendaki untuk melakukan pendakian baik dari persiapan sebelum pendakian atau saat pendakian. Pada aplikasi ini terdapat empat fitur utama yang dapat membantu para pendaki.</p>
			</div>

			<div class="animated is-visible">
				<div class="row">
					<div class="col s4">
						<div class="card ak-rad-30 no-shadow2">
							<div class="ak-cont-card">
								<div style="text-align: center;">
									<i class="large material-icons fas fa-hiking color-icon"></i>
								</div>
								<br><br><br>
								<center>
									<h6 class="center white-text"><b>Petualangan</b></h6>
								</center>
							</div>
						</div>
					</div>
					<div class="col s4">
						<div class="card ak-rad-30 no-shadow2">
							<div class="ak-cont-card">
								<div style="text-align: center;">
									<i class="large material-icons fab fa-discourse color-icon"></i>
								</div>
								<br><br><br>
								<center>
									<h6 class="center white-text"><b>Diskusi Petualangan</b></h6>
								</center>
							</div>

						</div>
					</div>
					<div class="col s4">
						<div class="card ak-rad-30 no-shadow2">
							<div class="ak-cont-card">
								<div style="text-align: center;">
									<i class="large material-icons fas fa-mountain color-icon"></i>
								</div>
								<br><br><br>
								<center>
									<h6 class="center white-text"><b>Informasi</b></h6>
								</center>
							</div>					
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<div style="background-color: #fff; padding: 30px 0 100px 0;">
	<div class="scroll-animations">
		<div class="container">

			<div class="animated is-visible">
				<center>
					<div class="ak-jud-ijo">
						<h3 class="ak-ijo"><b>About</b></h3>
					</div>
				</center>
			</div>

			<br>
			<br>
			<div class="row valign-wrapper">
				<div class="col s6 valign">
					<div class="animated is-visible">
						<center>
							<img src="{{url('/img/logo/alamm.png')}}" style="width: 50%;">
						</center>
					</div>
				</div>

				<div class="col s6">
					<div class="animated is-visible">
						<p class="ak-ijo ak-kon">ALAM KITA adalah aplikasi yang berfokus dibidang pendakian. Alam kita memiliki aplikasi pada web dan mobile. <br><br>Aplikasi ini dibuat dengan tujuan mempermudah para pendaki untuk melakukan pendakian baik dari persiapan sebelum pendakian atau saat pendakian.</p>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>



<div class="parallax-container">
	<div class="parallax"><img src="{{url('/img/ban/1.jpg')}}" style="width: 50%;"></div>
</div>


<div style="background-color: #fff; padding: 80px 0 80px 0;">
	<div class="scroll-animations">
		<div class="container">
			<div class="animated is-visible">
				<center>
					<div class="ak-jud-ijo">
						<h3 class="ak-ijo"><b>Team</b></h3>
					</div>
				</center>
			</div>
			<br>
			<br>
			<div class="row team-row">

				<div class="col s4 team-wrap">
					<div class="animated is-visible">
						<div class="team-member text-center">
							<div class="team-img">
								<img src="{{url('/img/team/ivan.jpg')}}" alt="">
								<div class="overlay">
									<div class="team-details text-center">
										<center>
											<br>
											<br>
											<div class="socials mt-20">
												<a href="#"><i class="fab fa-facebook"></i></a>
												<a href="#"><i class="fab fa-twitter"></i></a>
												<a href="#"><i class="fab fa-google-plus"></i></a>
											</div>
										</center>
									</div>
								</div>
							</div>
							<div class="center-align">
								<h6 class="team-title">Ivan Priyambudi</h6>
								<span>1202170035</span>
							</div>
						</div>
					</div>
				</div>

				<div class="col s4 team-wrap">
					<div class="animated is-visible">
						<div class="team-member text-center">
							<div class="team-img">
								<img src="{{url('/img/team/anggit.jpg')}}" alt="">
								<div class="overlay">
									<div class="team-details text-center">
										<center>
											<br>
											<br>
											<div class="socials mt-20">
												<a href="#"><i class="fab fa-facebook"></i></a>
												<a href="#"><i class="fab fa-twitter"></i></a>
												<a href="#"><i class="fab fa-google-plus"></i></a>
											</div>
										</center>
									</div>
								</div>
							</div>
							<div class="center-align">
								<h6 class="team-title">Anggit Mochammad G S</h6>
								<span>1202170285</span>
							</div>
						</div>
					</div>
				</div>

				<div class="col s4 team-wrap">
					<div class="animated is-visible">
						<div class="team-member last text-center">
							<div class="team-img">
								<img src="{{url('/img/team/fais.jpg')}}" alt="">
								<div class="overlay">
									<div class="team-details text-center">
										<center>
											<br>
											<br>
											<div class="socials mt-20">
												<a href="#"><i class="fab fa-facebook"></i></a>
												<a href="#"><i class="fab fa-twitter"></i></a>
												<a href="#"><i class="fab fa-google-plus"></i></a>
											</div>
										</center>
									</div>
								</div>
							</div>
							<div class="center-align">
								<h6 class="team-title">Muhammad Faiz Raditya</h6>
								<span>1202170303</span>
							</div>
						</div>
					</div>
				</div>

				<div class="col s2">
				</div>

				<div class="col s4 team-wrap" style="padding-top: 50px;">
					<div class="animated is-visible">
						<div class="team-member last text-center">
							<div class="team-img">
								<img src="{{url('/img/team/alwi.jpg')}}" alt="">
								<div class="overlay">
									<div class="team-details text-center">
										<center>
											<br>
											<br>
											<div class="socials mt-20">
												<a href="#"><i class="fab fa-facebook"></i></a>
												<a href="#"><i class="fab fa-twitter"></i></a>
												<a href="#"><i class="fab fa-google-plus"></i></a>
											</div>
										</center>
									</div>
								</div>
							</div>
							<div class="center-align">
								<h6 class="team-title">Alwi Hidayat Harahap</h6>
								<span>1202170319</span>
							</div>
						</div>
					</div>
				</div>

				<div class="col s4 team-wrap" style="padding-top: 50px;">
					<div class="animated is-visible">
						<div class="team-member last text-center">
							<div class="team-img">
								<img src="{{url('/img/team/baim.jpg')}}" alt="">
								<div class="overlay">
									<div class="team-details text-center">
										<center>
											<br>
											<br>
											<div class="socials mt-20">
												<a href="#"><i class="fab fa-facebook"></i></a>
												<a href="#"><i class="fab fa-twitter"></i></a>
												<a href="#"><i class="fab fa-google-plus"></i></a>
											</div>
										</center>
									</div>
								</div>
							</div>
							<div class="center-align">
								<h6 class="team-title">Muhammad Ibrahim</h6>
								<span>1202170148</span>
							</div>
						</div>
					</div>
				</div>

				<div class="col s2">
				</div>

			</div>
		</div>
	</div>
</div>

@endsection
@section('script')
@include('landing.app.app-jscript2')
@endsection
