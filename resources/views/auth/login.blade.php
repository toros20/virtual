<!DOCTYPE html>
<html lang="es">
<head>

	<title>Login</title>

	<!-- Required meta tags always come first -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<!-- Main Font -->
	<script src="js/webfontloader.min.js"></script>
   

	<script>
		WebFont.load({
			google: {
				families: ['Roboto:300,400,500,700:latin']
			}
		});
	</script>

	<!-- Bootstrap CSS -->
    
	<link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap-reboot.css">
	<link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap-grid.css">

	<!-- Main Styles CSS -->
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/fonts.min.css">

</head>

<body class="landing-page">

	<!-- Preloader -->

	 <div id="hellopreloader">
		<div class="preloader">
			<svg width="45" height="45" stroke="#fff">
				<g fill="none" fill-rule="evenodd" stroke-width="2" transform="translate(1 1)">
					<circle cx="22" cy="22" r="6" stroke="none">
						<animate attributeName="r" begin="1.5s" calcMode="linear" dur="3s" repeatCount="indefinite" values="6;22"/>
						<animate attributeName="stroke-opacity" begin="1.5s" calcMode="linear" dur="3s" repeatCount="indefinite" values="1;0"/>
						<animate attributeName="stroke-width" begin="1.5s" calcMode="linear" dur="3s" repeatCount="indefinite" values="2;0"/>
					</circle>
					<circle cx="22" cy="22" r="6" stroke="none">
						<animate attributeName="r" begin="3s" calcMode="linear" dur="3s" repeatCount="indefinite" values="6;22"/>
						<animate attributeName="stroke-opacity" begin="3s" calcMode="linear" dur="3s" repeatCount="indefinite" values="1;0"/>
						<animate attributeName="stroke-width" begin="3s" calcMode="linear" dur="3s" repeatCount="indefinite" values="2;0"/>
					</circle>
					<circle cx="22" cy="22" r="8">
						<animate attributeName="r" begin="0s" calcMode="linear" dur="1.5s" repeatCount="indefinite" values="6;1;2;3;4;5;6"/>
					</circle>
				</g>
			</svg>

			<div class="text">Cargando ...</div>
		</div>
	</div> 

<!-- ... end Preloader -->


<div class="content-bg-wrap"></div>


<!-- Header Standard Landing  -->

<div class="header--standard header--standard-landing" id="header--standard">
	<div class="container">
		<div class="header--standard-wrap">

			<a href="#" class="logo">
				<div class="img-wrap">
					<img src="img/logo.png" alt="San jose del carmen logo">
					{{-- <img src="img/logo-colored-small.png" alt="San Jose Del Carmen" class="logo-colored"> --}}
				</div>
				<div class="title-block">
					<h6 class="logo-title">ISJC</h6>
					<div class="sub-title">Plataforma Virtual</div>
				</div>
			</a>
		</div>
	</div>
</div> 

<!-- ... end Header Standard Landing  
<div class="header-spacer--standard"></div>-->

<div class="container">
	<div class="row display-flex" Style="padding-top: 8rem;">
		<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
			<div class="landing-content">
				<h1>Bienvenidos a nuestra Plataforma Virtual </h1>
				<p>Alabado sea Jesucristo. Te invitamos a aprovechar de nuestro portal educativo al m&aacute;ximo,
				 si tienes alguna dificultad para ingresar o alguna duda sobre el portal puedes solicitarla.  
				</p>
				{{-- <a href="#" class="btn btn-md btn-border c-white">Socilitar Ayuda</a> --}}
			</div>
		</div>

		<div class="col col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12">
			
			<!-- Login-Registration Form  -->
			
			<div class="registration-login-form">
					
					<div id="profile">
						<div class="title h6">Ingresa a tu cuenta</div>
						<form class="content"  method="POST" action="{{ route('login') }}">
							@csrf
							<div class="row">
								<div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
									<div class="form-group label-floating">
										<label class="control-label">N&uacute;mero de Cuenta</label>
										<input id="login" type="login" class="form-control {{ $errors->has('login') ? ' is-invalid' : '' }}" name="login" value="{{ old('login') }}" required  >
										 @if ($errors->has('login'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('login') }}</strong>
											</span>
										@endif
									</div>
									<div class="form-group label-floating">
										<label class="control-label">Contrase&ntilde;a</label>
										<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
										 @if ($errors->has('password'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('password') }}</strong>
											</span>
										@endif
									</div>
			
									{{-- <div class="remember">
			
										<div class="checkbox">
											<label>
												<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
												Recordarme
											</label>
										</div>
										
									</div> --}}
										
									<button type="submit" class="btn btn-lg btn-primary full-width">
										{{ __('Ingresar') }}
									</button>

									{{-- @if (Route::has('password.request'))
										<a Style="color:#888da8;" class="btn btn-link" href="{{ route('password.request') }}">
											{{ __('¿Olvidaste tu Contraseña?') }}
										</a>
									@endif --}}
			
								</div>
							</div>
						</form>
					</div>
				
			</div>
			
			<!-- ... end Login-Registration Form  -->		</div>
	</div>
