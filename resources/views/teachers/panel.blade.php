<!DOCTYPE html>
<html lang="es">
<head>
	<title>Panel Estudiant&iacute;l</title>

	<!-- Required meta tags always come first -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="../../Bootstrap/dist/css/bootstrap-reboot.css">
	<link rel="stylesheet" type="text/css" href="../../Bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../Bootstrap/dist/css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/css" href="../../css/toastr.min.css">

	<!-- Main Styles CSS -->
	<link rel="stylesheet" type="text/css" href="../../css/main.css">
	<link rel="stylesheet" type="text/css" href="../../css/fonts.min.css">

	<!-- Main Font -->
	<script src="../../js/webfontloader.min.js"></script>
	<script>
		WebFont.load({
			google: {
				families: ['Roboto:300,400,500,700:latin']
			}
		});
	</script>

	<script type="text/javascript" language="javascript" src="../../js/main.js"></script>
</head>
<body>


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

<!-- Fixed Sidebar Left -->

<div class="fixed-sidebar fixed-sidebar-responsive">

	<div class="fixed-sidebar-left sidebar--small" id="sidebar-left-responsive">
		<a href="#" class="logo js-sidebar-open">
			<img src="../../img/logo.png" alt="San Jose del Carmen">
		</a>

	</div>

	<div class="fixed-sidebar-left sidebar--large js-sidebar-open" id="sidebar-left-1-responsive">
		<a href="#" class="logo">
			<div class="img-wrap">
				<img src="../../img/logo.png" alt="San Jose del Carmen">
			</div>
			<div class="title-block">
				<h6 class="logo-title">ISJC</h6>
			</div>
		</a>

		<div class="mCustomScrollbar" data-mcs-theme="dark">

			<div class="control-block">
				<div class="author-page author vcard inline-items">
					<div class="author-thumb">
						@if ($user->sexo == 'M')
							<img alt="author" src="../../img/teacher.png" class="avatar">
						@endif
						@if ($user->sexo == 'F')
							<img alt="author" src="../../img/girl_short.png" class="avatar">
						@endif
					</div>
					<a href="02-ProfilePage.html" class="author-name fn">
						<div class="author-title">
							{{$user->name}} <svg class="olymp-dropdown-arrow-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
						</div>
						<span class="author-subtitle">Licenciado </span>
					</a>
				</div>
			</div>
			<hr>
			<ul class="left-menu" style="padding: 0px;">
				
					@foreach ($asignaciones as $asignacion)
					<li class="inline-items" style="padding: 0px 0 0px 15px;">
						<div class="author-thumb">
							<img src="../../img/teacher.PNG" alt="author">
						</div>
						<div class="notification-event" style="width:100px;">
							<p href="#" class="h6 notification-friend"> {{$asignacion->course->short_name}}-{{$asignacion->section}} </p>
							<p>{{$asignacion->clase->short_name}} </p>
						</div>
						<div class="notification-event" style="padding-left:50px;">
								<span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="ADD TO YOUR FAVS">
									<a href="#">
										<svg class="olymp-comments-post-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
									</a>
								</span>
							</div>
						</li><hr style="margin-bottom:0px; margin-top:0px">
				@endforeach
			
			</ul>

			<div class="ui-block-title ui-block-title-small">
				<h6 class="title">Tu Cuenta</h6>
			</div>

			<ul class="account-settings">
				<li>
					<a href="#">

						<svg class="olymp-menu-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-menu-icon"></use></svg>

						<span>Opciones de Cuenta</span>
					</a>
				</li>
				<li>
					
				</li>
				<li>
					<a href="#">
						<svg class="olymp-logout-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-logout-icon"></use></svg>

						<span>Salir</span>
					</a>
				</li>
			</ul>

		</div>
	</div>

</div>

<!-- ... end Fixed Sidebar Left -->

<div class="fixed-sidebar right fixed-sidebar-responsive">

	<div class="fixed-sidebar-right sidebar--small" id="sidebar-right-responsive">

		<a href="#" class="olympus-chat inline-items js-chat-open">
			<svg class="olymp-chat---messages-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
		</a>

	</div>

</div>

<!-- Header-BP -->

