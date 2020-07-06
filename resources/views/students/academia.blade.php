<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Area Académica Estudiantíl</title>
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
      {{-- <div id="slide-out" class="side-nav sn-bg-4">
        <ul class="custom-scrollbar">
          <!-- Logo -->
          <li>
            <div class="logo-wrapper waves-light">
              <a href="#"><img src="https://mdbootstrap.com/img/logo/mdb-transparent.png" class="img-fluid flex-center"></a>
            </div>
          </li>
          <!--/. Logo -->
          <!--Social-->
          <li>
            <ul class="social">
              <li><a href="#" class="icons-sm fb-ic"><i class="fab fa-facebook-f"> </i></a></li>
              <li><a href="#" class="icons-sm pin-ic"><i class="fab fa-pinterest"> </i></a></li>
              <li><a href="#" class="icons-sm gplus-ic"><i class="fab fa-google-plus-g"> </i></a></li>
              <li><a href="#" class="icons-sm tw-ic"><i class="fab fa-twitter"> </i></a></li>
            </ul>
          </li>
          <!--/Social-->
          <!--Search Form-->
          <li>
            <form class="search-form" role="search">
              <div class="form-group md-form mt-0 pt-1 waves-light">
                <input type="text" class="form-control" placeholder="Search">
              </div>
            </form>
          </li>
          <!--/.Search Form-->
          <!-- Side navigation links -->
          <li>
            <ul class="collapsible collapsible-accordion">
              <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-chevron-right"></i> Submit
                  blog<i class="fas fa-angle-down rotate-icon"></i></a>
                <div class="collapsible-body">
                  <ul>
                    <li><a href="#" class="waves-effect">Submit listing</a>
                    </li>
                    <li><a href="#" class="waves-effect">Registration form</a>
                    </li>
                  </ul>
                </div>
              </li>
              <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-hand-pointer-o"></i>
                  Instruction<i class="fas fa-angle-down rotate-icon"></i></a>
                <div class="collapsible-body">
                  <ul>
                    <li><a href="#" class="waves-effect">For bloggers</a>
                    </li>
                    <li><a href="#" class="waves-effect">For authors</a>
                    </li>
                  </ul>
                </div>
              </li>
              <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-eye"></i> About<i class="fas fa-angle-down rotate-icon"></i></a>
                <div class="collapsible-body">
                  <ul>
                    <li><a href="#" class="waves-effect">Introduction</a>
                    </li>
                    <li><a href="#" class="waves-effect">Monthly meetings</a>
                    </li>
                  </ul>
                </div>
              </li>
              <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-envelope-o"></i> Contact me<i
                    class="fas fa-angle-down rotate-icon"></i></a>
                <div class="collapsible-body">
                  <ul>
                    <li><a href="#" class="waves-effect">FAQ</a>
                    </li>
                    <li><a href="#" class="waves-effect">Write a message</a>
                    </li>
                    <li><a href="#" class="waves-effect">FAQ</a>
                    </li>
                    <li><a href="#" class="waves-effect">Write a message</a>
                    </li>
                    <li><a href="#" class="waves-effect">FAQ</a>
                    </li>
                    <li><a href="#" class="waves-effect">Write a message</a>
                    </li>
                    <li><a href="#" class="waves-effect">FAQ</a>
                    </li>
                    <li><a href="#" class="waves-effect">Write a message</a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </li>
          <!--/. Side navigation links -->
        </ul>
        <div class="sidenav-bg mask-strong"></div>
      </div> --}}
      <!--/. Sidebar navigation -->
      <!-- Navbar -->
      <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">
        <!-- SideNav slide-out button -->
        <div class="float-left">
           <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a> 
        </div>
        <!-- Breadcrumb-->
        <div class="breadcrumb-dn mr-auto">
          <p Bienvenido {{ $user->name }}></p>
          {{-- <p>Menú de Navegación</p> --}}
        </div>
        <ul class="nav navbar-nav nav-flex-icons ml-auto">
          
            <li class="nav-item">
              <a class="nav-link"> <span class="clearfix d-none d-sm-inline-block"> Bienvenido {{ $user->name }}</span></a>
            </li>
            
            <li class="nav-item">
              <form action="{{ route('logout') }}" method="POST">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <button type="submit">
                  <span>Salir</span>
                </button>
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
            @php ($clase = $asignaciones[0]->clase_id)
          
            <!--Card column-->
            <div class="col-md-6 col-sm-6 col-lg-3 mb-4">
        
                <!-- Card -->
                <div class="card gradient-card">
            
                    <div class="card-image" style="background-image: url(https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20%2814%29.jpg)">
            
                        <!-- Content -->
                            {{-- Proceso para controlar el cambio de color, soy un crack en esto --}}
                            
                            <div class="text-white d-flex h-100 mask blue-gradient-rgba">        
                        
                            <div class="first-content align-self-center p-3">
                                <h3 class="card-title"> OPCIONES  </h3>
                            
                            </div>
                            <div class="second-content align-self-center mx-auto text-center">
                            <i class="fa fa-money fa-3x"></i>
                            </div>
                        </div>
                    
            
                    </div>
                    <div class="card-body card-body-cascade ">

                      @if ($asignaciones[0]->is_semestral == 1)
                      <ul class="list-group">
                          @if ($enroll[0]->course_id > 8)
                            <a target="_blank" class="list-group-item list-group-item-action" style="color:black" href="{{ $url = route('users/boleta_acumulativos/{course_id}/{section}/{user_id}', [$enroll[0]->course_id,$enroll[0]->section,$user->id])}} ">
                              <li class="list-group-item">
                                  <div class="md-v-line"></div><i class="fas fa-star mr-5"></i>Reporte Académico (II Parcial)
                              </li>
                            </a> 
                          @else 
                            <a target="_blank" class="list-group-item list-group-item-action" style="color:black" href="#">
                              <li class="list-group-item">
                                  <div class="md-v-line"></div><i class="fas fa-star mr-5"></i>Reporte Académico (II Parcial)
                              </li>
                          </a> 
                          @endif

                         {{--  <a target="_blank" class="list-group-item list-group-item-action" style="color:black" href="{{ $url = route('users/boleta_acumulativos/{course_id}/{section}/{user_id}', [$enroll[0]->course_id,$enroll[0]->section,$user->id])}} ">
                              <li class="list-group-item">
                                  <div class="md-v-line"></div><i class="fas fa-star mr-5"></i>Acumulativos
                              </li>
                          </a> --}} 

                            {{--<a class="list-group-item list-group-item-action" style="color:black" href="{{ $url = route('students/acumulativos/{user_id}/{clase}/{parcial}', [$user->id,$clase,1])}} "> --}}
                         <a class="list-group-item list-group-item-action" style="color:black" href="#">
                            
                              <li style="background-color:#a9a9a9;cursor: not-allowed;" class="list-group-item">
                                  <div class="md-v-line"></div><i class="fas fa-star mr-5"></i>I Parcial
                              </li>
                          </a>

                          {{-- <a class="list-group-item list-group-item-action" style="color:black" href="{{ $url = route('students/acumulativos/{user_id}/{clase}/{parcial}', [$user->id,$clase,2])}}"> --}}
                           <a class="list-group-item list-group-item-action" style="color:black" href="#">
                              <li style="background-color:#a9a9a9;cursor: not-allowed;" class="list-group-item">
                                  <div class="md-v-line"></div><i class="fas fa-star mr-5"></i>II Parcial 
                              </li>
                          </a> 

                          <a class="list-group-item list-group-item-action" style="color:black" href="{{ $url = route('students/acumulativos/{user_id}/{clase}/{parcial}', [$user->id,$clase,3])}}">
                              <li class="list-group-item">
                                  <div class="md-v-line"></div><i class="fas fa-star mr-5"></i>III Parcial
                              </li>
                          </a>

                          <a class="list-group-item list-group-item-action" style="color:black" href="{{ $url = route('students/acumulativos/{user_id}/{clase}/{parcial}', [$user->id,$clase,4])}}">
                              <li class="list-group-item">
                                  <div class="md-v-line"></div><i class="fas fa-star mr-5"></i>IV Parcial
                              </li>
                          </a> 
                      
                      </ul> 

                      @endif

                      @if ($asignaciones[0]->is_semestral == 0)
                      <ul class="list-group">

                           @if ($enroll[0]->course_id > 2)
                             <a target="_blank" class="list-group-item list-group-item-action" style="color:black" href="{{ $url = route('users/boleta_acumulativos/{course_id}/{section}/{user_id}', [$enroll[0]->course_id,$enroll[0]->section,$user->id])}} "> 
                            {{--<a target="_blank" class="list-group-item list-group-item-action" style="color:black" href="#">--}}
                            
                              <li class="list-group-item">
                                  <div class="md-v-line"></div><i class="fas fa-star mr-5"></i>Reporte Académico (II Parcial)
                              </li>
                            </a> 
                          @else 
                            <a target="_blank" class="list-group-item list-group-item-action" style="color:black" href="#">
                              <li class="list-group-item">
                                  <div class="md-v-line"></div><i class="fas fa-star mr-5"></i>Reporte Académico (II Parcial)
                              </li>
                          </a> 
                          @endif
                           <a class="list-group-item list-group-item-action" style="color:black" href="{{ $url = route('students/acumulativos/{user_id}/{clase}/{parcial}', [$user->id,$clase,1])}} "> 
                          {{--<a class="list-group-item list-group-item-action" style="color:black" href="#">--}}
                          
                              <li class="list-group-item">
                                  <div class="md-v-line"></div><i class="fas fa-star mr-5"></i>I Parcial
                              </li>
                          </a>

                          <a class="list-group-item list-group-item-action" style="color:black" href="{{ $url = route('students/acumulativos/{user_id}/{clase}/{parcial}', [$user->id,$clase,2])}}">
                              <li class="list-group-item">
                                  <div class="md-v-line"></div><i class="fas fa-star mr-5"></i>II Parcial
                              </li>
                          </a>

                          <a class="list-group-item list-group-item-action" style="color:black" href="{{ $url = route('students/acumulativos/{user_id}/{clase}/{parcial}', [$user->id,$clase,3])}}">
                              <li class="list-group-item">
                                  <div class="md-v-line"></div><i class="fas fa-star mr-5"></i>III Parcial
                              </li>
                          </a>

                          <a class="list-group-item list-group-item-action" style="color:black" href="{{ $url = route('students/acumulativos/{user_id}/{clase}/{parcial}', [$user->id,$clase,4])}}">
                              <li class="list-group-item">
                                  <div class="md-v-line"></div><i class="fas fa-star mr-5"></i>IV Parcial
                              </li>
                          </a> 
                      
                      </ul> 

                      @endif
                                    
                    </div>
                </div>
                 <!-- fin de Card -->

            </div>
            {{-- 
            <div class="col-md-6 col-sm-6 col-lg-3 mb-4">
                <!-- Card -->
                <div class="card gradient-card">
           
                       <div class="card-image" style="background-image: url(https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20%2814%29.jpg)">
               
                              <!-- Content -->
                               {{-- Proceso para controlar el cambio de color, soy un crack en esto --}}
                               
                           {{--     <div class="text-white d-flex h-100 mask aqua-gradient-rgba">        
                           
                                  <div class="first-content align-self-center p-3">
                                      <h3 class="card-title"> Descargar Planes  </h3>
                                  
                                  </div>
                                  <div class="second-content align-self-center mx-auto text-center">
                                    <i class="fa fa-money fa-3x"></i>
                                  </div>
                              </div> --}}
                       
                      {{--  </div>
                       <div class="card-body card-body-cascade ">
                                       
                          <ul class="list-group">
  
                            <a class="list-group-item list-group-item-action" style="color:black" href="#">
                              <li class="list-group-item">
                                  <div class="md-v-line"></div><i class="fas fa-download mr-5"></i>Plan del I Parcial
                              </li>
                            </a>
  
                            <a class="list-group-item list-group-item-action" style="color:black" href="#">
                                <li class="list-group-item">
                                    <div class="md-v-line"></div><i class="fas fa-download mr-5"></i>Plan del II Parcial
                                </li>
                            </a>
  
                            <a class="list-group-item list-group-item-action" style="color:black" href="#">
                                <li class="list-group-item">
                                    <div class="md-v-line"></div><i class="fas fa-download mr-5"></i>Plan del III Parcial
                                </li>
                            </a>
  
                            <a class="list-group-item list-group-item-action" style="color:black" href="#">
                                <li class="list-group-item">
                                    <div class="md-v-line"></div><i class="fas fa-download mr-5"></i>Plan del IV Parcial
                                </li>
                            </a> 
                    
                          </ul> 
                       </div>
                </div>
               <!-- fin de Card --> --}}
              {{--  </div> --}}

            {{-- <div class="col-md-6 col-sm-6 col-lg-3 mb-4">
                 <!-- Card -->
                 <div class="card gradient-card">
            
                        <div class="card-image" style="background-image: url(https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20%2814%29.jpg)">
                
                            <!-- Content -->
                                {{-- Proceso para controlar el cambio de color, soy un crack en esto --}}
                          {{--       
                                <div class="text-white d-flex h-100 mask peach-gradient-rgba">        
                            
                                <div class="first-content align-self-center p-3">
                                    <h3 class="card-title"> Elecciones  </h3>
                                
                                </div>
                                <div class="second-content align-self-center mx-auto text-center">
                                <i class="fa fa-money fa-3x"></i>
                                </div>
                            </div>
                        
                
                        </div>
                        <div class="card-body card-body-cascade ">
                                        
                            <ul class="list-group">
    
                                    <a class="list-group-item list-group-item-action" style="color:black" href="#">
                                    <li class="list-group-item">
                                        <div class="md-v-line"></div><i class="fas fa-vote-yea mr-5"></i>Votaciones
                                    </li>
                                </a>
    
                                <a class="list-group-item list-group-item-action" style="color:black" href="#">
                                    <li class="list-group-item">
                                        <div class="md-v-line"></div><i class="fas fa-chart-pie mr-5"></i>Resultados
                                    </li>
                                </a>
    
                               
                            
                            </ul> 
                        </div>
                </div>
                <!-- fin de Card -->
            </div> --}}
           

           {{--  <div class="col-md-6 col-sm-6 col-lg-3 mb-4">
                    <!-- Card -->
                    <div class="card gradient-card">
               
                           <div class="card-image" style="background-image: url(https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20%2814%29.jpg)">
                   
                               <!-- Content -->
                                   {{-- Proceso para controlar el cambio de color, soy un crack en esto --}}
                                   
                               {{--     <div class="text-white d-flex h-100 mask purple-gradient-rgba">        
                               
                                   <div class="first-content align-self-center p-3">
                                       <h3 class="card-title"> Datos  </h3>
                                   
                                   </div>
                                   <div class="second-content align-self-center mx-auto text-center">
                                   <i class="fa fa-money fa-3x"></i>
                                   </div>
                               </div>
                           
                   
                           </div>
                           <div class="card-body card-body-cascade ">
                                           
                               <ul class="list-group">
       
                                       <a class="list-group-item list-group-item-action" style="color:black" href="#">
                                       <li class="list-group-item">
                                           <div class="md-v-line"></div><i class="fas fa-chart-line mr-5"></i>Estad&iacute;sticas
                                       </li>
                                   </a>
       
                                   <a class="list-group-item list-group-item-action" style="color:black" href="#">
                                       <li class="list-group-item">
                                           <div class="md-v-line"></div><i class="fas fa-edit mr-5"></i>Encuestas
                                       </li>
                                   </a>
                               
                               </ul> 
                           </div>
                   </div>
                   <!-- fin de Card -->
           --}} 
          </div> 

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