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

            @foreach ($estudiantes as $estudiante)
                
                    {{
                     $resultados = DB::table('users')
                        ->join( $historial, 'users.id', '=',  $historial.'.student_id')
                        ->join('clases', $historial.'.clase_id', '=', 'clases.id')
                        ->where ([
                                    ['users.id', '=', $estudiante->user_id],
                                ])
                        ->Select('users.name as nombre','users.lastname as apellido','clases.name as clase',$historial.'.*')
                        ->get(); }}

                        <h3>{{$resultado->nombre}} {{$resultado->apellido}} </h3>

                @foreach ($resultados as $resultado)

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
                            <td>{{($resultado->Acum1) + ($resultado->exa1)}}</td>
                            <td>{{($resultado->Acum2) + ($resultado->exa2)}}</td>
                            <td>{{($resultado->Acum3) + ($resultado->exa3)}}</td>
                            <td>{{($resultado->Acum4) + ($resultado->exa4)}}</td>
                            <td>{{
                                (
                                (($resultado->Acum1) + ($resultado->exa1))+
                                (($resultado->Acum2) + ($resultado->exa2))+
                                (($resultado->Acum3) + ($resultado->exa3))+
                                (($resultado->Acum4) + ($resultado->exa4))
                                )/4
                                
                                }}</td>
                            <td>{{$resultado->Recu1}}</td>
                        </tr>

                    </table>
                @endforeach

                <hr><hr>

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

  <script type="text/javascript" src="{{ URL::asset('js/main.js')}}"></script>
</body>

</html>