<header class="header" id="site-header">

	<div class="page-title">
		<h6>ISJC-2019</h6>
	</div>

	<div class="header-content-wrapper">
		<form class="search-bar w-search notification-list friend-requests">
			<div class="form-group with-button">
				<input class="form-control js-user-search" placeholder="Buscar Mensaje por asigaturas" type="text">
				<button>
					<svg class="olymp-magnifying-glass-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use></svg>
				</button>
			</div>
		</form>

		{{-- <a href="#" class="link-find-friend">Find Friends</a> --}}

		<div class="control-block">
			
			{{-- Area de los mensajes --}}
			<div class="control-icon more has-items">
				<svg class="olymp-chat---messages-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
				<div class="label-avatar bg-purple">1</div>

				<div class="more-dropdown more-with-triangle triangle-top-center">
					<div class="ui-block-title ui-block-title-small">
						<h6 class="title">Chat / Mensajes</h6>
					</div>

					<div class="mCustomScrollbar" data-mcs-theme="dark">
						<ul class="notification-list chat-message">
							<li class="message-unread">
								<div class="author-thumb">
									<img src="../../img/avatar59-sm.jpg" alt="author">
								</div>
								<div class="notification-event">
									<a href="#" class="h6 notification-friend">Diana Jameson</a>
									<span class="chat-message-item">Hi James! It’s Diana, I just wanted to let you know that we have to reschedule...</span>
									<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
								</div>
								<span class="notification-icon">
									<svg class="olymp-chat---messages-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
								</span>
								<div class="more">
									<svg class="olymp-three-dots-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
								</div>
							</li>

						</ul>
					</div>

					<a href="#" class="view-all bg-purple">Ver Todos los Mensajes</a>
				</div>
			</div>
			{{-- fin del area de los mensajes --}}

			{{-- Area de las notificaciones --}}
			<div class="control-icon more has-items">
				<svg class="olymp-thunder-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-thunder-icon"></use></svg>

				<div class="label-avatar bg-primary">1</div>

				<div class="more-dropdown more-with-triangle triangle-top-center">
					<div class="ui-block-title ui-block-title-small">
						<h6 class="title">Notificaciones</h6>
					</div>

					<div class="mCustomScrollbar" data-mcs-theme="dark">
						<ul class="notification-list">
							<li>
								<div class="author-thumb">
									<img src="../../img/avatar62-sm.jpg" alt="author">
								</div>
								<div class="notification-event">
									<div><a href="#" class="h6 notification-friend">Mathilda Brinker</a> commented on your new <a href="#" class="notification-link">profile status</a>.</div>
									<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
								</div>
									<span class="notification-icon">
										<svg class="olymp-comments-post-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
									</span>

								<div class="more">
									<svg class="olymp-three-dots-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
									<svg class="olymp-little-delete"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
								</div>
							</li>

						</ul>
					</div>

					<a href="#" class="view-all bg-primary">Ver Todas las notificaciones</a>
				</div>

			</div>
			{{-- fin del area de las notificaciones --}}

			{{-- Area de imagen de perfil --}}
			<div class="author-page author vcard inline-items more">
				<div class="author-thumb">
					@if ($user->sexo == 'M')
						<img alt="author" src="../../img/teacher.png" class="avatar">
					@endif
					@if ($user->sexo == 'F')
						<img alt="author" src="../../img/girl_short.png" class="avatar">
					@endif
					
					<div class="more-dropdown more-with-triangle">
						<div class="mCustomScrollbar" data-mcs-theme="dark">
							<div class="ui-block-title ui-block-title-small">
								<h6 class="title">Tu Cuenta</h6>
							</div>

							<ul class="account-settings">
								<li>
									<a href="29-YourAccount-AccountSettings.html">

										<svg class="olymp-menu-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-menu-icon"></use></svg>

										<span>Opciones de Perfil</span>
									</a>
								</li>

								<li>
									<a href="#">
										<svg class="olymp-logout-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-logout-icon"></use></svg>

										<span>Salir</span>
									</a>
								</li>
							</ul>

						</div>

					</div>
				</div>

				<a href="02-ProfilePage.html" class="author-name fn">
					<div class="author-title">
						{{$user->name}} <svg class="olymp-dropdown-arrow-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
					</div>
					<span class="author-subtitle">Lic....</span>
				</a>
			</div>
			{{-- fin del Area de imagen de perfil --}}

		</div>
	</div>

