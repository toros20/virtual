<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Plataforma ISJC</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="{{ URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="{{ URL::asset('css/mdb.min.css')}}" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="{{ URL::asset('css/style.css')}}" rel="stylesheet">

  <!-- MDBootstrap Cards Extended Pro  -->
 
</head>

  {{-- <div id="mdb-preloader" class="flex-center">
    <div id="preloader-markup"></div>
  </div> --}}

  <!-- Start your project here-->
  <body class="hidden-sn mdb-skin">

    <!--Double navigation-->
    <header>
        <!-- Sidebar navigation -->
        <div id="slide-out" class="side-nav sn-bg-4">
          <ul class="custom-scrollbar">
            <!-- Logo -->
            <li>
              <div class="logo-wrapper waves-light">
                <a href="#"><img style="height: 100px;" src="{{ URL::asset('img/logo-sanjose.PNG')}}" class="img-fluid flex-center"></a>
              </div>
            </li>
            
            <li>
              <ul class="collapsible collapsible-accordion">
                  <ul>
                      <li>
                       <p align=center> Listado de Estudiantes</p>
                      </li>
                      <hr>
                      @foreach ($asignaciones as $asignacion)
                        <li>
                        <a href="{{ $url = route('teachers/students/{user_id}/{course_id}/{section}', [$asignacion->user_id,$asignacion->course_id,$asignacion->section])}}">
                         
                             {{$asignacion->course}} - {{$asignacion->section }}
                          
                        </a>
                      </li>
                      @endforeach
                     
                    </ul>
              </ul>
            </li>
            <!--/. Side navigation links -->
          </ul>
          <div class="sidenav-bg mask-strong"></div>
        </div>
        <!--/. Sidebar navigation -->
        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">
          <!-- SideNav slide-out button -->
          <div class="float-left">
             <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a> 
          </div>
          <!-- Breadcrumb-->
          <div class="breadcrumb-dn mr-auto">
             <p>Menú de Navegación</p> 
          </div>
          <ul class="nav navbar-nav nav-flex-icons ml-auto">
            
             
            <li class="nav-item">
              <a class="nav-link"> <span class="clearfix d-none d-sm-inline-block"> Bienvenido {{ $user->name }}</span></a>
            </li>
            
            <li class="nav-item">
                
                  <form action="{{ route('logout') }}" method="POST">
                      <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                      <button class="btn btn-sm btn-danger" type="submit">SALIR</button>
                  </form>
              {{-- <a class="nav-link"> <span class="clearfix d-none d-sm-inline-block"> SALIR</span></a> --}}
            </li>
            
          </ul>
        </nav>
        <!-- /.Navbar -->
    </header>
    <!--/.Double navigation-->
  
    <!--Main Layout-->
    <main>
      <div class="container-fluid">
        <!--row-->
        <div class="row"> 

            {{-- variables para controlar el cambio de color en las tarjetas --}}
        
            @foreach ($students as $student)
            
                <!-- Card Regular -->
                <div class="card card-cascade col-3">

                <!-- Card image -->
                <div class="view view-cascade overlay">
                    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/men.jpg" alt="Card image cap">
                    <a>
                    <div class="mask rgba-white-slight"></div>
                    </a>
                </div>

                <!-- Card content -->
                <div class="card-body card-body-cascade text-center">

                    <!-- Title -->
                    <h4 class="card-title"><strong>{{$student->name}} {{$student->lastname}}</strong></h4>
                    <!-- Subtitle -->
                    <h6 class="font-weight-bold indigo-text py-2">{{$student->cuenta}}</h6>
                    <!-- Text -->
                    <p class="card-text">Estudiante del Instituto San José del Carmen 2020.
                    </p>

                    <!-- Facebook -->
                    <a type="button" class="btn-floating btn-small btn-fb"><i class="fab fa-facebook-f"></i></a>
                    <!-- Twitter -->
                    <a type="button" class="btn-floating btn-small btn-tw"><i class="fab fa-twitter"></i></a>
                    <!-- Google + -->
                    <a type="button" class="btn-floating btn-small btn-dribbble"><i class="fab fa-dribbble"></i></a>

                </div>

                </div>
                <!-- Card Regular -->
                   
                
            @endforeach
           
                
        </div><!--row-->

         </div><!--container-->

     </main>
 <!--Main Layout-->
<br><br>
   

   

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="{{ URL::asset('js/jquery-3.3.1.min.js')}}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{ URL::asset('js/popper4.min.js')}}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{ URL::asset('js/bootstrap4.min.js')}}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{ URL::asset('js/mdb.min.js')}}"></script>
</body>

</html>