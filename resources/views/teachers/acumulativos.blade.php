<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
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
            <a class="nav-link"> <span class="clearfix d-none d-sm-inline-block"> Bienvenido Lic. {{ $user->name }}</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link"> <span class="clearfix d-none d-sm-inline-block"> SALIR</span></a>
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
                            <div class="card">

                                    <h5 class="card-header info-color white-text text-center py-4">
                                        <strong>Crear Acumulativo</strong>
                                    </h5>
                                
                                    <div class="card-body px-lg-5 pt-0">
                                
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
                    </div><!--fin de la columna izquierda-->
                    
                    <div  class="col-12 col-sm-12 col-md-9 ">
                      
                        <!-- Table with panel -->
                        <div class="card card-cascade narrower">

                            <!--Card image-->
                            <div align="center" class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
                        
                            <h4 class="white-text mx-3">Acumulativos - {{$curso_actual[0]->short_name}} {{$section_actual}} ({{$clase_actual[0]->short_name}})</h4>
                        
                            </div>
                            <!--/Card image-->
                
                            <div class="px-4">
                        
                            <div class="table-wrapper">
                                <!--Table-->
                                <table class="table table-hover mb-0 table-responsive-md">
                        
                                <!--Table head-->
                                <thead>
                                    <tr>
                                    
                                    <th class="th-lg">
                                        <a>Acumulativo
                                        <i class="fas fa-sort ml-1"></i>
                                        </a>
                                    </th>
                                    
                                    <th class="th-md">
                                        <a href="">Fecha
                                        <i class="fas fa-sort ml-1"></i>
                                        </a>
                                    </th>
                                    <th class="th-sm">
                                            <a href="">Valor
                                            <i class="fas fa-sort ml-1"></i>
                                            </a>
                                        </th>
                                    <th class="th-sm">
                                        <a href="">Evaluar
                                        <i class="fas fa-sort ml-1"></i>
                                        </a>
                                    </th>

                                    <th class="th-sm">
                                        <a href="">Editar
                                            <i class="fas fa-sort ml-1"></i>
                                        </a>
                                    </th>
                                        <th class="th-sm">
                                            <a href="">Eliminar
                                                <i class="fas fa-sort ml-1"></i>
                                            </a>
                                        </th>
                                    
                                    </tr>
                                </thead>
                                <!--Table head--> 
                                <!--Table body-->
                                <tbody id="tbody1">
                                    @php $total_publicado=0; $total_evaluado=0 @endphp
                                    @foreach ($tasks as $task)
                                    @php $total_publicado+=$task->valor; @endphp
                                    <tr>
                                                             
                                        <td>{{$task->titulo}} </td>
                                        <td>{{$task->fecha_entrega}}</td>
                                        
                                        <td>{{$task->valor}}%</td>
                                        
                                        @if ( $task->evaluada == 0)
                                            
                                            <td><button type="button" class="btn btn-info btn-rounded btn-sm m-0">Evaluar</button></td>
                                            <td><button type="button" class="btn btn-warning btn-rounded btn-sm m-0">Editar</button></td>
                                            <td><button type="button" class="btn btn-danger btn-rounded btn-sm m-0">Eliminar</button></td>
                                        @else 
                                            @php $total_evaluado+=$task->valor;@endphp
                                            <td><button type="button" class="btn btn-success btn-rounded btn-sm m-0">Evaluada</button></td>
                                            <td><button type="button" class="btn btn-warning btn-rounded btn-sm m-0">Editar</button></td>
                                            <td><button disabled type="button" class="btn btn-default btn-rounded btn-sm m-0">Eliminar</button></td>
                                        @endif
                                        
                                        
                                    </tr>
                                    @endforeach
                                                                           
                                    
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