</header>

<!-- ... end Header-BP -->


<!-- Responsive Header-BP -->

<header class="header header-responsive" id="site-header-responsive">

	<div class="header-content-wrapper">
		<ul class="nav nav-tabs mobile-app-tabs" role="tablist">
			

			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#chat" role="tab">
					<div class="control-icon has-items">
						<svg class="olymp-chat---messages-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
						<div class="label-avatar bg-purple">2</div>
					</div>
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#notification" role="tab">
					<div class="control-icon has-items">
						<svg class="olymp-thunder-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-thunder-icon"></use></svg>
						<div class="label-avatar bg-primary">2</div>
					</div>
				</a>
			</li>

			
		</ul>
	</div>

	<!-- Tab panes -->
	<div class="tab-content tab-content-responsive">

		<div class="tab-pane " id="chat" role="tabpanel">

			<div class="mCustomScrollbar" data-mcs-theme="dark">
				<div class="ui-block-title ui-block-title-small">
					<h6 class="title">Chat / Mensajes</h6>
				</div>

				<ul class="notification-list chat-message">
					<li class="message-unread">
						<div class="author-thumb">
							<img src="../../img/avatar59-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Diana Jameson</a>
							<span class="chat-message-item">Hi James! It’s Diana, I just wanted to let you know that we have to reschedule...</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
						</div>
									<span class="notification-icon">
										<svg class="olymp-chat---messages-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
									</span>
						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
						</div>
					</li>

				</ul>

				<a href="#" class="view-all bg-purple">Ver todos los mensajes</a>
			</div>

		</div>

		<div class="tab-pane " id="notification" role="tabpanel">

			<div class="mCustomScrollbar" data-mcs-theme="dark">
				<div class="ui-block-title ui-block-title-small">
					<h6 class="title">Notificaciones</h6>
				</div>

				<ul class="notification-list">
					
					<li>
						<div class="author-thumb">
							<img src="../../img/avatar62-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<div><a href="#" class="h6 notification-friend">Mathilda Brinker</a> commented on your new <a href="#" class="notification-link">profile status</a>.</div>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
						</div>
										<span class="notification-icon">
											<svg class="olymp-comments-post-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
										</span>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
							<svg class="olymp-little-delete"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
						</div>
					</li>

				</ul>

				<a href="#" class="view-all bg-primary">Ver todas las notificaciones</a>
			</div>

		</div>

	</div>
	<!-- ... end  Tab panes -->

</header>

<!-- ... end Responsive Header-BP -->
<div class="header-spacer"></div>