</div>


<!-- JS Scripts -->
<script src="{{ URL::asset('js/jquery-3.2.1.js')}}"></script>
<script src="{{ URL::asset('js/jquery.appear.js')}}"></script>
<script src="{{ URL::asset('js/jquery.mousewheel.js')}}"></script>
<script src="{{ URL::asset('js/perfect-scrollbar.js')}}"></script>
<script src="{{ URL::asset('js/jquery.matchHeight.js')}}"></script>
<script src="{{ URL::asset('js/svgxuse.js')}}"></script>
<script src="{{ URL::asset('js/imagesloaded.pkgd.js')}}"></script>
<script src="{{ URL::asset('js/Headroom.js')}}"></script>
<script src="{{ URL::asset('js/velocity.js')}}"></script>
<script src="{{ URL::asset('js/ScrollMagic.js')}}"></script>
<script src="{{ URL::asset('js/jquery.waypoints.js')}}"></script>
<script src="{{ URL::asset('js/jquery.countTo.js')}}"></script>
<script src="{{ URL::asset('js/popper.min.js')}}"></script>
<script src="{{ URL::asset('js/material.min.js')}}"></script>
<script src="{{ URL::asset('js/bootstrap-select.js')}}"></script>
<script src="{{ URL::asset('js/smooth-scroll.js')}}"></script>
<script src="{{ URL::asset('js/selectize.js')}}"></script>
<script src="{{ URL::asset('js/swiper.jquery.js')}}"></script>
<script src="{{ URL::asset('js/moment.js')}}"></script>
<script src="{{ URL::asset('js/daterangepicker.js')}}"></script>
<script src="{{ URL::asset('js/simplecalendar.js')}}"></script>
<script src="{{ URL::asset('js/fullcalendar.js')}}"></script>
<script src="{{ URL::asset('js/isotope.pkgd.js')}}"></script>
<script src="{{ URL::asset('js/ajax-pagination.js')}}"></script>
<script src="{{ URL::asset('js/Chart.js')}}"></script>
<script src="{{ URL::asset('js/chartjs-plugin-deferred.js')}}"></script>
<script src="{{ URL::asset('js/circle-progress.js')}}"></script>
<script src="{{ URL::asset('js/loader.js')}}"></script>
<script src="{{ URL::asset('js/run-chart.js')}}"></script>
<script src="{{ URL::asset('js/jquery.magnific-popup.js')}}"></script>
<script src="{{ URL::asset('js/jquery.gifplayer.js')}}"></script>
<script src="{{ URL::asset('js/mediaelement-and-player.js')}}"></script>
<script src="{{ URL::asset('js/mediaelement-playlist-plugin.min.js')}}"></script>
<script src="{{ URL::asset('js/ion.rangeSlider.js')}}"></script>
<script src="{{ URL::asset('js/base-init.js')}}"></script>
<script defer src="{{ URL::asset('fonts/fontawesome-all.js')}}"></script>
<script src="{{ URL::asset('Bootstrap/dist/js/bootstrap.bundle.js')}}"></script>



</body>
</html>