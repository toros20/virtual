@php
    $arrayMeses = array('Ene', 'Febr', 'Mar', 'Abr', 'Mayo', 'Jun',
   'Jul', 'Agos', 'Sept', 'Oct', 'Nov', 'Dic');
 
   $arrayDias = array( 'Domingo', 'Lunes', 'Martes',
       'Miércoles', 'Jueves', 'Viernes', 'Sábado');
    
    //ob_start();
@endphp
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
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <!-- Material Design Bootstrap -->
  <link href="{{ URL::asset('css/mdb.min.css')}}" rel="stylesheet">
  <!-- Your custom styles (optional) css
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
   
      <div class="container-fluid" align="center">
        <!--row-->
        <div class="row" align="center"> 
                {{-- tabla tabla-striped tabla-bordered historial de este curso y seccion --}}
                <?php $historial = 'historial_'.$curso.'_'.$seccion; ?>
                
                        <?php $cont=0; $total1=0; $total2=0; $total3=0; $total4=0; ?>
                      
                        <table class=" tabla tabla-striped tabla-bordered" style=" text-align:center " align="center" width="95%">
                            @if ($course->is_bilingue == 1)
                                <tr> 
                                    <td width="12%" rowspan="2" align="center">
                                        <img src="{{ URL::asset('img/logo_sanjose.png')}}" width="70" height="70" alt=""/>
                                    </td>
                                    <td>
                                    <h4 style="font-weight: bold;">C.E.M.N.G.B SAN JOSÉ DEL CARMEN </h4>
                                    <p style="margin-bottom:0px; ">Colonia La Camapaña, Tegucigalpa</p>
                                    <p style="margin-bottom:0px; ">Tel:(+504) 2221-4474 /75</p>
                                    <p style="margin-bottom:0px; ">Web: sanjosedelcarmen.edu.hn</p>
                                    
                                    </td>
                                </tr>
                            @endif
                            @if ($course->is_bilingue == 0)
                            <tr> 
                                <td width="12%" rowspan="2" align="center">
                                    <img src="{{ URL::asset('img/logo_sanjose.png')}}" width="70" height="70" alt=""/>
                                </td>
                                <td>
                                <h4 style="font-weight: bold;">C.E.M.N.G SAN JOSÉ DEL CARMEN </h4>
                                <p style="margin-bottom:0px; ">Colonia La Camapaña, Tegucigalpa</p>
                                <p style="margin-bottom:0px; ">Tel:(+504) 2221-4474 /75</p>
                                <p style="margin-bottom:0px; ">Web: sanjosedelcarmen.edu.hn</p>
                                
                                </td>
                            </tr>
                        @endif
                           
                        </table>
                        <table  style="tabla-striped text-align:center; border: 1px solid #dee2e6; "  align="center" width="95%">
                            <tr style="border: 1px solid #dee2e6; background-color:#f2f2f2;"> <td style=" border: 1px solid #dee2e6;"><h5>ACTAS DE <?php echo $parcial . " PARCIAL";?></h5></td>
                                <td style=" border: 1px solid #dee2e6;"><?php echo $arrayDias[date('w')]." ".date('d')."/".$arrayMeses[date('m')-1]."/".date('Y');?></td></tr>
                            <tr style="border: 1px solid #dee2e6; ">
                                <td style="padding-top:5px;  border: 1px solid #dee2e6;">
                                    <h5>Curso: {{$course->name}} </h5>
                                </td>
                                <td style=" border: 1px solid #dee2e6;">
                                    <h5>Sección: {{$section}}</h5>
                                </td>
                            </tr>
                        </table>

                            <table class="tabla tabla-striped tabla-bordered"  style=" text-align:center; border: 1px solid #dee2e6; "  align="center" width="95%">
                                <tr style="border: 1px solid #dee2e6; ">
                                    <th style="border: 1px solid #dee2e6;">No.</th>
                                    <th style="border: 1px solid #dee2e6;">Nombre de Estudiante</th>
                                    
                                    @foreach ($clases as $clase)
                                         <th style="text-rotate: 90 text-align:left; width:50px;font-weight: bold; border: 1px solid #dee2e6;">{{$clase->short_name}}</th>
                                    @endforeach
                                    <th style="border: 1px solid #dee2e6;">Repro.</th>
                                </tr>

                                @foreach ($estudiantes as $estudiante)

                                <tr>
                                    <td><?php echo $cont+1;$reprobadas=0; ?></td>
                                    <td style="font-weight: bold; border: 1px solid #dee2e6; text-align:left;"><p> {{$estudiante->name}} {{$estudiante->lastname}}</p></td>
                                    
                                    @foreach ($clases as $clase)
                                        <?php 
                                            
                                            $resultado = DB::table($historial)
                                                        ->join('clases', $historial.'.clase_id', '=', 'clases.id')
                                                        ->where ([
                                                                    [$historial.'.clase_id', '=', $clase->clase_id],
                                                                    [$historial.'.student_id', '=', $estudiante->user_id],
                                                                ])
                                                        ->Select($historial.'.*')
                                                        ->get();

                                                        $total1=($resultado[0]->Acum1) + ($resultado[0]->Exa1);

                                                        if ($total1 < 70) {
                                                            $reprobadas+=1;
                                                        }
                                                        /*$total2+=($resultado[0]->Acum2) + ($resultado[0]->Exa2);
                                                        $total3+=($resultado[0]->Acum3) + ($resultado[0]->Exa3);
                                                        $total4+=($resultado[0]->Acum4) + ($resultado[0]->Exa4);*/
                                            
                                        ?>
                                        @if ( $total1 < 70)
                                            <td style="text-align:center; width:50px;font-weight: bold; border: 1px solid #dee2e6; color:red"><?php echo $total1 ?> </td>
                                        @else 
                                            <td style="text-align:center; width:50px;font-weight: bold; border: 1px solid #dee2e6;"><?php echo $total1 ?> </td>
                                        @endif

                                     @endforeach {{--fin del ciclo para cada clase --}}

                                            <td style="text-align:center; width:50px;font-weight: bold; border: 1px solid #dee2e6;"><?php echo $reprobadas ?> </td>
                                    
                                </tr>
                                    <?php $cont+=1;?>
                                @endforeach {{--fin del ciclo para cada estudiante --}}

                            </table>
                            
                    </table>

        </div><!--row-->

 <!--Main Layout-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <!-- MDB core JavaScript -->

</body>

</html>

<?php 

//==============================================================
//==============================================================
//==============================================================

/* include($_SERVER['DOCUMENT_ROOT']."/virtual/vendor/autoload.php");

$html = ob_get_clean();

//$html = utf8_encode($html);

//$mpdf=new mPDF('c','Letter','',''); 
$mpdf=new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => [190, 236],
    'orientation' => 'P'
]); 

$mpdf->allow_charset_conversion= true;

$mpdf->charset_in='UTF-8';

//$mpdf->SetDisplayMode('fullpage');

$mpdf->list_indent_first_level = 0; // 1 or 0 - whether to indent the first level of a list

$mpdf->WriteHTML($html);

$mpdf->Output('Boleta de Calificaciones.pdf','I');

exit(); */
//==============================================================
//==============================================================
//==============================================================


?>