<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block">

				<div class="top-header top-header-favorit">
				
					<div class="top-header-thumb">
						<img src="../../img/backtoschool.jpg" alt="nature">
						<div class="top-header-author">
							<div class="author-thumb">
								@if ($user->sexo == 'M')
									<img alt="author" src="../../img/teacher.png" class="avatar">
								@endif
								@if ($user->sexo == 'F')
									<img alt="author" src="../../img/teacher.png" class="avatar">
								@endif
							</div>
							<div class="author-content">
								<a href="#" class="h3 author-name">{{$user->name}} </a>
								<div class="country">LICENCIADO </div>
							</div>
						</div>
					</div>
					<div class="profile-section" style="padding:20px;">
						
						<div class="control-block-button">

							 <a href="#" class="btn btn-control bg-primary">
								<svg class="olymp-star-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg>
							 </a>

						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="container">
	<div class="row">

		{{-- INICIO DEL PANEL CENTRAL --}}
		<div class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-sm-12 col-12">

			<!-- Comment Form  -->
					
			<div class="comment-form inline-items" style="background-color: white; margin-bottom: 15px;">
					<p>Tus consultas o comentario serán vistos por todos los padres, docentes y alumnos de esta sección. Recuerda ser cortes y respetuoso.</p>
					<div class="post__author author vcard inline-items">
						<img src="../../img/teacher.png" alt="author">
						<input id="user" type="hidden" value="{{$user->id}} ">
						<input id="token" type="hidden" name="_token"  value="{{ csrf_token() }}">
						<input id="course" type="hidden" value="{{$firstclass->course->id}} ">
						<input id="section" type="hidden" value="{{$firstclass->section}} ">

						<div class="form-group with-icon-right ">
							<textarea id="mensaje" class="form-control" placeholder=""></textarea>
							<div class="add-options-message">
								<a href="#" class="options-message" data-toggle="modal" data-target="#update-header-photo">
									<svg class="olymp-camera-icon">
										<use xlink:href="../../svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
									</svg>
								</a>
							</div>
						</div>
					</div>
					<button onclick="publicar()" class="btn btn-md-2 btn-primary">Enviar</button>
				</div>
				
				<!-- ... end Comment Form  -->
			
			<div id="newsfeed-items-grid">

				<div id="posts" class="ui-block">

					<!-- Post -->
					<div id="nuevo_post"></div>
					
					@foreach ($mensajes as $mensaje)
						<article class="hentry post">
					
							<div class="post__author author vcard inline-items">
								<img src="../../img/teacher.png" alt="author">
						
								<div class="author-date">
									<a class="h6 post__author-name fn" href="#">Asignatura | Lic. {{$mensaje->name}}</a>
									<div class="post__date">
										<time class="published" datetime="2017-03-24T18:18">
												{{$mensaje->fecha}}
										</time>
									</div>
								</div>
						
								<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
									<ul class="more-dropdown">
										<li>
											<a href="#">Edit Post</a>
										</li>
										<li>
											<a href="#">Delete Post</a>
										</li>
										<li>
											<a href="#">Turn Off Notifications</a>
										</li>
										<li>
											<a href="#">Select as Featured</a>
										</li>
									</ul>
								</div>
						
							</div>
						
							<p> {{$mensaje->mensaje}}</p>
						
							<div class="post-additional-info inline-items">
						
								<a href="#" class="post-add-icon inline-items">
									<svg class="olymp-heart-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
									<span> {{$mensaje->megusta}} Me gusta</span>
								</a>					
						
								<div class="comments-shared">
									<a href="#" class="post-add-icon inline-items">
										<svg class="olymp-speech-balloon-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use></svg>
										<span>2 Comentarios</span>
									</a>
						
								</div>
						
							</div>
						
						</article>
					@endforeach
					
					<!-- ... end Post -->

					<!-- Comments -->
					
					{{-- <ul class="comments-list">
						<li class="comment-item">
							<div class="post__author author vcard inline-items">
								<img src="../../img/avatar2-sm.jpg" alt="author">
					
								<div class="author-date">
									<a class="h6 post__author-name fn" href="#">Nicholas Grissom</a>
									<div class="post__date">
										<time class="published" datetime="2017-03-24T18:18">
											28 mins ago
										</time>
									</div>
								</div>
					
								<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
					
							</div>
					
							<p>Dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>
					
							<a href="#" class="post-add-icon inline-items">
								<svg class="olymp-heart-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
								<span>6 Me gusta</span>
							</a>
							
						</li>
						<li class="comment-item">
							<div class="post__author author vcard inline-items">
								<img src="../../img/avatar19-sm.jpg" alt="author">
					
								<div class="author-date">
									<a class="h6 post__author-name fn" href="#">Jimmy Elricson</a>
									<div class="post__date">
										<time class="published" datetime="2017-03-24T18:18">
											2 hours ago
										</time>
									</div>
								</div>
					
								<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
					
							</div>
					
							<p>Ratione voluptatem sequi en lod nesciunt. Neque porro quisquam est, quinder dolorem ipsum
								quia dolor sit amet, consectetur adipisci velit en lorem ipsum duis aute irure dolor in reprehenderit in voluptate velit esse cillum.
							</p>
					
							<a href="#" class="post-add-icon inline-items">
								<svg class="olymp-heart-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
								<span>8 Me gusta</span>
							</a>
							
						</li>
					</ul> --}}
					
					<!-- ... end Comments -->

					{{-- <a href="#" class="more-comments">Ver mas comentarios <span>+</span></a> --}}

				 </div>

			   </div>

			   
			<a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="items-to-load.html" data-container="newsfeed-items-grid"><svg class="olymp-three-dots-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>

		</div>
		{{-- FIN DEL PANEL CENTRAL --}}

		{{-- INICIO DEL PANEL IZQUIERDO --}}
		<div class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">
			
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Asignaturas</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>

				<ul class="widget w-friend-pages-added notification-list friend-requests">

					@foreach ($asignaciones as $asignacion)
						<li class="inline-items">
							<div class="author-thumb">
								<img src="../../img/teacher.PNG" alt="author">
							</div>
							<div class="notification-event">
								<a href="#" class="h6 notification-friend"> {{$asignacion->course->short_name}}-{{$asignacion->section}} </a>
								<span class="chat-message-item">{{$asignacion->clase->short_name}}  </span>
							</div>
							<span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="ADD TO YOUR FAVS">
								<a href="#">
									<svg class="olymp-comments-post-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
								</a>
							</span>
						</li>
					@endforeach
					
				</ul>
				
			</div>
			

		</div>
		{{-- FIN DEL PANEL IZQUIERDO --}}

		{{-- INICIO DEL PANEL DERECHO --}}
		<div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">

			<div class="ui-block" >
				<div style="background-color:lightcoral;" class="ui-block-title">
					<h6 style="color:white"  class="title">Tareas Para Hoy</h6>
				</div>

				<!-- W-Twitter -->
				
				<ul class="widget w-twitter">
					<li class="twitter-item">
						<div class="author-folder">
							<img src="../../img/teacher.png" alt="avatar">
							<div class="author">
								<a href="#" class="author-name">Español</a>
								<a href="#" class="group">Hoy</a>
							</div>
						</div>
						<p>Presentar el Album de los poetas. con todos los nombre y obras mas famosas.
							<a href="#" class="link-post">Ver Tarea.</a></p>
						<span class="post__date">
							<time class="published" datetime="2017-03-24T18:18">
								Hace una semana
							</time>
						</span>
					</li>
					
					<li class="twitter-item">
						<div class="author-folder">
							<img src="../../img/teacher.png" alt="avatar">
							<div class="author">
								<a href="#" class="author-name">Tecnología</a>
								<a href="#" class="group">Hoy</a>
							</div>
						</div>
						<p>Presentar el Album de los poetas. con todos los nombre y obras mas famosas.
							<a href="#" class="link-post">Ver Tarea.</a></p>
						<span class="post__date">
							<time class="published" datetime="2017-03-24T18:18">
								Hace 4 dias
							</time>
						</span>
					</li>

				</ul>				
				
				<!-- .. end W-Twitter -->
			</div>

			<div class="ui-block">
				<div style="background-color:gold;" class="ui-block-title">
					<h6 class="title">Tareas Para Mañana</h6>
				</div>

				<!-- W-Twitter -->
				
				<ul class="widget w-twitter">
					<li class="twitter-item">
						<div class="author-folder">
							<img src="../../img/teacher.png" alt="avatar">
							<div class="author">
								<a href="#" class="author-name">Español</a>
								<a href="#" class="group">Hoy</a>
							</div>
						</div>
						<p>Presentar el Album de los poetas. con todos los nombre y obras mas famosas.
							<a href="#" class="link-post">Ver Tarea.</a></p>
						<span class="post__date">
							<time class="published" datetime="2017-03-24T18:18">
								Hace una semana
							</time>
						</span>
					</li>
					
					<li class="twitter-item">
						<div class="author-folder">
							<img src="../../img/teacher.png" alt="avatar">
							<div class="author">
								<a href="#" class="author-name">Tecnología</a>
								<a href="#" class="group">Hoy</a>
							</div>
						</div>
						<p>Presentar el Album de los poetas. con todos los nombre y obras mas famosas.
							<a href="#" class="link-post">Ver Tarea.</a></p>
						<span class="post__date">
							<time class="published" datetime="2017-03-24T18:18">
								Hace 4 dias
							</time>
						</span>
					</li>

				</ul>				
				
				<!-- .. end W-Twitter -->
			</div>

			<div class="ui-block">
				<div style="background-color:lightgreen;" class="ui-block-title">
					<h6 class="title">Tareas Para Pasado Mañana</h6>
				</div>

				<!-- W-Twitter -->
				
				<ul class="widget w-twitter">
					<li class="twitter-item">
						<div class="author-folder">
							<img src="../../img/teacher.png" alt="avatar">
							<div class="author">
								<a href="#" class="author-name">Español</a>
								<a href="#" class="group">Hoy</a>
							</div>
						</div>
						<p>Presentar el Album de los poetas. con todos los nombre y obras mas famosas.
							<a href="#" class="link-post">Ver Tarea.</a></p>
						<span class="post__date">
							<time class="published" datetime="2017-03-24T18:18">
								Hace una semana
							</time>
						</span>
					</li>
					
					<li class="twitter-item">
						<div class="author-folder">
							<img src="../../img/teacher.png" alt="avatar">
							<div class="author">
								<a href="#" class="author-name">Tecnología</a>
								<a href="#" class="group">Hoy</a>
							</div>
						</div>
						<p>Presentar el Album de los poetas. con todos los nombre y obras mas famosas.
							<a href="#" class="link-post">Ver Tarea.</a></p>
						<span class="post__date">
							<time class="published" datetime="2017-03-24T18:18">
								Hace 4 dias
							</time>
						</span>
					</li>

				</ul>				
				
				<!-- .. end W-Twitter -->
			</div>

			{{-- <div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Last Videos</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>
				<div class="ui-block-content">
					<!-- W-Latest-Video -->
					
					<ul class="widget w-last-video">
						<li>
							<a href="https://vimeo.com/ondemand/viewfromabluemoon4k/147865858" class="play-video play-video--small">
								<svg class="olymp-play-icon">
									<use xlink:href="../../svg-icons/sprites/icons.svg#olymp-play-icon"></use>
								</svg>
							</a>
							<img src="../../img/video8.jpg" alt="video">
							<div class="video-content">
								<div class="title">System of a Revenge - Hypnotize...</div>
								<time class="published" datetime="2017-03-24T18:18">3:25</time>
							</div>
							<div class="overlay"></div>
						</li>
						<li>
							<a href="https://youtube.com/watch?v=excVFQ2TWig" class="play-video play-video--small">
								<svg class="olymp-play-icon">
									<use xlink:href="../../svg-icons/sprites/icons.svg#olymp-play-icon"></use>
								</svg>
							</a>
							<img src="../../img/video7.jpg" alt="video">
							<div class="video-content">
								<div class="title">Green Goo - Live at Dan’s Arena</div>
								<time class="published" datetime="2017-03-24T18:18">5:48</time>
							</div>
							<div class="overlay"></div>
						</li>
					</ul>
					
					<!-- .. end W-Latest-Video -->				</div>
			</div> --}}

		</div>
		{{-- FIN DEL PANEL DERECHO --}}


	</div>
