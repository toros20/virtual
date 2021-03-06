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
                       <p align=center> Acumulativos</p>
                      </li>
                      <hr>
                      @foreach ($asignaciones as $asignacion)
                        <li><a href="">
                         
                             {{$asignacion->course}} - {{$asignacion->section }} - {{$asignacion->clase}}
                          
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
            @php ($course = $asignaciones[0]->course_id)
            @php ($con = 1)

            @foreach ($asignaciones as $asignacion)
            
            <!--Card column-->
            <div class="col-md-6 col-sm-6 col-lg-3 mb-4">
        
                    <!-- Card -->
                    <div class="card gradient-card">
                
                        <div class="card-image" style="background-image: url(https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20%2814%29.jpg)">
                
                            <!-- Content -->
                                {{-- Proceso para controlar el cambio de color, soy un crack en esto --}}
                                @if ($course != $asignacion->course_id)
                                    @php ($con += 1 ) 
                                      @if ($con>4)
                                       @php ($con = 1)                   
                                      @endif
                                    @php ($course = $asignacion->course_id ) 
                                @endif
                                @if ($con == 1)<div class="text-white d-flex h-100 mask blue-gradient-rgba">        
                                @endif
                                @if ($con == 2)<div class="text-white d-flex h-100 mask peach-gradient-rgba">                             
                                @endif
                                @if ($con == 3)<div class="text-white d-flex h-100 mask aqua-gradient-rgba">                             
                                @endif
                                @if ($con == 4)<div class="text-white d-flex h-100 mask purple-gradient-rgba">                             
                                @endif
                            
                                <div class="first-content align-self-center p-3">
                                <h3 class="card-title"> {{$asignacion->course}} - {{$asignacion->section }} </h3>
                                <p class="lead mb-0">{{$asignacion->clase}}</p>
                                </div>
                                <div class="second-content align-self-center mx-auto text-center">
                                <i class="fa fa-money fa-3x"></i>
                                </div>
                            </div>
                        
                
                        </div>
                        <div class="card-body card-body-cascade ">
                           {{-- modalidad  Prescolar --}}
                           @if ($modalidad ==1 )
                           <ul class="list-group">
                               <a class="list-group-item list-group-item-action" style="color:black" href="{{ $url = route('teachers/students/{user_id}/{course_id}/{section}', [$asignacion->user_id,$asignacion->course_id,$asignacion->section])}} ">
                                   <li class="list-group-item">
                                       <div class="md-v-line"></div><i class="fas fa-user mr-5"></i>Estudiantes
                                   </li>
                               </a>
                              <a class="list-group-item list-group-item-action" style="color:black" href="{{ $url = route('teachers/acumulativos/{user_id}/{course_id}/{section}/{clase}/{parcial}', [$asignacion->user_id,$asignacion->course_id,$asignacion->section,$asignacion->clase_id,1])}} ">
                                   {{--<a class="list-group-item list-group-item-action" style="color:black" href="#"> --}}
                                       <li class="list-group-item">
                                           <div class="md-v-line"></div><i class="fas fa-edit mr-5"></i>Acumulativos
                                       </li>
                                   </a>
                                    <a class="list-group-item list-group-item-action" style="color:black" href="{{ $url = route('teachers/examen/{user_id}/{course_id}/{section}/{clase}', [$asignacion->user_id,$asignacion->course_id,$asignacion->section,$asignacion->clase_id])}} ">
                                    {{-- <a class="list-group-item list-group-item-action" style="color:black" href="#">--}}
                                       <li class="list-group-item">
                                           <div class="md-v-line"></div><i class="fas fa-user-edit mr-5"></i>Examen
                                       </li>
                                   </a>
                               {{-- <a class="list-group-item list-group-item-action" style="color:black" href="{{ $url = route('teachers/descargas/{user_id}/{course_id}/{section}/{clase}', [$asignacion->user_id,$asignacion->course_id,$asignacion->section,$asignacion->clase_id])}} "> --}}
                               <a class="list-group-item list-group-item-action" style="color:black" href="#">   
                                 <li class="list-group-item">
                                       <div class="md-v-line"></div><i class="fas fa-download mr-5"></i>Descargas
                                   </li>
                               </a>
                          </ul> 
                         @endif 


                          {{-- modalidad de primaria  --}}
                          @if ($modalidad ==2 )
                            <ul class="list-group">
                                <a class="list-group-item list-group-item-action" style="color:black" href="{{ $url = route('teachers/students/{user_id}/{course_id}/{section}', [$asignacion->user_id,$asignacion->course_id,$asignacion->section])}} ">
                                    <li class="list-group-item">
                                        <div class="md-v-line"></div><i class="fas fa-user mr-5"></i>Estudiantes
                                    </li>
                                </a>
                              <a class="list-group-item list-group-item-action" style="color:black" href="{{ $url = route('teachers/acumulativos/{user_id}/{course_id}/{section}/{clase}/{parcial}', [$asignacion->user_id,$asignacion->course_id,$asignacion->section,$asignacion->clase_id,1])}} "> 
                                   {{--<a class="list-group-item list-group-item-action" style="color:black" href="#">--}}
                                        <li class="list-group-item">
                                            <div class="md-v-line"></div><i class="fas fa-edit mr-5"></i>Acumulativos
                                        </li>
                                    </a>
                                     <a class="list-group-item list-group-item-action" style="color:black" href="{{ $url = route('teachers/examen/{user_id}/{course_id}/{section}/{clase}', [$asignacion->user_id,$asignacion->course_id,$asignacion->section,$asignacion->clase_id])}} ">
                                      {{--<a class="list-group-item list-group-item-action" style="color:black" href="#">--}}
                                        <li class="list-group-item">
                                            <div class="md-v-line"></div><i class="fas fa-user-edit mr-5"></i>Examen
                                        </li>
                                    </a>
                                {{-- <a class="list-group-item list-group-item-action" style="color:black" href="{{ $url = route('teachers/descargas/{user_id}/{course_id}/{section}/{clase}', [$asignacion->user_id,$asignacion->course_id,$asignacion->section,$asignacion->clase_id])}} "> --}}
                                  <a class="list-group-item list-group-item-action" style="color:black" href="{{ $url = route('teachers/cuadrouno/{user_id}/{course_id}/{section}/{clase}', [$asignacion->user_id,$asignacion->course_id,$asignacion->section,$asignacion->clase_id])}} ">
                                    {{-- <a class="list-group-item list-group-item-action" style="color:black" href="#">     --}}
                                      <li class="list-group-item">
                                            <div class="md-v-line"></div><i class="fas fa-download mr-5"></i>Cuadro Uno
                                        </li>
                                    </a>
                           </ul> 
                          @endif 
                          
                          {{-- modalidad de secudaria --}}
                          @if ($modalidad >2 )
                            <ul class="list-group">
                                <a class="list-group-item list-group-item-action" style="color:black" href="{{ $url = route('teachers/students/{user_id}/{course_id}/{section}', [$asignacion->user_id,$asignacion->course_id,$asignacion->section])}} ">
                                    <li class="list-group-item">
                                        <div class="md-v-line"></div><i class="fas fa-user mr-5"></i>Estudiantes
                                    </li>
                                </a>
                                <a class="list-group-item list-group-item-action" style="color:black" href="{{ $url = route('teachers/acumulativos/{user_id}/{course_id}/{section}/{clase}/{parcial}', [$asignacion->user_id,$asignacion->course_id,$asignacion->section,$asignacion->clase_id,1])}} "> 
                                 {{--<a class="list-group-item list-group-item-action" style="color:black" href="#">--}}
                                    <li class="list-group-item">
                                        <div class="md-v-line"></div><i class="fas fa-edit mr-5"></i>Acumulativos
                                    </li>
                                </a>
                                 <a class="list-group-item list-group-item-action" style="color:black" href="{{ $url = route('teachers/examen/{user_id}/{course_id}/{section}/{clase}', [$asignacion->user_id,$asignacion->course_id,$asignacion->section,$asignacion->clase_id])}} ">
                                  {{--<a class="list-group-item list-group-item-action" style="color:black" href="#"> --}}
                                    <li class="list-group-item">
                                        <div class="md-v-line"></div><i class="fas fa-user-edit mr-5"></i>Notas
                                    </li>
                                </a>
                               <a class="list-group-item list-group-item-action" style="color:black" href="{{ $url = route('teachers/cuadrouno/{user_id}/{course_id}/{section}/{clase}', [$asignacion->user_id,$asignacion->course_id,$asignacion->section,$asignacion->clase_id])}} ">
                                {{-- <a class="list-group-item list-group-item-action" style="color:black" href="#">     --}}
                                  <li class="list-group-item">
                                        <div class="md-v-line"></div><i class="fas fa-download mr-5"></i>Cuadro Uno
                                    </li>
                                </a>
                                
                            </ul> 
                          @endif 
                           

                        </div>
                    </div>
    
            </div>
            <!-- Card -->
                   
                
            @endforeach
           
                
        </div><!--row-->

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