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
      
       
    </header>
    <!--/.Double navigation-->
  
    <!--Main Layout-->
    <main>
      <div class="container-fluid">
        <!--row-->
        <div class="row"> 
            <h1>BOLETA DE CALIFICACIONES</h1>

                @foreach ($resultados as $resultado)

                <h3>{{$resultado->nombre}} {{$resultado->apellido}} </h3>

                    <table width="800">
                        <tr>
                            <th>Asignatura</th>
                            <th>I P</th>
                            <th>II P</th>
                            <th>III P</th>
                            <th>IV P</th>
                            <th>PROM.</th>
                            <th>RECU.</th>
                        </tr>
                
                        <tr>
                            <td>{{$resultado->clase}}</td>
                            <td>{{($resultado->Acum1) + ($resultado->Exa1)}}</td>
                            <td>{{($resultado->Acum2) + ($resultado->Exa2)}}</td>
                            <td>{{($resultado->Acum3) + ($resultado->Exa3)}}</td>
                            <td>{{($resultado->Acum4) + ($resultado->Exa4)}}</td>
                            <td>{{
                                (
                                (($resultado->Acum1) + ($resultado->Exa1))+
                                (($resultado->Acum2) + ($resultado->Exa2))+
                                (($resultado->Acum3) + ($resultado->Exa3))+
                                (($resultado->Acum4) + ($resultado->Exa4))
                                )/4
                                
                                }}</td>
                            <td>{{$resultado->Recu1}}</td>
                        </tr>

                    </table>
                @endforeach

                <hr><hr>


           

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

  <script type="text/javascript" src="{{ URL::asset('js/main.js')}}"></script>
</body>

</html>