</div>
{{-- FIN DEL PANEL CENTRAL --}}

<!-- Window-popup Update Header Photo -->

<div class="modal fade" id="update-header-photo" tabindex="-1" role="dialog" aria-labelledby="update-header-photo" aria-hidden="true">
	<div class="modal-dialog window-popup update-header-photo" role="document">
		<div class="modal-content">
			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
			</a>

			<div class="modal-header">
				<h6 class="title">Update Header Photo</h6>
			</div>

			<div class="modal-body">
				<a href="#" class="upload-photo-item">
				<svg class="olymp-computer-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-computer-icon"></use></svg>

				<h6>Upload Photo</h6>
				<span>Browse your computer.</span>
			</a>

				<a href="#" class="upload-photo-item" data-toggle="modal" data-target="#choose-from-my-photo">

			<svg class="olymp-photos-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-photos-icon"></use></svg>

			<h6>Choose from My Photos</h6>
			<span>Choose from your uploaded photos</span>
		</a>
			</div>
		</div>
	</div>
</div>


<!-- ... end Window-popup Update Header Photo -->

<!-- Window-popup Choose from my Photo -->

<div class="modal fade" id="choose-from-my-photo" tabindex="-1" role="dialog" aria-labelledby="choose-from-my-photo" aria-hidden="true">
	<div class="modal-dialog window-popup choose-from-my-photo" role="document">

		<div class="modal-content">
			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
			</a>
			<div class="modal-header">
				<h6 class="title">Choose from My Photos</h6>

				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-expanded="true">
							<svg class="olymp-photos-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-photos-icon"></use></svg>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-expanded="false">
							<svg class="olymp-albums-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-albums-icon"></use></svg>
						</a>
					</li>
				</ul>
			</div>

			<div class="modal-body">
				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active" id="home" role="tabpanel" aria-expanded="true">

						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="../../img/choose-photo1.jpg" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="../../img/choose-photo2.jpg" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="../../img/choose-photo3.jpg" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>

						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="../../img/choose-photo4.jpg" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="../../img/choose-photo5.jpg" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="../../img/choose-photo6.jpg" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>

						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="../../img/choose-photo7.jpg" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="../../img/choose-photo8.jpg" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="../../img/choose-photo9.jpg" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>


						<a href="#" class="btn btn-secondary btn-lg btn--half-width">Cancel</a>
						<a href="#" class="btn btn-primary btn-lg btn--half-width">Confirm Photo</a>

					</div>
					<div class="tab-pane" id="profile" role="tabpanel" aria-expanded="false">

						<div class="choose-photo-item" data-mh="choose-item">
							<figure>
								<img src="../../img/choose-photo10.jpg" alt="photo">
								<figcaption>
									<a href="#">South America Vacations</a>
									<span>Last Added: 2 hours ago</span>
								</figcaption>
							</figure>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<figure>
								<img src="../../img/choose-photo11.jpg" alt="photo">
								<figcaption>
									<a href="#">Photoshoot Summer 2016</a>
									<span>Last Added: 5 weeks ago</span>
								</figcaption>
							</figure>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<figure>
								<img src="../../img/choose-photo12.jpg" alt="photo">
								<figcaption>
									<a href="#">Amazing Street Food</a>
									<span>Last Added: 6 mins ago</span>
								</figcaption>
							</figure>
						</div>

						<div class="choose-photo-item" data-mh="choose-item">
							<figure>
								<img src="../../img/choose-photo13.jpg" alt="photo">
								<figcaption>
									<a href="#">Graffity & Street Art</a>
									<span>Last Added: 16 hours ago</span>
								</figcaption>
							</figure>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<figure>
								<img src="../../img/choose-photo14.jpg" alt="photo">
								<figcaption>
									<a href="#">Amazing Landscapes</a>
									<span>Last Added: 13 mins ago</span>
								</figcaption>
							</figure>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<figure>
								<img src="../../img/choose-photo15.jpg" alt="photo">
								<figcaption>
									<a href="#">The Majestic Canyon</a>
									<span>Last Added: 57 mins ago</span>
								</figcaption>
							</figure>
						</div>


						<a href="#" class="btn btn-secondary btn-lg btn--half-width">Cancel</a>
						<a href="#" class="btn btn-primary btn-lg disabled btn--half-width">Confirm Photo</a>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

