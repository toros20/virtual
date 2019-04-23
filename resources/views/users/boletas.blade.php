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
                {{-- tabla historial de este curso y seccion --}}
                <?php $historial = 'historial_'.$curso.'_'.$seccion; ?>
                
                @foreach ($estudiantes as $estudiante)
                        <?php $cont=0; $total1=0; $total2=0; $total3=0; $total4=0; ?>

                        <table border='1' align="center" width="600">
                            <tr><td>BOLETA DE CALIFICACIONES</td></tr>
                            <tr><td>{{$estudiante->name}} {{$estudiante->lastname}}</td></tr>
                        </table>

                        <table border='1' align="center" width="600">
                                <tr>
                                    <th>Asignatura</th>
                                    <th style="text-align:center">I P</th>
                                    <th style="text-align:center">II P</th>
                                    <th style="text-align:center">III P</th>
                                    <th style="text-align:center">IV P</th>
                                    <th style="text-align:center">PROM.</th>
                                    <th style="text-align:center">RECU.</th>
                                </tr>
                        @foreach ($clases as $clase)

                        <?php 
                              $resultado = DB::table($historial)
                                        ->join('clases', $historial.'.clase_id', '=', 'clases.id')
                                        ->where ([
                                                    [$historial.'.clase_id', '=', $clase->clase_id],
                                                    [$historial.'.student_id', '=', $estudiante->user_id],
                                                ])
                                        ->Select('clases.name as clase',$historial.'.*')
                                        ->get();
                                $total1+=($resultado[0]->Acum1) + ($resultado[0]->Exa1);
                                $total2+=($resultado[0]->Acum2) + ($resultado[0]->Exa2);
                                $total3+=($resultado[0]->Acum3) + ($resultado[0]->Exa3);
                                $total4+=($resultado[0]->Acum4) + ($resultado[0]->Exa4);
                              
                        ?>

                            <tr>
                                <td>{{$resultado[0]->clase}}</td>
                                <td style="text-align:center; width:50px">{{($resultado[0]->Acum1) + ($resultado[0]->Exa1)}}</td>
                                <td style="text-align:center; width:50px">{{-- {{($resultado[0]->Acum2) + ($resultado[0]->Exa2)}}--}}</td> 
                                <td style="text-align:center; width:50px">{{--{{($resultado[0]->Acum3) + ($resultado[0]->Exa3)}}--}}</td>
                                <td style="text-align:center; width:50px">{{--{{($resultado[0]->Acum4) + ($resultado[0]->Exa4)}}--}}</td>
                                <td style="text-align:center; width:50px">
                                   {{--  (
                                    (($resultado[0]->Acum1) + ($resultado[0]->Exa1))+
                                    (($resultado[0]->Acum2) + ($resultado[0]->Exa2))+
                                    (($resultado[0]->Acum3) + ($resultado[0]->Exa3))+
                                    (($resultado[0]->Acum4) + ($resultado[0]->Exa4))
                                    )/4  --}}
                                    
                                    </td>
                                <td style="text-align:center; width:50px">{{--{{$resultado[0]->Recu1}}--}}</td>
                            </tr>
                          <?php $cont+=1;?>
                        @endforeach {{-- fin del foreach de estudiante --}}
                    </table>
                    <table style="margin-bottom:10px; " border='1' align="center" width="600">
                            <tr>
                                    <td>PROMEDIO DE PARCIAL</td>
                                    <td style="text-align:center; width:50px"><?php echo round(($total1/$cont),2)?></td>
                                    <td style="text-align:center; width:50px"><?php //echo Round(($total2/$cont),2)?></td>
                                    <td style="text-align:center; width:50px"><?php //echo Round(($total3/$cont),2)?></td>
                                    <td style="text-align:center; width:50px"><?php //echo Round(($total4/$cont),2)?></td>
                                    <td style="text-align:center; width:50px"></td>
                                    <td style="text-align:center; width:50px"></td>
                                </tr>
                        </table>
                   
               @endforeach  {{-- fin del foreach de estudiante --}}

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