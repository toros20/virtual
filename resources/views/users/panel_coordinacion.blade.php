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
                       <p align=center> Navegación</p>
                      </li>
                      <hr>
                         @foreach ($docentes as $docente)
                            <li>
                              <a href="{{ $url = route('users/coordinacion/{user_id}/{teacher_id}/{parcial}', [$user->id,$docente->id,1])}} ">
                                  Lic. {{$docente->name }} - {{$docente->lastname }}
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
            @php ($course = $secciones[0]->course_id)
            @php ($con = 1)

            @foreach ($secciones as $seccion)
                          
            <!--Card column-->
            <div class="col-md-12 col-sm-12 col-lg-12 mb-4">
        
                    <!-- Card -->
                    <div class="card gradient-card">
                
                        <div class="card-image" style="background-image: url(https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20%2814%29.jpg)">
                
                            <!-- Content -->
                                {{-- Proceso para controlar el cambio de color, soy un crack en esto --}}
                                 @if ($course != $seccion->course_id)
                                    @php ($con += 1 ) 
                                      @if ($con>4)
                                       @php ($con = 1)                   
                                      @endif
                                    @php ($course = $seccion->course_id ) 
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
                                <h3 class="card-title"> {{$seccion->course}} - {{$seccion->section }} </h3>
                                <p class="lead mb-0">Gestión Académica</p>
                                </div>
                                <div class="second-content align-self-center mx-auto text-center">
                                <i class="fa fa-money fa-3x"></i>
                                </div>
                            </div>
                        
                
                        </div>
                        <div class="card-body card-body-cascade ">
                                        
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Docente</th>
                                  <th scope="col">Asignatura</th>
                                  <th scope="col">Acumulativo</th>
                                  <th scope="col">Archivos</th>
                                  <th scope="col">Videos</th>
                                  <th scope="col">Enlaces</th>
                                  <th scope="col">Examen</th>
                                  <th scope="col"># Apro</th>
                                  <th scope="col"># Repro</th>
                                  
                                </tr>
                              </thead>
                              <tbody>
                               <?php
                                  //OJO CON EL SEMESTRE
                                  $asignaciones =   DB::table('users')
                                        ->join('assignments', 'users.id', '=', 'assignments.user_id')
                                        ->join('clases', 'assignments.clase_id', '=', 'clases.id')
                                        ->where ([
                                            ['users.role', '=', 'teacher'],
                                            ['assignments.course_id', '=', $seccion->course_id],
                                             ['clases.semester', '<',2 ],
                                            ['assignments.section', '=', $seccion->section ]                        
                                        ])
                                        ->Select('users.name','users.lastname','users.id as teacher_id','clases.short_name','clases.id as clase_id')
                                        ->distinct()
                                        ->get(); 
                                        
                              ?>

                              @foreach ($asignaciones as $asignacion)
                                <?php
                                  $total_clase=0; 
                                  $total_evaluado=0;
                                  $tbl_task = 'task_'.$seccion->course_id.'_'.strtolower($seccion->section);
                                  $resultados= DB::table($tbl_task)
                                              ->where ([
                                                          [$tbl_task.'.clase', '=', $asignacion->clase_id],
                                                          [$tbl_task.'.parcial', '=', $parcial]
                                                      ])
                                              ->Select($tbl_task.'.valor',$tbl_task.'.evaluada')
                                              ->get();

                                    foreach ($resultados as $resultado) {
                                        
                                        $total_clase+= $resultado->valor;

                                        if($resultado->evaluada == 1){
                                            $total_evaluado+= $resultado->valor;
                                        }                                       
                                    }// fin del ciclo resultados
                                    // CONTEO DE VIDEOS
                                    $total_videos=0;
                                    $videos= DB::table('videos')
                                              ->where ([
                                                          ['videos'.'.course_id', '=',$seccion->course_id],
                                                          ['videos'.'.section', '=',strtolower($seccion->section)],
                                                          ['videos'.'.clase_id', '=', $asignacion->clase_id],
                                                          ['videos'.'.parcial', '=', $parcial]
                                                      ])
                                              ->count();
                                   
                                    $total_videos=$videos;

                                    $links= DB::table('links')
                                              ->where ([
                                                          ['links'.'.course_id', '=',$seccion->course_id],
                                                          ['links'.'.section', '=',strtolower($seccion->section)],
                                                          ['links'.'.clase_id', '=', $asignacion->clase_id],
                                                          ['links'.'.parcial', '=', $parcial]
                                                      ])
                                              ->count();
                                    $total_links=$links;
                                    
                                    // CONTEO DE ARCHIVOS
                                    $total_files=0;
                                    $files= DB::table('files')
                                              ->where ([
                                                          ['files'.'.course_id', '=',$seccion->course_id],
                                                          ['files'.'.section', '=',strtolower($seccion->section)],
                                                          ['files'.'.clase_id', '=', $asignacion->clase_id],
                                                          ['files'.'.parcial', '=', $parcial]
                                                      ])
                                              ->count();
                                             
                                     $total_files=$files;

                                ?>
                                <tr>
                                  <th scope="row">1</th>
                                  <td> <h6> <a style="color:blue" target="_blanck"  href="{{ $url = route('teachers/acumulativos/{user_id}/{course_id}/{section}/{clase}/{parcial}', [$asignacion->teacher_id,$seccion->course_id,$seccion->section,$asignacion->clase_id,2])}} "> Lic. {{$asignacion->name}}  {{$asignacion->lastname}}</a></h6></td>
                                  <td>{{$asignacion->short_name}}</td>

                                  <?php 
                                    if($total_clase == 0){?>
                                      <td style="color:red">{{$total_evaluado}}/{{$total_clase}}</td>
                                  <?php } elseif($total_clase == $total_evaluado){?>
                                      <td style="color:green">{{$total_evaluado}}/{{$total_clase}}</td>
                                  <?php } else {?>
                                      <td >{{$total_evaluado}}/{{$total_clase}}</td>
                                  <?php } ?>

                                  <td>{{$total_files}}</td>
                                  <td>{{$total_videos}}</td>
                                  <td>{{$total_links}}</td>
                                  <td>Pendiente</td>
                                  <td>---</td>
                                  <td>---</td>
                                </tr>
                                @endforeach {{-- fin del ciclo para cada asignacion --}}

                               </tbody>
                            </table>
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