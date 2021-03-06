@php
    $arrayMeses = array('Ene', 'Febr', 'Mar', 'Abr', 'Mayo', 'Jun',
   'Jul', 'Agos', 'Sept', 'Oct', 'Nov', 'Dic');
 
   $arrayDias = array( 'Domingo', 'Lunes', 'Martes',

       'Miércoles', 'Jueves', 'Viernes', 'Sábado');
    
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
                               
                @foreach ($docentes as $docente)
                    
                    <?php  $cont=0; $total_evaluados=0; $tea=0; $ter=0;$tea2=0; $ter2=0;  ?>
                        <table class=" tabla tabla-striped tabla-bordered" style=" text-align:center " align="center" width="700">
                           
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
                        </table>
                        <table>
                            <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                            <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                        </table>

                        <table  style="tabla-striped text-align:center; border: 1px solid #dee2e6; "  align="center" width="700">
                                <tr style="border: 1px solid #dee2e6; background-color:#f2f2f2;"> 
                                    <td style=" border: 1px solid #dee2e6;"><h5>RESUMEN DEL DOCENTE</h5></td>
                                    <td style=" border: 1px solid #dee2e6;"><?php echo $arrayDias[date('w')]." ".date('d')."/".$arrayMeses[date('m')-1]."/".date('Y');?></td></tr>
                                <tr style="border: 1px solid #dee2e6; ">
                                    <td style="padding-top:5px;  border: 1px solid #dee2e6;">
                                        <h5>I Y II PARCIAL  </h5>
                                    </td>
                                    <td style=" border: 1px solid #dee2e6;">
                                        <h5>Cuenta: {{$docente->cuenta}} </h5>
                                    </td>
                                </tr>
                        </table>
    
                        <table class="tabla tabla-striped tabla-bordered"  style=" text-align:center; border: 1px solid #dee2e6; "  align="center" width="700">
                            <tr style="border: 1px solid #dee2e6; "><td ><h4 style="font-weight: bold;"> {{$docente->name}} {{$docente->lastname}}</h4></td></tr>
                        </table>
                        <table>
                            <tr><td>&nbsp;</td></tr>
                        </table>

                        <table class="tabla tabla-striped tabla-bordered"  style="margin-top:10px; border: 1px solid #dee2e6; "  align="center" width="700">
                                <tr style="border: 1px solid #dee2e6; "><th style="text-align:center; width:5px;font-weight: bold;">No. </th>
                                    <th style="font-weight: bold;">ESPACIOS PEDAGOGICOS</th>
                                    <th style="text-align:center; width:50px;font-weight: bold; border: 1px solid #dee2e6;">#APRO 1P.</th>
                                    <th style="text-align:center; width:50px;font-weight: bold; border: 1px solid #dee2e6;">#REPRO 1P.</th>
                                    
                                    <th style="text-align:center; width:50px;font-weight: bold; border: 1px solid #dee2e6;"></th>

                                    <th style="text-align:center; width:50px;font-weight: bold; border: 1px solid #dee2e6;">#APRO 2P.</th>
                                    <th style="text-align:center; width:50px;font-weight: bold; border: 1px solid #dee2e6;">#REPRO 2P.</th>
                                    
                                </tr>
                        </table>
                        <table class="tabla tabla-striped tabla-bordered"  style="margin-top:10px; border: 1px solid #dee2e6; "  align="center" width="700">

                            <?php
                            
                                $asignaciones = DB::table('assignments')
                                            ->join('courses', 'assignments.course_id', '=', 'courses.id')
                                            ->join('clases', 'assignments.clase_id', '=', 'clases.id')
                                            ->where ([
                                                ['assignments.user_id', '=', $docente->id],
                                                ['courses.id', '>', '8'],
                                                ['clases.semester', '<', '2'],

                                            ])
                                            ->Select('assignments.section','courses.id as course_id','courses.name as curso','clases.short_name as clase','clases.id as clase_id')
                                            ->orderBy('courses.id','asc')
                                            ->orderBy('assignments.section','asc')
                                            ->get(); 
                                           
                            ?>

                            @foreach ($asignaciones as $asignacion)

                                <?php 
                                    $total_alumnos=0; $aprobados=0;$reprobados=0;$aprobados2p=0;$reprobados2p=0;
                                    $historial = 'historial_'.$asignacion->course_id.'_'.strtolower($asignacion->section); 
                                    $resultados= DB::table($historial)
                                                    ->where ([
                                                                [$historial.'.clase_id', '=', $asignacion->clase_id]
                                                            ])
                                                    ->Select($historial.'.Acum1', $historial.'.Exa1',$historial.'.Acum2', $historial.'.Exa2')
                                                    ->get();

                        
                                    foreach ($resultados as $resultado) {
                                        $total_alumnos+=1;$total_evaluados+=1;
                                        if ( ($resultado->Acum1 + $resultado->Exa1) < 70 ) {
                                            $reprobados+=1; $ter+=1;
                                        }else{
                                            $aprobados+=1;$tea+=1;
                                        }

                                        if ( ($resultado->Acum2 + $resultado->Exa2) < 70 ) {
                                            $reprobados2p+=1; $ter2+=1;
                                        }else{
                                            $aprobados2p+=1;$tea2+=1;
                                        }
                                    }// fin del ciclo resultados
                                ?>

                                @if ($cont%2==0)
                                     <tr style="border: 1px solid #dee2e6; background-color:#f2f2f2;">
                                        <td style="border: 1px solid #dee2e6; font-weight: bold; width:5px; padding:0.35rem;"><?php echo $cont+1; ?></td>
                                        <td style="border: 1px solid #dee2e6; text-align:left;padding:0.35rem;">{{$asignacion->curso}} {{$asignacion->section}} {{$asignacion->clase}}</td>
                                    
                                        <td style="border: 1px solid #dee2e6; text-align:center; width:50px; padding:0.35rem;"><?php echo $aprobados; ?></td>
                                        <td style="text-align:center; width:50px ;padding:0.35rem; border: 1px solid #dee2e6; color:red"><?php echo $reprobados; ?></td> 
                                        <td style="text-align:center; width:50px ;padding:0.35rem; border: 1px solid #dee2e6;"></td> 
                                        <td style="border: 1px solid #dee2e6; text-align:center; width:50px; padding:0.35rem;"><?php echo $aprobados2p; ?></td>
                                        <td style="text-align:center; width:50px ;padding:0.35rem; border: 1px solid #dee2e6; color:red"><?php echo $reprobados2p; ?></td>
                                    </tr>
                                @else
                                    <tr style="border: 1px solid #dee2e6; background-color:#fbfbfb;">
                                        <td style="border: 1px solid #dee2e6; font-weight: bold; width:5px; padding:0.35rem;"><?php echo $cont+1; ?></td>
                                        <td style="border: 1px solid #dee2e6; text-align:left;padding:0.35rem;">{{$asignacion->curso}} {{$asignacion->section}} {{$asignacion->clase}}</td>
                                    
                                        <td style="border: 1px solid #dee2e6; text-align:center; width:50px; padding:0.35rem;"><?php echo $aprobados; ?></td>
                                        <td style="text-align:center; width:50px ;padding:0.35rem; border: 1px solid #dee2e6; color:red"><?php echo $reprobados; ?></td> 
                                        <td style="text-align:center; width:50px ;padding:0.35rem; border: 1px solid #dee2e6;"></td> 
                                        <td style="border: 1px solid #dee2e6; text-align:center; width:50px; padding:0.35rem;"><?php echo $aprobados2p; ?></td>
                                        <td style="text-align:center; width:50px ;padding:0.35rem; border: 1px solid #dee2e6; color:red"><?php echo $reprobados2p; ?></td>
                                    </tr>
                                @endif

                               
                                    <?php $cont+=1; ?>

                            @endforeach {{-- fin del ciclo para cada asignacion --}}

                        </table>

                        <table>
                            <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>                            
                        </table>

                        <table class="tabla tabla-striped tabla-bordered"  style="margin-top:10px; border: 1px solid #dee2e6; "  align="center" width="700">
                            <tr style="border: 1px solid #dee2e6; background-color:#fbfbfb;">
                                    <td style="border: 1px solid #dee2e6; font-weight: bold; width:5px; padding:0.35rem;">*</td>
                                    <td style="border: 1px solid #dee2e6; text-align:left;padding:0.35rem;">Total de Evaluaaciones Realizadas</td>
                                
                                    <td style="border: 1px solid #dee2e6; text-align:center; width:50px; padding:0.35rem;"><?php //echo $tea;?></td>
                                    <td style="text-align:center; width:50px ;padding:0.35rem; border: 1px solid #dee2e6;"><?php //echo round(($tea*100)/$total_evaluados);?> %</td> 
                                    <td style="text-align:center; width:50px ;padding:0.35rem; border: 1px solid #dee2e6;"></td>
                                    <td style="text-align:center; width:50px ;padding:0.35rem; border: 1px solid #dee2e6; color:red;"><?php //echo $ter;?></td>
                                    <td style="text-align:center; width:50px ;padding:0.35rem; border: 1px solid #dee2e6; color:red;"><?php //echo round(($ter*100)/$total_evaluados);?> %</td>
                            </tr>
                        </table>


                        <table class="tabla tabla-striped tabla-bordered"  style="margin-top:10px; border: 1px solid #dee2e6; "  align="center" width="700">
                                <tr style="border: 1px solid #dee2e6; ">
                                    <th style="text-align:center; width:5px;font-weight: bold;">No. </th>
                                    <th style="font-weight: bold;">OBSERVACIONES</th>
                                </tr>
                                <tr>
                                    <td style="text-align:center; width:5px;font-weight: bold; border:1px solid #dee2e6;">1</td>
                                    <td style="font-weight: bold; border:1px solid #dee2e6;">.</td>
                                </tr>
                                <tr>
                                        <td style="text-align:center; width:5px;font-weight: bold; border:1px solid #dee2e6;">2</td>
                                        <td style="font-weight: bold; border:1px solid #dee2e6;">.</td>
                                    </tr>
                                    <tr>
                                            <td style="text-align:center; width:5px;font-weight: bold; border:1px solid #dee2e6;">3</td>
                                            <td style="font-weight: bold; border:1px solid #dee2e6;">.</td>
                                        </tr>
                                        <tr>
                                                <td style="text-align:center; width:5px;font-weight: bold; border:1px solid #dee2e6;">4</td>
                                                <td style="font-weight: bold; border:1px solid #dee2e6;">.</td>
                                            </tr>
                                            <tr>
                                                    <td style="text-align:center; width:5px;font-weight: bold; border:1px solid #dee2e6;">5</td>
                                                    <td style="font-weight: bold; border:1px solid #dee2e6;">.</td>
                                                </tr>
                        </table>
                        <pagebreak/>

                @endforeach  {{-- fin del ciclo para cada docente --}}
                   
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
include($_SERVER['DOCUMENT_ROOT']."/virtual/vendor/autoload.php");

$html = ob_get_clean();

//$mpdf=new mPDF('c','Letter','',''); 
$mpdf=new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => [216, 279],
    'orientation' => 'P'
]); 


$mpdf->allow_charset_conversion= true;

$mpdf->charset_in='UTF-8';

//$mpdf->SetDisplayMode('fullpage');

$mpdf->list_indent_first_level = 0; // 1 or 0 - whether to indent the first level of a list

$mpdf->WriteHTML($html);

$mpdf->Output('Boleta de Docentes.pdf','I');

exit();
//==============================================================
//==============================================================
//==============================================================


?>
