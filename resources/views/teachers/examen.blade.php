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

                <div  class="col-12 col-sm-12 col-md-3">   
                    <!--Accordion wrapper-->
                    <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

                        <!-- Accordion card -->
                        <div class="card carta" style="box-shadow: 0 2px 5px 0 rgba(0,0,0,.16),0 2px 10px 0 rgba(0,0,0,.12);">
                      
                            <!-- Card header -->
                            <div class="card-header text-center" role="tab" id="headingOne0">
                              <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne0" aria-expanded="false"
                                aria-controls="collapseOne0">
                                <h5 class="mb-0">
                                  ASIGNATURAS <i class="fas fa-angle-down"></i>
                                </h5>
                              </a>
                            </div>
                        
                            <!-- Card body -->
                            <div id="collapseOne0" class="collapse" role="tabpanel" aria-labelledby="headingOne0" data-parent="#accordionEx">
                              <div class="card-body">
                                  <div class="list-group">
                                        @foreach ($asignaciones as $asignacion)
                                            <a href="{{ $url = route('teachers/examen/{user_id}/{course_id}/{section}/{clase}', [$asignacion->user_id,$asignacion->course_id,$asignacion->section,$asignacion->clase_id])}} ">
                                            
                                                {{$asignacion->course}} - {{$asignacion->section }} - {{$asignacion->clase}}
                                            
                                            </a>
                                        @endforeach
                                  </div>
                               <div>
                            </div>
    
                        </div>
                          <!-- Accordion card -->
                      
                    </div>
                      <!-- Accordion wrapper -->
                </div>
                <!--fin de la colummna izquierda-->
                    
                    
                <div style="padding-top: 10px"  class="col-12 col-sm-12 col-md-9 ">
                    
                    <!-- Table with panel -->
                    <div class="card card-cascade narrower">

                        <!--Card image-->
                        <div align="center" class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
                    
                        <h4 class="white-text mx-3">Notas del- {{$curso_actual[0]->short_name}} {{$section_actual}} ({{$clase_actual[0]->short_name}})</h4>
                    
                        </div>
                        <!--/Card image-->
            
                        <div class="px-4">
                    
                        <div class="table-wrapper">
                            <!--Table-->
                            <table class="table table-hover mb-0 table-responsive-md ">
                    
                            <!--Table head-->
                            <thead>
                                <tr>

                                <th class="th-lg">
                                    <a>Acum 1
                                    
                                    </a>
                                </th>
                                
                                <th class="th-lg">
                                    <a>Exam 1
                                    
                                    </a>
                                </th>
                                <th class="th-lg">
                                        <a>Acum 2
                                        
                                        </a>
                                    </th>
                                    
                                    <th class="th-lg">
                                        <a>Exam 2
                                        
                                        </a>
                                    </th>
                                    <th class="th-lg">
                                            <a>Acum 3
                                            
                                            </a>
                                        </th>
                                        
                                        <th class="th-lg">
                                            <a>Exam 3
                                            
                                            </a>
                                        </th>
                                        <th class="th-lg">
                                                <a>Acum 4
                                                
                                                </a>
                                            </th>
                                            
                                            <th class="th-lg">
                                                <a>Exam 4
                                                
                                                </a>
                                            </th>

                              
                                </tr>
                            </thead>
                            <!--Table head--> 
                            <!--Table body-->
                            <tbody id="tbody1" >

                                <tr>
                                    <td><input type="text" name='' id='' class="form-control"></td>
                                    <td><input type="text" name='' id='' class="form-control"></td>
                                    <td><input type="text" name='' id='' class="form-control"></td>
                                    <td><input type="text" name='' id='' class="form-control"></td>
                                    <td><input type="text" name='' id='' class="form-control"></td>
                                    <td><input type="text" name='' id='' class="form-control"></td>
                                    <td><input type="text" name='' id='' class="form-control"></td>
                                    <td><input type="text" name='' id='' class="form-control"></td>
                                    
                                </tr>
                            </tbody>
                            
                            <!--Table body-->
                            </table>
                            <!--Table-->

                            
                        </div>

                        
                        </div>
            
                    </div>
                    
                    <!-- Table with panel -->
                    <br>
                    <!-- Table with panel -->
                    <div align="center" class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
                    
                            <h4 class="white-text mx-3">@php echo( $total_evaluado ."% Evaluado de ". $total_publicado."% Publicado ") @endphp</h4>
                    </div>

                    <br>

                        {{-- tabla de recursos --}}
                    <div  class="card card-cascade narrower">

                            <!--Card image-->
                            <div align="center" class="view view-cascade gradient-card-header peach-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
                            
                                <h4 class="white-text mx-3">Recursos del {{$parcial_actual}} Parcial</h4>
                            
                            </div>
                            <!--/Card image-->
                
                            <div class="px-4">
                            
                                <div class="table-wrapper">
                                    <!--Table-->
                                    <table class="table table-hover mb-0 table-responsive-md ">
                            
                                        <!--Table head-->
                                        <thead>
                                            <tr>
                                            
                                            <th class="th-lg">
                                                <a>Tipo de Recursos
                                                </a>
                                            </th>
        
                                            <th class="th-lg">
                                                <a>Nombre de Recurso
                                                </a>
                                            </th>
                                            
                                            <th class="th-md">
                                                <a href="">Fecha publicación
                                                </a>
                                            </th>

                                            <th class="th-sm">
                                                <a href="">Detalles
                                                </a>
                                            </th>
                                            
                                            <th class="th-sm">
                                                <a href="">Descargar
                                                </a>
                                            </th>
                                            <th class="th-sm">
                                                <a href="">Eliminar
                                                </a>
                                            </th>
        
                                            </tr>
                                        </thead>
                                        <!--Table head--> 
                                        <!--Table body-->
                                        <tbody id="tbody_recursos" >
                                            @foreach ($files as $file)
                                            <tr>     
                                                @if ($file->typefile== 'pdf') 
                                                    <td><span style="color: red;"><i class="far fa-file-pdf fa-3x"></i></span></td>
                                                @endif 
                                                @if ($file->typefile == 'docx' || $file->typefile == 'doc') 
                                                <td><span style="color: blue;"><i class="far fa-file-word fa-3x"></i></span></td>
                                                @endif  
                                                @if ($file->typefile == 'xlsx' || $file->typefile == 'xls' || $file->typefile == 'cvs') 
                                                <td><span style="color: green;"><i class="far fa-file-excel fa-3x"></i></span></td>
                                                @endif
                                                @if ($file->typefile == 'rar' || $file->typefile == 'zip') 
                                                <td><span style="color: purple;"><i class="fas fa-archive fa-3x"></i></span></td>
                                                @endif
                                                @if ($file->typefile== 'pptx' || $file->typefile == 'ppt') 
                                                    <td><span style="color: tomato;"><i class="far fa-file-powerpoint fa-3x"></i></span></td>
                                                @endif              
                                                
                                                <td><a href="{{ URL::asset('../storage/app/'.$file->filename)}}">{{$file->name_original}} </a></td>
                                                <td>{{ \Carbon\Carbon::parse($file->fecha)->format('d/m/Y')}}</td>
                                                
                                                <td><a  type="button" class="btn btn-info btn-rounded btn-sm m-0" data-toggle="modal" data-target="#centralModalfile_{{$file->id}}" >Detalles</a></td>
                                                <td><a target="_blank"  href="{{ URL::asset('../storage/app/'.$file->filename)}}" class="btn btn-success btn-rounded btn-sm m-0">Descargar</a></td>
                                                <!-- Central Modal Medium Info {{$file->id}}-->
                                                <div class="modal fade modal-notify info" id="centralModalfile_{{$file->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-notify modal-info" role="document">
                                                        <!--Content-->
                                                        <div class="modal-content">
                                                        <!--Header-->
                                                        <div class="modal-header">
                                                            
                                                            <p class="heading lead">{{$file->filename}}</p>
                
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true" class="white-text">&times;</span>
                                                            </button>
                                                        </div>
                
                                                        <!--Body-->
                                                        <div class="modal-body">
                                                            <div class="text-center">
                                                            <i class="fas fa-edit fa-4x mb-3 animated rotateIn"></i>
                                                            <p>{{$file->detalles}}</p>
                                                            
                                                            </div>
                                                        </div>
                
                                                        <!--Footer-->
                                                        <div class="modal-footer justify-content-center">
                                                            <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">Cerrar</a>
                                                        </div>
                                                        </div>
                                                        <!--/.Content-->
                                                    </div>
                                                </div>
                                                <!-- Central Modal Medium Info-->
                                                <td><button onclick="eliminar_file({{$file->id}})" type="button" class="btn btn-danger btn-rounded btn-sm m-0">Eliminar</button></td>
                                            
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    
                                        <!--Table body-->
                                    </table>
                                    <!--Table-->
                                </div> <!--fin de table-wrapper-->
    
                            </div><!--fin de px-4-->
    
                        </div><!--fin de DIV RECURSOS--> 
                        <br>
                        {{-- tabla de videos --}}
                        <div  class="card card-cascade narrower">

                            <!--Card image-->
                            <div align="center" class="view view-cascade gradient-card-header aqua-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
                            
                                <h4 class="white-text mx-3">Videos del {{$parcial_actual}} Parcial</h4>
                            
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
                                                Tipo
                                            </th>
                                                        
                                            <th class="th-lg">
                                                <a>Nombre del Video
                                                </a>
                                            </th>
                                            
                                            <th class="th-md">
                                                <a href="">Fecha publicación
                                                </a>
                                            </th>

                                            <th class="th-sm">
                                                <a href="">Visualizar
                                                </a>
                                            </th>
                                            <th class="th-sm">
                                                <a href="">Eliminar
                                                </a>
                                            </th>
        
                                            </tr>
                                        </thead>
                                        <!--Table head--> 
                                        <!--Table body-->
                                        <tbody id="tbody_recursos" >
                                            @foreach ($videos as $video)
                                            <tr>  
                                                <td><span style="color: red;"><i class="fab fa-youtube fa-3x"></i></span></td>
                                                <td><a href="">{{$video->titulo}} </a></td>
                                                <td>{{ \Carbon\Carbon::parse($video->fecha)->format('d/m/Y')}}</td>
                                                
                                                <td><button type="button" class="btn btn-success btn-rounded btn-sm m-0" data-toggle="modal" data-target="#centralModalvideo_{{$video->id}}">Visualizar</button></td>
                                                    <!-- Central Modal Medium Video {{$video->id}}-->
                                                    <div class="modal fade modal-notify info" id="centralModalvideo_{{$video->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-notify modal-danger" role="document">
                                                        <!--Content-->
                                                        <div class="modal-content">
                                                        <!--Header-->
                                                        <div class="modal-header">
                                                            
                                                            <p class="heading lead">{{$video->titulo}}</p>
                
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true" class="white-text">&times;</span>
                                                            </button>
                                                        </div>
                
                                                        <!--Body-->
                                                        <div class="modal-body">
                                                            <div class="text-center">
                                                            <p> @php
                                                                    //tomamos solo los  ultimo 11 caracteres de la url del video
                                                                    $url = substr($video->url, -11);    
                                                                @endphp   
                                                                <iframe width="95%" height="315" src="https://www.youtube.com/embed/{{$url}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                            </p>
                                                            <p>Observaci&oacute;n: {{$video->detalles}}</p>
                                                            <p>Publicado el:{{ \Carbon\Carbon::parse($video->fecha)->format('d/m/Y')}}</p>
                                                                                                                                
                                                            </div>
                                                        </div>
                
                                                        <!--Footer-->
                                                        <div class="modal-footer justify-content-center">
                                                            <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">Cerrar</a>
                                                        </div>
                                                        </div>
                                                        <!--/.Content-->
                                                    </div>
                                                </div>
                                                <!-- Central Modal Medium Info-->
                                                <td><button onclick="eliminar_video({{$video->id}})" type="button" class="btn btn-danger btn-rounded btn-sm m-0">Eliminar</button></td>
                                            
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    
                                        <!--Table body-->
                                    </table>
                                    <!--Table-->
                                </div> <!--fin de table-wrapper-->
    
                            </div><!--fin de px-4-->
    
                        </div><!--fin de DIV videos--> 

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