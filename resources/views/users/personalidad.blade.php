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
                        <div align="center" class="view view-cascade gradient-card-header peach-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
                    
                        <h4 class="white-text mx-3">Notas de - {{$curso[0]->short_name}} - {{$seccion}} </h4>
                    
                        </div>
                        <!--/Card image-->
            
                        <div class="px-4">
                    
                        <div class="table-wrapper">

                          <form action="{{ route('teachers/save_parcial') }}" method="POST">
                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                            <input type="hidden" name="user_id" value="{{$user->id}}">
            
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
                                    <a>Puntualidad
                                    
                                    </a>
                                </th>
                                
                                <th>
                                    <a>Esp. de Trabajo
                                    
                                    </a>
                                </th>
                                <th>
                                        <a>Orden y Presentación
                                        
                                        </a>
                                    </th>
                                <th>
                                        <a>Sociabilidad
                                        
                                        </a>
                                    </th>
                                    
                                    <th>
                                        <a>Moralidad y Etica
                                        
                                        </a>
                                    </th>
                                    <th>
                                            <a>Act. Civica y Religiosa
                                            
                                            </a>
                                        </th>
                                        <th>
                                                <a>No. Reportes
                                                
                                                </a>
                                            </th>
    
                                </tr>
                            </thead>
                            <!--Table head--> 
                            <!--Table body-->
                            <tbody id="tbody1" >
                                 @foreach ($students as $student)

                                    <?php 
                                        $resultado = DB::table('personalidad')
                                            ->where ([
                                                        ['personalidad.parcial', '=', 1],
                                                        ['personalidad.student_id', '=', $student->user_id],
                                                    ])
                                            ->get();
                                    
                                    ?>
                                    <tr>
                                        <td>{{$student->name}} {{$student->lastname}}</td>
                                        <td>
                                            <select style="display:inline-block !important" name='clase1_{{$student->user_id}}' required>
                                                @if ($resultado[0]->clase1 == 0)
                                                    <option value="0">-------</option>
                                                @endif
                                                @if ($resultado[0]->clase1 == 1)
                                                    <option value="{{$resultado[0]->clase1}}">Insuficiente</option>
                                                @endif
                                                @if ($resultado[0]->clase1 == 2)
                                                    <option value="{{$resultado[0]->clase1}}">Necesita Mejorar</option>
                                                @endif
                                                @if ($resultado[0]->clase1 == 3)
                                                    <option value="{{$resultado[0]->clase1}}">Satisfactorio</option>
                                                @endif
                                                @if ($resultado[0]->clase1 == 4)
                                                    <option value="{{$resultado[0]->clase1}}">Muy Satisfactorio</option>
                                                @endif
                                                @if ($resultado[0]->clase1 == 5)
                                                    <option value="{{$resultado[0]->clase1}}">Avanzado</option>
                                                @endif
                                               
                                                <option value="1">Insuficiente</option>
                                                <option value="2">Necesita Mejorar</option>
                                                <option value="3">Satisfactorio</option>
                                                <option value="4">Muy Satisfactorio</option>
                                                <option value="5">Avanzado</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select style="display:inline-block !important" name='clase2_{{$student->user_id}}' required> 
                                                @if ($resultado[0]->clase1 == 0)
                                                    <option value="0">-------</option>
                                                @endif
                                                @if ($resultado[0]->clase2 == 1)
                                                    <option value="{{$resultado[0]->clase2}}">Insuficiente</option>
                                                @endif
                                                @if ($resultado[0]->clase2 == 2)
                                                    <option value="{{$resultado[0]->clase2}}">Necesita Mejorar</option>
                                                @endif
                                                @if ($resultado[0]->clase2 == 3)
                                                    <option value="{{$resultado[0]->clase2}}">Satisfactorio</option>
                                                @endif
                                                @if ($resultado[0]->clase2 == 4)
                                                    <option value="{{$resultado[0]->clase2}}">Muy Satisfactorio</option>
                                                @endif
                                                @if ($resultado[0]->clase2 == 5)
                                                    <option value="{{$resultado[0]->clase2}}">Avanzado</option>
                                                @endif

                                                <option value="1">Insuficiente</option>
                                                <option value="2">Necesita Mejorar</option>
                                                <option value="3">Satisfactorio</option>
                                                <option value="4">Muy Satisfactorio</option>
                                                <option value="5">Avanzado</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select style="display:inline-block !important" name='clase3_{{$student->user_id}}' required> 
                                                @if ($resultado[0]->clase1 == 0)
                                                    <option value="0">-------</option>
                                                @endif
                                                @if ($resultado[0]->clase3 == 1)
                                                    <option value="{{$resultado[0]->clase3}}">Insuficiente</option>
                                                @endif
                                                @if ($resultado[0]->clase3 == 2)
                                                    <option value="{{$resultado[0]->clase3}}">Necesita Mejorar</option>
                                                @endif
                                                @if ($resultado[0]->clase3 == 3)
                                                    <option value="{{$resultado[0]->clase3}}">Satisfactorio</option>
                                                @endif
                                                @if ($resultado[0]->clase3 == 4)
                                                    <option value="{{$resultado[0]->clase3}}">Muy Satisfactorio</option>
                                                @endif
                                                @if ($resultado[0]->clase3 == 5)
                                                    <option value="{{$resultado[0]->clase3}}">Avanzado</option>
                                                @endif
                                                <option value="1">Insuficiente</option>
                                                <option value="2">Necesita Mejorar</option>
                                                <option value="3">Satisfactorio</option>
                                                <option value="4">Muy Satisfactorio</option>
                                                <option value="5">Avanzado</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select style="display:inline-block !important" name='clase4_{{$student->user_id}}' required> 
                                                @if ($resultado[0]->clase1 == 0)
                                                    <option value="0">-------</option>
                                                @endif
                                                @if ($resultado[0]->clase4 == 1)
                                                    <option value="{{$resultado[0]->clase4}}">Insuficiente</option>
                                                @endif
                                                @if ($resultado[0]->clase4 == 2)
                                                    <option value="{{$resultado[0]->clase4}}">Necesita Mejorar</option>
                                                @endif
                                                @if ($resultado[0]->clase4 == 3)
                                                    <option value="{{$resultado[0]->clase4}}">Satisfactorio</option>
                                                @endif
                                                @if ($resultado[0]->clase4 == 4)
                                                    <option value="{{$resultado[0]->clase4}}">Muy Satisfactorio</option>
                                                @endif
                                                @if ($resultado[0]->clase4 == 5)
                                                    <option value="{{$resultado[0]->clase4}}">Avanzado</option>
                                                @endif

                                                <option value="1">Insuficiente</option>
                                                <option value="2">Necesita Mejorar</option>
                                                <option value="3">Satisfactorio</option>
                                                <option value="4">Muy Satisfactorio</option>
                                                <option value="5">Avanzado</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select style="display:inline-block !important" name='clase5_{{$student->user_id}}' required> 
                                                @if ($resultado[0]->clase1 == 0)
                                                    <option value="0">-------</option>
                                                @endif
                                                @if ($resultado[0]->clase5 == 1)
                                                    <option value="{{$resultado[0]->clase5}}">Insuficiente</option>
                                                @endif
                                                @if ($resultado[0]->clase5 == 2)
                                                    <option value="{{$resultado[0]->clase5}}">Necesita Mejorar</option>
                                                @endif
                                                @if ($resultado[0]->clase5 == 3)
                                                    <option value="{{$resultado[0]->clase5}}">Satisfactorio</option>
                                                @endif
                                                @if ($resultado[0]->clase5 == 4)
                                                    <option value="{{$resultado[0]->clase5}}">Muy Satisfactorio</option>
                                                @endif
                                                @if ($resultado[0]->clase5 == 5)
                                                    <option value="{{$resultado[0]->clase5}}">Avanzado</option>
                                                @endif

                                                <option value="1">Insuficiente</option>
                                                <option value="2">Necesita Mejorar</option>
                                                <option value="3">Satisfactorio</option>
                                                <option value="4">Muy Satisfactorio</option>
                                                <option value="5">Avanzado</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select style="display:inline-block !important" name='clase6_{{$student->user_id}}' required> 
                                                @if ($resultado[0]->clase1 == 0)
                                                    <option value="0">-------</option>
                                                @endif
                                                @if ($resultado[0]->clase6 == 1)
                                                    <option value="{{$resultado[0]->clase6}}">Insuficiente</option>
                                                @endif
                                                @if ($resultado[0]->clase6 == 2)
                                                    <option value="{{$resultado[0]->clase6}}">Necesita Mejorar</option>
                                                @endif
                                                @if ($resultado[0]->clase6 == 3)
                                                    <option value="{{$resultado[0]->clase6}}">Satisfactorio</option>
                                                @endif
                                                @if ($resultado[0]->clase6 == 4)
                                                    <option value="{{$resultado[0]->clase6}}">Muy Satisfactorio</option>
                                                @endif
                                                @if ($resultado[0]->clase6 == 5)
                                                    <option value="{{$resultado[0]->clase6}}">Avanzado</option>
                                                @endif

                                                <option value="1">Insuficiente</option>
                                                <option value="2">Necesita Mejorar</option>
                                                <option value="3">Satisfactorio</option>
                                                <option value="4">Muy Satisfactorio</option>
                                                <option value="5">Avanzado</option>
                                            </select>
                                        </td>
                                        <td><input name='reporte_{{$student->user_id}}' required value="{{$resultado[0]->reportes}}" type="text"></td>
                                       
                                    </tr>
                                @endforeach
                                <tr><td><button class="btn btn-lg btn-block btn-success" type="submit" >SALVAR NOTAS</button></td></tr>
                            </tbody>
                            
                            <!--Table body-->
                            </table>
                            <!--Table-->
                          </form>
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