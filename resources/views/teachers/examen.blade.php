<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Notas ISJC</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="{{ URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="{{ URL::asset('css/mdb.min.css')}}" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/toastr.min.css') }}">

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
                        <li><a href="{{ $url = route('teachers/examen/{user_id}/{course_id}/{section}/{clase}', [$asignacion->user_id,$asignacion->course_id,$asignacion->section,$asignacion->clase_id])}} ">
                         
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
            </li>
            
          </ul>
        </nav>
        <!-- /.Navbar -->
    </header>
    <!--/.Double navigation-->
  
    <!--Main Layout-->
    <main>
      <div class="container-fluid">
       
            <div class="row">

               
                    
                    
                <div style="padding-top: 10px"  class="col-12 col-sm-12 col-md-12 ">
                    
                    <!-- Table with panel -->
                    <div class="card card-cascade narrower">

                        <!--Card image-->
                        <div align="center" class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
                    
                        <h4 class="white-text mx-3">Notas de - {{$curso_actual[0]->short_name}} {{$section_actual}} ({{$clase_actual[0]->short_name}})</h4>
                    
                        </div>
                        <!--/Card image-->
            
                        <div class="px-4">
                    
                        <div class="table-wrapper">
                            <!--Table-->
                            <table class="table table-hover mb-0 table-responsive-md ">
                    
                            <!--Table head-->
                            <thead>
                                <tr>
                                <th>
                                        <a>Estudiante
                                        
                                        </a>
                                    </th>

                                <th>
                                    <a>Acum 1
                                    
                                    </a>
                                </th>
                                
                                <th>
                                    <a>Exam 1
                                    
                                    </a>
                                </th>
                                <th>
                                        <a>Total 1
                                        
                                        </a>
                                    </th>
                                <th>
                                        <a>Acum 2
                                        
                                        </a>
                                    </th>
                                    
                                    <th>
                                        <a>Exam 2
                                        
                                        </a>
                                    </th>
                                    <th>
                                            <a>Total 2
                                            
                                            </a>
                                        </th>
                                    <th>
                                            <a>Acum 3
                                            
                                            </a>
                                        </th>
                                        
                                        <th>
                                            <a>Exam 3
                                            
                                            </a>
                                        </th>
                                        <th>
                                                <a>Total 3
                                                
                                                </a>
                                            </th>
                                        <th>
                                                <a>Acum 4
                                                
                                                </a>
                                            </th>
                                            
                                            <th>
                                                <a>Exam 4
                                                
                                                </a>
                                            </th>
                                            <th>
                                                    <a>Total 4
                                                    
                                                    </a>
                                                </th>
                                            <th>
                                                    <a>Prom.
                                                    
                                                    </a>
                                                </th>
                                            <th>
                                                    <a>REC.
                                                    
                                                    </a>
                                                </th>

                              
                                </tr>
                            </thead>
                            <!--Table head--> 
                            <!--Table body-->
                            <tbody id="tbody1" >

                                <tr>
                                    @foreach ($students as $student)
                                        <td>{{$student->name}} {{$student->lastname}}</td>
                                        <td><input type="text" name='' id='' class="form-control"></td>
                                        <td><input type="text" name='' id='' class="form-control"></td>
                                        <td><input disabled type="text" name='' id='' class="form-control"></td>
                                        <td><input disabled type="text" name='' id='' class="form-control"></td>
                                        <td><input disabled type="text" name='' id='' class="form-control"></td>
                                        <td><input disabled type="text" name='' id='' class="form-control"></td>
                                        <td><input disabled type="text" name='' id='' class="form-control"></td>
                                        <td><input disabled type="text" name='' id='' class="form-control"></td>
                                        <td><input disabled type="text" name='' id='' class="form-control"></td>
                                        <td><input disabled type="text" name='' id='' class="form-control"></td>
                                        <td><input disabled type="text" name='' id='' class="form-control"></td>
                                        <td><input disabled type="text" name='' id='' class="form-control"></td>
                                        <td><input disabled type="text" name='' id='' class="form-control"></td>
                                        <td><input disabled type="text" name='' id='' class="form-control"></td>
                                    @endforeach
                                    
                                </tr>
                               
                            </tbody>
                            
                            <!--Table body-->
                            </table>
                            <!--Table-->

                        </div>

                        </div>
            
                    </div>
       
                </div><!--fin de la colummna derecha-->
                    
            </div><!--din div row global-->
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
  <script src="{{ URL::asset('js/circle-progress.js')}}"></script>
  <script src="{{ URL::asset('js/toastr.min.js')}}"></script>
</body>

</html>