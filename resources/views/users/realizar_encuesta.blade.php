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
                     
                        <li>
                            <a onclick="boletas()">
                                Boletas
                            </a>
                        </li>
                     
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
         {{--  <div class="float-left">
             <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a> 
          </div> --}}
          <!-- Breadcrumb-->
        {{--   <div class="breadcrumb-dn mr-auto">
             <p>Menú de Navegación</p> 
          </div> --}}
          <ul class="nav navbar-nav nav-flex-icons ml-auto">
            
             
            <li class="nav-item">
              <a class="nav-link"> <span class="clearfix d-none d-sm-inline-block">
                  Llena la encuesta siendo lo mas honesto y objetivo posible.</span></a>
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
           <div class="col-md-1 col-sm-1 col-lg-1 mb-4" style="text-align: center"></div>
            <!--Card column-->

                   
            <div class="col-md-6 col-sm-6 col-lg-10 mb-4" style="text-align: center">
        
                    <!-- Card -->
                    <div class="card gradient-card" style="text-align: center">
                
                        <div class="card-image" style="background-image: url(https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20%2814%29.jpg)">
                
                            <!-- Content -->
                            
                            <div class="text-white h-100 mask blue-gradient-rgba">        
    
                                <div class="first-content align-self-center p-3">
                                <h3 class="card-title">{{$preguntas[0]->id}}.{{$preguntas[0]->Pregunta}} </h3>
                              
                                </div>
                                <div class="second-content align-self-center mx-auto text-center">
                                <i class="fa fa-money fa-3x"></i>
                                </div>
                            </div>
                        
                        </div>
                            
                        <div class="card-body card-body-cascade ">
                            <input id="token" type="hidden" name="_token"  value="{{ csrf_token() }}">
                            <input id="contador" type="hidden" name="contador"  value="{{ $cont_docentes }}">
                            @foreach ($docentes as $docente)
                            <div id="div_{{$docente->docente}}">
                            <ul class="list-group">
                                    <a class="list-group-item list-group-item-action" style="color:black; border:none;" href="#">
                                        <li class="list-group-item" style="text-align:center;">
                                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                <table>
                                                    <tr>
                                                        <td width="150px"> <img src="../img/docentes2019/{{$docente->docente}}.jpeg" width="150px" alt=""></td>
                                                        <td width="100px">{{$docente->name}} {{$docente->lastname}} </td>
                                                        <td width="130px"><button onclick="votar_encuesta({{$preguntas[0]->id}},{{$docente->docente}},{{$usuario[0]->id}},1)" type="button" class="btn  btn-danger"  >Debe.Mejorar</button></td>
                                                        <td width="130px"><button onclick="votar_encuesta({{$preguntas[0]->id}},{{$docente->docente}},{{$usuario[0]->id}},2)" type="button" class="btn  btn-warning" >Bueno</button></td>
                                                        <td width="130px"><button onclick="votar_encuesta({{$preguntas[0]->id}},{{$docente->docente}},{{$usuario[0]->id}},3)" type="button" class="btn  btn-primary" >Muy.Bueno</button></td>
                                                        <td width="130px"><button onclick="votar_encuesta({{$preguntas[0]->id}},{{$docente->docente}},{{$usuario[0]->id}},4)" type="button" class="btn  btn-success" >Excelente</button></td>
                                                    </tr>
                                                </table>                                                
                                        </li>
                                    </a>
                             </ul>
                            </div> 
                             @endforeach 
                             <div id="div_boton" style="display:none">
                                    <ul class="list-group" style="align-items:center;">
                                        <form  action={{route('verificar_cuenta')}}  method="post">                                       
                                            <a class="list-group-item" style="color:black; border:none;" href="#">
                                                <li class="list-group-item" style="text-align:center;">
                                                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                        <input type="hidden" name="cuenta" value="{{$usuario[0]->cuenta}}">
                                                        <table>
                                                            <tr>
                                                                <td width="90%"><button type="submit" class="btn btn-lg btn-primary">Siguiente Pregunta</button></td>
                                                            </tr>
                                                        </table>                                                
                                                </li>
                                            </a>
                                        </form>
                                     </ul>
                                    </div> 
                        </div>
                    </div>
                   
            </div>

            <!-- Card -->
            <div class="col-md-1 col-sm-1 col-lg-1 mb-4" style="text-align: center"></div>
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

   <script type='text/javascript'>
    $(function(){
        $(document).bind("contextmenu",function(e){
            alert('Acción No Permitida');
            return false;
        });
    });


    function copyToClipboard() {
    // Create a "hidden" input
    var aux = document.createElement("input");
    // Assign it the value of the specified element
    aux.setAttribute("value", "Tambien se Prohibe realizar Capturas de Pantallas. JAJAJA");
    // Append it to the body
    document.body.appendChild(aux);
    // Highlight its content
    aux.select();
    // Copy the highlighted text
    document.execCommand("copy");
    // Remove it from the body
    document.body.removeChild(aux);
    alert("Tambien se Prohibe realizar Capturas de Pantallas. JAJAJA");
    }

    $(window).keyup(function(e){
    if(e.keyCode == 44){
        copyToClipboard();
    }
    }); 
    </script> 
</body>

</html>