<!-- ... end Window-popup Choose from my Photo -->


<a class="back-to-top" href="#" style="bottom: 10px;">
		<img src="../../svg-icons/back-to-top.svg" alt="arrow" class="back-icon">
	</a>
	
	<a class="back-to-top" href="#" style="bottom: 70px; line-height: 60px;">
		<svg class="olymp-comments-post-icon">
			<use xlink:href="../../svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
		</svg>
	</a>


<!-- Window-popup-CHAT for responsive min-width: 768px -->

<div class="ui-block popup-chat popup-chat-responsive" tabindex="-1" role="dialog" aria-labelledby="update-header-photo" aria-hidden="true">

	<div class="modal-content">
		<div class="modal-header">
			<span class="icon-status online"></span>
			<h6 class="title" >Chat</h6>
			<div class="more">
				<svg class="olymp-three-dots-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
				<svg class="olymp-little-delete js-chat-open"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
			</div>
		</div>
		<div class="modal-body">
			<div class="mCustomScrollbar">
				<ul class="notification-list chat-message chat-message-field">
					<li>
						<div class="author-thumb">
							<img src="../../img/avatar14-sm.jpg" alt="author" class="mCS_img_loaded">
						</div>
						<div class="notification-event">
							<span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img src="../../img/author-page.jpg" alt="author" class="mCS_img_loaded">
						</div>
						<div class="notification-event">
							<span class="chat-message-item">Don’t worry Mathilda!</span>
							<span class="chat-message-item">I already bought everything</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:29pm</time></span>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img src="../../img/avatar14-sm.jpg" alt="author" class="mCS_img_loaded">
						</div>
						<div class="notification-event">
							<span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
						</div>
					</li>
				</ul>
			</div>

			<form class="need-validation">

		<div class="form-group label-floating is-empty">
			<label class="control-label">Press enter to post...</label>
			<textarea class="form-control" placeholder=""></textarea>
			<div class="add-options-message">
				<a href="#" class="options-message">
					<svg class="olymp-computer-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-computer-icon"></use></svg>
				</a>
				<div class="options-message smile-block">

					<svg class="olymp-happy-sticker-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-happy-sticker-icon"></use></svg>

					<ul class="more-dropdown more-with-triangle triangle-bottom-right">
						<li>
							<a href="#">
								<img src="../../img/icon-chat1.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../img/icon-chat2.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../img/icon-chat3.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../img/icon-chat4.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../img/icon-chat5.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../img/icon-chat6.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../img/icon-chat7.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../img/icon-chat8.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../img/icon-chat9.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../img/icon-chat10.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../img/icon-chat11.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../img/icon-chat12.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../img/icon-chat13.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../img/icon-chat14.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../img/icon-chat15.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../img/icon-chat16.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../img/icon-chat17.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../img/icon-chat18.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../img/icon-chat19.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../img/icon-chat20.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../img/icon-chat21.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../img/icon-chat22.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../img/icon-chat23.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../img/icon-chat24.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../img/icon-chat25.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../img/icon-chat26.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../img/icon-chat27.png" alt="icon">
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

	</form>
		</div>
	</div>

