<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Acumulativos ISJC</title>
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
                        <li><a href="{{ $url = route('teachers/acumulativos/{user_id}/{course_id}/{section}/{clase}/{parcial}', [$asignacion->user_id,$asignacion->course_id,$asignacion->section,$asignacion->clase_id,1])}} ">
                         
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
                                  {{$parcial_actual}} Parcial <i class="fas fa-angle-down"></i>
                                </h5>
                              </a>
                            </div>
                        
                            <!-- Card body -->
                            <div id="collapseOne0" class="collapse" role="tabpanel" aria-labelledby="headingOne0" data-parent="#accordionEx">
                              <div class="card-body">
                                  <div class="list-group">
                                      <a href="{{ $url = route('teachers/acumulativos/{user_id}/{course_id}/{section}/{clase}/{parcial}', [$user->id,$curso_actual[0]->id,$section_actual,$clase_actual[0]->id,1])}}"  class="list-group-item list-group-item-action">I PARCIAL</a>
                                      <a href="{{ $url = route('teachers/acumulativos/{user_id}/{course_id}/{section}/{clase}/{parcial}', [$user->id,$curso_actual[0]->id,$section_actual,$clase_actual[0]->id,2])}}"  class="list-group-item list-group-item-action">II PARCIAL</a>
                                      <a href="{{ $url = route('teachers/acumulativos/{user_id}/{course_id}/{section}/{clase}/{parcial}', [$user->id,$curso_actual[0]->id,$section_actual,$clase_actual[0]->id,3])}}"  class="list-group-item list-group-item-action">III PARCIAL</a>
                                      <a href="{{ $url = route('teachers/acumulativos/{user_id}/{course_id}/{section}/{clase}/{parcial}', [$user->id,$curso_actual[0]->id,$section_actual,$clase_actual[0]->id,4])}}"  class="list-group-item list-group-item-action">IV PARCIAL</a>
                                  </div>
                              <div>
           
                                    <input type="hidden" name="txt_parcial_actual" id="txt_parcial_actual" value="{{$parcial_actual}}">
                            </div>
                          
                              </div>
                            </div>
                        
                          </div>
                          <!-- Accordion card -->

                        <!-- Accordion card -->
                        <div class="card carta" style="box-shadow: 0 2px 5px 0 rgba(0,0,0,.16),0 2px 10px 0 rgba(0,0,0,.12);">
                      
                          <!-- Card header -->
                          <div class="card-header info-color white-text text-center" role="tab" id="headingOne1">
                            <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="false"
                              aria-controls="collapseOne1">
                              <h5 class="white-text mb-0">
                                Crear Acumulativo <i class="fas fa-angle-down"></i>
                              </h5>
                            </a>
                          </div>
                      
                          <!-- Card body -->
                          <div id="collapseOne1" class="collapse" role="tabpanel" aria-labelledby="headingOne1" data-parent="#accordionEx">
                            <div class="card-body">
                                  <form class="md-form" style="color: #757575;">
                                      {{-- @csrf --}}
                                      <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                      <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}">
                                      <input type="hidden" name="curso_actual" id="curso_actual" value="{{$curso_actual[0]->id}}">
                                      <input type="hidden" name="section_actual" id="section_actual" value="{{$section_actual}}">
                                      <input type="hidden" name="clase_actual" id="clase_actual" value="{{$clase_actual[0]->id}}">
              
                                  <div>
                                      <select required onchange="loadclassesfordocente()" class="mdb-select md-form mb-4 initialized" id="select_course">
                                          <option value="-1" disabled selected>Seleccione Curso</option>
                                          @foreach ($cursos as $curso)
                                              <option value="{{$curso->course_id}} ">{{$curso->course}} </option>
                                          @endforeach
                                      </select>
                                  </div>

                                  <div>
                                      <select required onchange="loadsectionsfordocentes()" class="mdb-select md-form mb-4 initialized" id="select_clases">
                                          <option value="-1" disabled selected>Seleccione Clase</option>
                                      </select>
                                  </div>
                      
                                  <div required id="checks_sections" class="form-check mb-4">
                                    
                                  </div>
                      
                                  <div>
                                      <select required class="mdb-select md-form mb-4 initialized" id="select_tipo">
                                          <option value="-1" disabled selected>Tipo de Acumulativo</option>
                                          <option value="1">Trabajo en Clase</option>
                                          <option value="2">Trabajo Extra-Clase</option>
                                          
                                      </select>
                                  </div>

                                  <div>
                                      <select required class="mdb-select md-form mb-4 initialized" id="select_parcial">
                                          <option value="-1" disabled selected>Seleccione Parcial</option>
                                          <option value="1">I Parcial</option>
                                          <option value="2">II Parcial</option>
                                          <option value="3">III Parcial</option>
                                          <option value="4">IV Parcial</option>
                                      </select>
                                  </div>
                                  
                                  <div class="md-form">
                                      <input required type="text" id="titulo" class="form-control">
                                      <label for="titulo">Nombre del Acumulativo</label>
                                  </div>

                                  <!--Material textarea-->
                                  <div class="md-form">
                                      <textarea required type="text" id="descripcion" class="md-textarea form-control" rows="3"></textarea>
                                      <label for="descripcion">Descripción del Acumulativo</label>
                                  </div>


                                  <div class="input-group mb-3">
                                      <label for="valor">Valor del Acumulativo</label>
                                      <input id="valor" type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                      <div class="input-group-append">
                                          <span class="input-group-text">%</span>
                                      </div>
                                  </div>


                                  <div class="md-form">
                                      <input required placeholder="Selected date" type="text" id="date-picker-example" class="form-control datepicker">
                                  </div>
                                  
                                  <button id="btn_send_task" onclick="send_task()" class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="button">Crear</button>
                                  <div align="center" id="circle"></div>
                              </form>
                            </div>
                          </div>
                      
                        </div>
                        <!-- Accordion card -->
                      
                        <!-- Accordion card -->
                        <div class="card" style="padding-bottom: 2px;">
                      
                          <!-- Card header -->
                          <div class="card-header card-header warning-color white-text text-center" role="tab" id="headingTwo2">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2"
                              aria-expanded="false" aria-controls="collapseTwo2">
                              <h5 class="white-text mb-0">
                                Subir Documento <i class="fas fa-angle-down rotate-icon"></i>
                              </h5>
                            </a>
                          </div>
                      
                          <!-- Card body -->
                          <div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2" data-parent="#accordionEx">
                            <div class="card-body">
                                  <form class="md-form" style="color: #757575;" enctype="multipart/form-data" method = 'POST' action="{{ route('teachers/send_file') }}">
                                      {{-- @csrf --}}
                                      <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                      <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}">
                                      <input type="hidden" name="curso_actual" id="curso_actual" value="{{$curso_actual[0]->id}}">
                                      <input type="hidden" name="section_actual" id="section_actual" value="{{$section_actual}}">
                                      <input type="hidden" name="clase_actual" id="clase_actual" value="{{$clase_actual[0]->id}}">
              
                                  <div>
                                      <select required onchange="loadclassesfordocente_file()" class="mdb-select md-form mb-4 initialized" id="select_course_file" name="select_course_file">
                                          <option value="-1" disabled selected>Seleccione Curso</option>
                                          @foreach ($cursos as $curso)
                                              <option value="{{$curso->course_id}} ">{{$curso->course}} </option>
                                          @endforeach
                                      </select>
                                  </div>

                                  <div>
                                      <select required onchange="loadsectionsfordocentes_file()" class="mdb-select md-form mb-4 initialized" id="select_clases_file" name="select_clases_file">
                                          <option value="-1" disabled selected>Seleccione Clase</option>
                                      </select>
                                  </div>
                      
                                  <div required id="checks_sections_file" name="checks_sections_file" class="form-check mb-4">
                                    
                                  </div>
                      
                                  <div>
                                      <select required class="mdb-select md-form mb-4 initialized" id="select_parcial_file" name="select_parcial_file">
                                          <option value="-1" disabled selected>Seleccione Parcial</option>
                                          <option value="1">I Parcial</option>
                                          <option value="2">II Parcial</option>
                                          <option value="3">III Parcial</option>
                                          <option value="4">IV Parcial</option>
                                      </select>
                                  </div>
                                  
                                  <div class="file-field">
                                      <div class="btn btn-primary btn-sm float-left">
                                        <span>Seleccione Documento</span>
                                        <p><input name ="document" id="document" type="file"></p>
                                      </div>
                                      <div class="file-path">
                                        <input class="file-path validate" type="text" placeholder="Subir Archivo">
                                      </div>
                                  </div>

                                  <!--Material textarea-->
                                  <div class="md-form">
                                      <textarea required type="text" id="descripcion_file" name="descripcion_file" class="md-textarea form-control" rows="3"></textarea>
                                      <label for="descripcion">Instrucciones para el documento</label>
                                  </div>
                                  
                                  <button id="btn_send_task"  class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Subir</button>
                                  <div align="center" id="circle"></div>
                              </form>
                            </div>
                          </div>
                      
                        </div>
                        <!-- Accordion card -->
                      
                        <!-- Accordion card -->
                        <div class="card" style="padding-bottom: 2px;">
                      
                          <!-- Card header -->
                          <div class="card-header card-header danger-color white-text text-center" role="tab" id="headingThree3">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree3"
                              aria-expanded="false" aria-controls="collapseThree3">
                              <h5 class="white-text mb-0">
                                Subir Video Youtube <i class="fas fa-angle-down rotate-icon"></i>
                              </h5>
                            </a>
                          </div>
                      
                          <!-- Card body -->
                          <div id="collapseThree3" class="collapse" role="tabpanel" aria-labelledby="headingThree3" data-parent="#accordionEx">
                            <div class="card-body">
                                <form class="md-form" style="color: #757575;" method="POST" action="{{ route('teachers/send_video') }}">
                                    {{-- @csrf --}}
                                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}">
                                    <input type="hidden" name="curso_actual" id="curso_actual" value="{{$curso_actual[0]->id}}">
                                    <input type="hidden" name="section_actual" id="section_actual" value="{{$section_actual}}">
                                    <input type="hidden" name="clase_actual" id="clase_actual" value="{{$clase_actual[0]->id}}">
            
                                <div>
                                    <select required onchange="loadclassesfordocente_video()" class="mdb-select md-form mb-4 initialized" id="select_course_video" name="select_course_video">
                                        <option value="-1" disabled selected>Seleccione Curso</option>
                                        @foreach ($cursos as $curso)
                                            <option value="{{$curso->course_id}} ">{{$curso->course}} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <select required onchange="loadsectionsfordocentes_video()" class="mdb-select md-form mb-4 initialized" id="select_clases_video" name="select_clases_video">
                                        <option value="-1" disabled selected>Seleccione Clase</option>
                                    </select>
                                </div>
                    
                                <div required id="checks_sections_video" class="form-check mb-4">
                                  
                                </div>
                    
                                <div>
                                    <select required class="mdb-select md-form mb-4 initialized" id="select_parcial_video" name="select_parcial_video">
                                        <option value="-1" disabled selected>Seleccione Parcial</option>
                                        <option value="1">I Parcial</option>
                                        <option value="2">II Parcial</option>
                                        <option value="3">III Parcial</option>
                                        <option value="4">IV Parcial</option>
                                    </select>
                                </div>
                                
                                <div class="md-form">
                                    <input required type="text" id="titulo" name="titulo" class="form-control">
                                    <label for="video_name">Titulo del video</label>
                                </div>

                                <div class="md-form">
                                    <input required type="text" id="url" name="url" class="form-control">
                                    <label for="url">URL del video</label>
                                </div>

                                <!--Material textarea-->
                                <div class="md-form">
                                    <textarea required type="text" id="descripcion_video" name="descripcion_video" class="md-textarea form-control" rows="3"></textarea>
                                    <label for="descripcion_video">Instrucciones para el Video</label>
                                </div>
                                
                                <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Subir</button>
                                <div align="center" id="circle"></div>
                            </form>
                            </div>
                          </div>
                      
                        </div>
                        <!-- Accordion card -->
                      
                    </div>
                      <!-- Accordion wrapper -->
                </div>

                    
                    
                    <div style="padding-top: 10px"  class="col-12 col-sm-12 col-md-9 ">
                      
                        <!-- Table with panel -->
                        <div class="card card-cascade narrower">

                            <!--Card image-->
                            <div align="center" class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
                        
                            <h4 class="white-text mx-3">Acumulativos del {{$parcial_actual}} Parcial - {{$curso_actual[0]->short_name}} {{$section_actual}} ({{$clase_actual[0]->short_name}})</h4>
                        
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
                                        <a>Lugar
                                        
                                        </a>
                                    </th>
                                    
                                    <th class="th-lg">
                                        <a>Acumulativo
                                       
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
                                        <a href="">Evaluar
                                       
                                        </a>
                                    </th>

                                    <th class="th-sm">
                                        <a href="">Editar
                                            
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
                                <tbody id="tbody1" >
                                    @php $total_publicado=0; $total_evaluado=0 @endphp
                                    @foreach ($tasks as $task)
                                    @php $total_publicado+=$task->valor; @endphp
                                    <tr>
                                                             
                                        
                                        @if ($task->tipo==2)
                                            <td><i class="fas fa-home mr-5 fa-2x"></i> </td>
                                        @else                                                 
                                            <td><i class="fas fa-school mr-5 fa-2x"></i> </td>   
                                        @endif
                                        <td>{{$task->titulo}} </td>

                                        <td>{{ \Carbon\Carbon::parse($task->fecha_entrega)->format('d/m/Y')}}</td>
                                        
                                        <td>{{$task->valor}}%</td>
                                        
                                        @if ( $task->evaluada == 0)
                                            
                                            {{-- <td><button onclick="evaluar_task({{$task->id}},{{$curso_actual[0]->id}},'{{$section_actual}}')" type="button" class="btn btn-info btn-rounded btn-sm m-0">Evaluar</button></td> --}}
                                            <td><button onclick="#" type="button" class="btn btn-info btn-rounded btn-sm m-0">Evaluar</button></td>
                                            
                                            <td><button type="button" class="btn btn-warning btn-rounded btn-sm m-0">Editar</button></td>
                                            <td><button onclick="eliminar_task({{$task->id}},{{$curso_actual[0]->id}},'{{$section_actual}}')" type="button" class="btn btn-danger btn-rounded btn-sm m-0">Eliminar</button></td>
                                        @else 
                                            @php $total_evaluado+=$task->valor;@endphp
                                            <td><button onclick="evaluar_task({{$task->id}},{{$curso_actual[0]->id}},'{{$section_actual}}')" type="button" class="btn btn-success btn-rounded btn-sm m-0">Evaluada</button></td>
                                            <td><button type="button" class="btn btn-warning btn-rounded btn-sm m-0">Editar</button></td>
                                            <td><button disabled type="button" class="btn btn-default btn-rounded btn-sm m-0">Eliminar</button></td>
                                        @endif
                                        
                                        
                                    </tr>
                                    @endforeach
                                     <!--Este div recibira el resultado de el modal para evaluar alumnos-->
                                    <div id="div_modal_evaluar"></div>                    
                                     <!--Este div recibira el resultado de el modal para evaluar alumnos-->
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
                                                    @if ($file->typefile== 'pptx' || $file->typefile == 'ppt' || $file->typefile == 'pptm') 
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

                    </div><!--fon de la colummna derecha-->
                    
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