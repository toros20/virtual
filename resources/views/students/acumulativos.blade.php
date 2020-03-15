<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Acumulativos</title>
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
          <!--/. Logo -->
          <!--Social-->
          
          <!--/Social-->
          <!--Search Form-->
         {{--  <li>
            <form class="search-form" role="search">
              <div class="form-group md-form mt-0 pt-1 waves-light">
                <input type="text" class="form-control" placeholder="Search">
              </div>
            </form>
          </li> --}}
          <!--/.Search Form-->
          <!-- Side navigation links -->
          <li>
            <ul class="collapsible collapsible-accordion">
                <ul>
                    <li>
                      <a href="{{ $url = route('students/academia/{user_id}', [$user->id]) }} ">Voler al Panel</a> 
                    </li>
                    <hr>
                    @foreach ($clases as $clase)
                    <li>
                      <a onclick="acumulativosbyclass({{$clase->clase_id}})" href="#" class="waves-effect">{{$clase->clase}}</a>
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
                  <button class="btn btn-sm btn-danger" type="submit">
                    <span>Salir</span>
                  </button>
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
       
            <div class="row" align="center">
                    
                    <div align="center"  class="col-12 col-sm-12 col-md-9 ">

                    <div align="center" id="circle"></div>

                       <div id="div_acumulativos"> {{--inicio del div que abarca el lada izquierdo, notas y resultados --}}

                           <!-- Table de acumulativos -->
                          <div  class="card card-cascade narrower">

                            <!--Card image-->
                            <div align="center" class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
                        
                            <h4 class="white-text mx-3">Acumulativos del {{$parcial}} Parcial de {{$clases[0]->clase}} </h4>
                        
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
                                        <a>T&iacute;tulo
                                        
                                        </a>
                                    </th>

                                    <th class="th-lg">
                                        <a>Lugar
                                         
                                        </a>
                                    </th>
                                    
                                    <th class="th-md">
                                        <a href="">Fecha
                                        
                                        </a>
                                    </th>
                                    <th class="th-sm">
                                            <a href="">Valor
                                             
                                            </a>
                                        </th>
                                    <th class="th-sm">
                                        <a href="">Estado
                                         
                                        </a>
                                    </th>

                                    <th class="th-sm">
                                        <a href="">Detalles
                                            
                                        </a>
                                    </th>

                                    <th class="th-sm">
                                        <a href="">Subir Tarea
                                            
                                        </a>
                                    </th>
                                       
                                    
                                    </tr>
                                </thead>
                                <!--Table head--> 
                                <!--Table body-->
                                <tbody id="tbody1" >
                                    @php $total_publicado=0; $total_evaluado=0;$total_obtenido=0; @endphp
                                    @foreach ($tasks as $task)
                                    @php $total_publicado+=$task->valor; @endphp
                                    <tr>
                                                            
                                        <td>{{$task->titulo}} </td>
                                        @if ($task->tipo==2)
                                            <td><i class="fas fa-home mr-5"></i> </td>
                                        @else                                                 
                                            <td><i class="fas fa-school mr-5"></i> </td>   
                                        @endif
                                        <td>{{ \Carbon\Carbon::parse($task->fecha_entrega)->format('d/m/Y')}}</td>
                                                                               
                                        <td>{{$task->valor_obtenido}}/{{$task->valor}}%</td>
                                        
                                        @if ( $task->evaluada == 0)
                                            <td><p style="font-weight: bold;" class="red-text">No Evaluada</p></td>
                                        @else
                                            @php $total_obtenido+=$task->valor_obtenido;@endphp 
                                            @php $total_evaluado+=$task->valor;@endphp
                                            <td><p style="font-weight: bold;" class="green-text">Evaluada</p></td>
                                        @endif

                                        <td><button type="button" class="btn btn-warning btn-rounded btn-sm m-0" data-toggle="modal" data-target="#centralModalInfo_{{$task->id}}">Detalles</button></td>
                                        
                                        <td><button type="button" class="btn btn-primary btn-rounded btn-sm m-0" data-toggle="modal" data-target="#ModalSubirFile_{{$task->id}}">Subir Tarea</button></td>
                                        
                                        <!-- INICIO Modal Subir File-->
                                        <div class="modal fade modal-notify info" id="ModalSubirFile_{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                          aria-hidden="true">
                                          <div class="modal-dialog modal-notify modal-info" role="document">
                                            <!--Content-->
                                            <div class="modal-content">
                                              <!--Header-->
                                              <div class="modal-header">
                                                
                                                 <p class="heading lead">{{$task->titulo}})</p>
      
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true" class="white-text">&times;</span>
                                                </button>
                                              </div>
      
                                              <!--Body-->
                                              <div class="modal-body">
                                                <div class="text-center">
                                                  <i class="fas fa-edit fa-4x mb-3 animated rotateIn"></i>
                                                  <p>{{$task->descripcion}}</p>
                                                  <p>{{ \Carbon\Carbon::parse($task->fecha_entrega)->format('d/m/Y')}}</p>
                                                  <p>Solo se permite subir un Archivo por Tarea con peso maximo de 20 Megas.</p>
                                                  <p>Para subir varios archivos es necesario comprimirlos en un único archivo utilizando el Programa Winrar.</p>
                                                </div>
                                                  
                                                <form class="md-form" style="color: #757575;" enctype="multipart/form-data" method = 'POST' action="{{ route('students/send_file') }}">
                                                  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                                  <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}">
                                                  <input type="hidden" name="parcial" id="parcial" value="{{$parcial}}">
                                                 
                                                  <input type="hidden" name="clase_actual" id="clase_actual" value="{{$clases[0]->id}}">

                                                  <div class="text-center file-field mt-3">
                                                    <div class="btn btn-primary btn-sm float-left">
                                                      <span>Seleccione Documento</span>
                                                      <p><input name ="document" id="document" type="file"></p>
                                                    </div>
                                                    <div class="file-path">
                                                      <input class="file-path validate" type="text" placeholder="Subir Archivo">
                                                    </div>
                                                    </div>
                                                  </div>
                                                  <div class="md-form">
                                                      <textarea type="text" id="descripcion" name="descripcion" class="md-textarea form-control" rows="3"></textarea>
                                                      <label for="descripcion">Puedes dejar un Comentario Sobre la tarea.</label>
                                                  </div>

                                                  <button id="btn_send_task"  class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Enviar Tarea</button>
                                                </form>
      
                                              <!--Footer-->
                                              <div class="modal-footer justify-content-center">
                                                <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">Cerrar</a>
                                              </div>
                                            </div>
                                            <!--/.Content-->
                                          </div>
                                        </div>
                                        <!-- FINAL Modal Subie File-->

                                        <!-- Central Modal Medium Info-->
                                        <div class="modal fade modal-notify info" id="centralModalInfo_{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                          aria-hidden="true">
                                          <div class="modal-dialog modal-notify modal-info" role="document">
                                            <!--Content-->
                                            <div class="modal-content">
                                              <!--Header-->
                                              <div class="modal-header">
                                                
                                                 <p class="heading lead">{{$task->titulo}} - ({{$task->valor_obtenido}}/{{$task->valor}})</p>
      
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true" class="white-text">&times;</span>
                                                </button>
                                              </div>
      
                                              <!--Body-->
                                              <div class="modal-body">
                                                <div class="text-center">
                                                  <i class="fas fa-edit fa-4x mb-3 animated rotateIn"></i>
                                                  <p>{{$task->descripcion}}</p>
                                                  <p>{{ \Carbon\Carbon::parse($task->fecha_entrega)->format('d/m/Y')}}</p>
                                                  <p>Obs:{{$task->observacion}}</p>
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
                                        
                                        
                                    </tr>

                                   
                                    @endforeach
                                                                          
                                    
                                </tbody>
                                
                                <!--Table body-->
                                </table>
                                <!--Table-->

                                
                            </div>

                          
                      
                          </div>

                          
                        </div>
                          <!-- fin de la Table de acumulativos -->
                          <br>
                          <!-- Table with panel -->
                          <div align="center" class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
                          
                                  <h4 class="white-text mx-3">@php echo( $total_obtenido ."% Obtenido de ". $total_evaluado."% Evaluado ") @endphp</h4>
                          </div>

                     
                        <br>
                           {{-- tabla de recursos --}}
                           <div  class="card card-cascade narrower">

                              <!--Card image-->
                                <div align="center" class="view view-cascade gradient-card-header peach-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
                                
                                    <h4 class="white-text mx-3">Recursos </h4>
                                
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
                                                </tr>
                                            </thead>
                                            <!--Table head--> 
                                            <!--Table body-->
                                            <tbody id="tbody_recursos" >

                                                @foreach ($files as $file)

                                                <tr>     
                                                    {{-- @if ($file->typefile== 'pdf') 
                                                        <td><a target="_blank"  href="{{ URL::asset('files/'.$file->filename.'.'.$file->typefile)}}"> <span style="color: red;"><i class="far fa-file-pdf fa-3x"></i></span></a></td>
                                                    @endif  
                                                    @if ($file->typefile== 'pptx') 
                                                       <td><a target="_blank"  href="{{ URL::asset('files/'.$file->filename.'.'.$file->typefile)}}"> <span style="color: tomato;"><i class="far fa-file-powerpoint fa-3x"></i></a></span></td>
                                                    @endif   --}}   
                                                    
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
                                                    @if ($file->typefile== 'pptx' || $file->typefile == 'ppt' || $file->typefile == 'pptm') 
                                                      <td><span style="color: tomato;"><i class="far fa-file-powerpoint fa-3x"></i></span></td>
                                                    @endif              

                                                    <td><a href="{{ URL::asset('../storage/app/'.$file->filename)}}">{{$file->name_original}} </a></td>
                                                    <td>{{ \Carbon\Carbon::parse($file->fecha)->format('d/m/Y')}}</td>
                                                   
                                                   {{--  <td><a target="_blank"  href="{{ URL::asset('files/'.$file->filename.'.'.$file->typefile)}}">{{$file->filename}} </a></td>
                                                    <td>{{ \Carbon\Carbon::parse($file->fecha)->format('d/m/Y')}}</td> --}}

                                                    <td><a  type="button" class="btn btn-info btn-rounded btn-sm m-0" data-toggle="modal" data-target="#centralModalfile_{{$file->id}}" >Detalles</a></td>
                                                    <td><a target="_blank"  href="{{ URL::asset('../storage/app/'.$file->filename)}}" class="btn btn-success btn-rounded btn-sm m-0">Descargar</a></td>
                                                  {{-- <td><button type="button" class="btn btn-info btn-rounded btn-sm m-0" data-toggle="modal" data-target="#centralModalfile_{{$file->id}}">Detalles</button></td>
                                                    <td><a target="_blank"  href="{{ URL::asset('files/'.$file->filename)}}" class="btn btn-success btn-rounded btn-sm m-0">Descargar</a></td>
                                                     --}}
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
                                
                                    <h4 class="white-text mx-3">Videos </h4>
                                
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
                                                      <a>Tipo
                                                      </a>
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
                                                </tr>

                                                @endforeach
                                                
                                            </tbody>
                                        
                                            <!--Table body-->
                                        </table>
                                        <!--Table-->
                                    </div> <!--fin de table-wrapper-->
        
                                </div><!--fin de px-4-->
        
                          </div><!--fin de DIV videos--> 
                      </div>
                      {{--fin del div que abarca el lada izquierdo, notas y resultados --}}

                        
                      <br>

                        
                    </div><!--fin de la columna del lado izquierda (acumulativos y recursos)-->
                    
                    <div align="center"  class="col-12 col-sm-12 col-md-3">

                         <!-- Card -->
                        <div class="card gradient-card">
                    
                                <div class="card-image" style="background-image: url(https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20%2814%29.jpg)">
                        
                                        <div class="text-white d-flex h-100 mask blue-gradient-rgba">        
                                            <div align="center" class="first-content align-self-center p-3">
                                                <h3 class="card-title"> Asignaturas </h3>
                                            </div>
                                            <div class="second-content align-self-center mx-auto text-center">
                                            <i class="fa fa-money fa-3x"></i>
                                            </div>
                                        </div>
                                </div>

                                <div class="card-body card-body-cascade ">
                                    
                                        <input id="txt_user" type="hidden" value="{{$user->id}}">
                                        <input id="txt_parcial" type="hidden" value="{{$parcial}}">
                                        <input id="token" type="hidden" name="_token"  value="{{ csrf_token() }}">
                                        <ul class="list-group ">
    
                                            @foreach ($clases as $clase)
                                            <a onclick="acumulativosbyclass({{$clase->clase_id}})" class="list-group-item list-group-item-action" style="color:black" >
                                                <li class="list-group-item">
                                                    <div class="md-v-line"></div>
                                                    {{$clase->clase}}
                                                </li>
                                            </a> 
                                            @endforeach
                                        </ul> 
                                    
                                </div>

                        </div>
                            
                    </div> {{--final de la columna de la derecha --}}

            </div><!--din div row global  //el dia de hoy y mañana de 7 a 1 pm venta de libros de texto  santillana , grupo pro educar editorial poeta -->
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