</div>

<!-- ... end Window-popup-CHAT for responsive min-width: 768px -->


<!-- JS Scripts -->
<script src="../../js/jquery-3.2.1.js"></script>
<script src="../../js/jquery.appear.js"></script>
<script src="../../js/jquery.mousewheel.js"></script>
<script src="../../js/perfect-scrollbar.js"></script>
<script src="../../js/jquery.matchHeight.js"></script>
<script src="../../js/svgxuse.js"></script>
<script src="../../js/imagesloaded.pkgd.js"></script>
<script src="../../js/Headroom.js"></script>
<script src="../../js/velocity.js"></script>
<script src="../../js/ScrollMagic.js"></script>
<script src="../../js/jquery.waypoints.js"></script>
<script src="../../js/jquery.countTo.js"></script>
<script src="../../js/popper.min.js"></script>
<script src="../../js/material.min.js"></script>
<script src="../../js/bootstrap-select.js"></script>
<script src="../../js/smooth-scroll.js"></script>
<script src="../../js/selectize.js"></script>
<script src="../../js/swiper.jquery.js"></script>
<script src="../../js/moment.js"></script>
<script src="../../js/daterangepicker.js"></script>
<script src="../../js/simplecalendar.js"></script>
<script src="../../js/fullcalendar.js"></script>
<script src="../../js/isotope.pkgd.js"></script>
<script src="../../js/ajax-pagination.js"></script>
<script src="../../js/Chart.js"></script>
<script src="../../js/chartjs-plugin-deferred.js"></script>
<script src="../../js/circle-progress.js"></script>
<script src="../../js/loader.js"></script>
<script src="../../js/run-chart.js"></script>
<script src="../../js/jquery.magnific-popup.js"></script>
<script src="../../js/jquery.gifplayer.js"></script>
<script src="../../js/mediaelement-and-player.js"></script>
<script src="../../js/mediaelement-playlist-plugin.min.js"></script>
<script src="../../js/ion.rangeSlider.js"></script>
<script src="../../js/base-init.js"></script>
<script defer src="../../fonts/fontawesome-all.js"></script>
<script src="../../Bootstrap/dist/js/bootstrap.bundle.js"></script>
<script src="../../js/toastr.min.js"></script>

</body>
</html>