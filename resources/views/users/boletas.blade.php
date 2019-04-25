@php
    $arrayMeses = array('Ene', 'Febr', 'Mar', 'Abr', 'Mayo', 'Jun',
   'Jul', 'Agos', 'Sept', 'Oct', 'Nov', 'Dic');
 
   $arrayDias = array( 'Domingo', 'Lunes', 'Martes',
       'Miércoles', 'Jueves', 'Viernes', 'Sábado');
    
    ob_start();
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
                
                @foreach ($estudiantes as $estudiante)
                        <?php $cont=0; $total1=0; $total2=0; $total3=0; $total4=0; ?>
                        <tr> <td width="12%" rowspan="2" align="center">
                                <img src="{{ URL::asset('img/logo_sanjose.png')}}" width="70" height="70" alt=""/>
                            </td>
                            <td>
                                @if ( $curso > 15)
                                    <h4 style="font-weight: bold;">C.E.M.N.G.B. SAN JOSÉ DEL CARMEN </h4>
                                @else 
                                    <h4 style="font-weight: bold;">C.E.M.N.G SAN JOSÉ DEL CARMEN </h4>
                                @endif
                            <p style="margin-bottom:0px; ">Colonia La Camapaña, Tegucigalpa</p>
                            <p style="margin-bottom:0px; ">Tel:(+504) 2221-4474 /75</p>
                            <p style="margin-bottom:0px; ">Web: sanjosedelcarmen.edu.hn</p>
                            
                        </td></tr>
                        <table class=" tabla tabla-striped tabla-bordered" style=" text-align:center " align="center" width="700">
                            
                            
                        </table>
                        <table  style="tabla-striped text-align:center; border: 1px solid #dee2e6; "  align="center" width="700">
                            <tr style="border: 1px solid #dee2e6; background-color:#f2f2f2;"> <td style=" border: 1px solid #dee2e6;"><h5>BOLETA DE CALIFICACIONES</h5></td>
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

                        <table class="tabla tabla-striped tabla-bordered"  style=" text-align:center; border: 1px solid #dee2e6; "  align="center" width="700">
                            <tr style="border: 1px solid #dee2e6; "><td ><h4 style="font-weight: bold;"> {{$estudiante->name}} {{$estudiante->lastname}}</h4></td></tr>
                        </table>
                        <table class="tabla tabla-striped tabla-bordered"  style="margin-top:10px; border: 1px solid #dee2e6; "  align="center" width="700">
                                <tr style="border: 1px solid #dee2e6; "><th style="text-align:center; width:5px;font-weight: bold;">No. </th>
                                    <th style="font-weight: bold;">ESPACIOS PEDAGOGICOS</th>
                                    <th style="text-align:center; width:50px;font-weight: bold; border: 1px solid #dee2e6;">I P</th>
                                    <th style="text-align:center; width:50px;font-weight: bold; border: 1px solid #dee2e6;">II P</th>
                                    <th style="text-align:center; width:50px;font-weight: bold; border: 1px solid #dee2e6;">III P</th>
                                    <th style="text-align:center; width:50px;font-weight: bold; border: 1px solid #dee2e6;">IV P</th>
                                    <th style="text-align:center; width:50px;font-weight: bold; border: 1px solid #dee2e6;">PROM.</th>
                                    <th style="text-align:center; width:50px;font-weight: bold; border: 1px solid #dee2e6;">RECU.</th>
                                </tr>
                        </table>
                        <table style="border: 1px solid #dee2e6; " class="tabla tabla-bordered"  align="center" width="700"> 
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
                            {{-- Codigo para intercalar por colores las filas --}}
                            @if ($cont%2==0 ) 
                                <tr style="border: 1px solid #dee2e6; background-color:#f2f2f2;">
                                    <td style="border: 1px solid #dee2e6; font-weight: bold; width:5px; padding:0.35rem;"><?php echo $cont+1; ?></td>
                                    <td style="border: 1px solid #dee2e6; text-align:left;padding:0.35rem;">{{$resultado[0]->clase}}</td>
                                    @if ( ($resultado[0]->Acum1) + ($resultado[0]->Exa1) < 70)
                                        <td style="border: 1px solid #dee2e6; text-align:center; width:50px; color:red; padding:0.35rem;">{{($resultado[0]->Acum1) + ($resultado[0]->Exa1)}}</td>
                                    @else 
                                        <td style="border: 1px solid #dee2e6; text-align:center; width:50px; padding:0.35rem;">{{($resultado[0]->Acum1) + ($resultado[0]->Exa1)}}</td>
                                    @endif
                                    
                                    <td style="text-align:center; width:50px ;padding:0.35rem; border: 1px solid #dee2e6;">{{-- {{($resultado[0]->Acum2) + ($resultado[0]->Exa2)}}--}}</td> 
                                    <td style="text-align:center; width:50px ;padding:0.35rem; border: 1px solid #dee2e6;">{{--{{($resultado[0]->Acum3) + ($resultado[0]->Exa3)}}--}}</td>
                                    <td style="text-align:center; width:50px ;padding:0.35rem; border: 1px solid #dee2e6;">{{--{{($resultado[0]->Acum4) + ($resultado[0]->Exa4)}}--}}</td>
                                    <td style="text-align:center; width:50px ;padding:0.35rem; border: 1px solid #dee2e6;">
                                       {{--  (
                                        (($resultado[0]->Acum1) + ($resultado[0]->Exa1))+
                                        (($resultado[0]->Acum2) + ($resultado[0]->Exa2))+
                                        (($resultado[0]->Acum3) + ($resultado[0]->Exa3))+
                                        (($resultado[0]->Acum4) + ($resultado[0]->Exa4))
                                        )/4  --}}
                                        
                                        </td>
                                    <td style="text-align:center; width:50px; border: 1px solid #dee2e6;">{{--{{$resultado[0]->Recu1}}--}}</td>
                                </tr>
                            @else
                                <tr style="border: 1px solid #dee2e6; background-color:#fbfbfb; ">
                                    <td style="border: 1px solid #dee2e6; font-weight: bold; width:5px; padding:0.35rem;"><?php echo $cont+1; ?></td>
                                    <td style="border: 1px solid #dee2e6; text-align:left;padding:0.35rem;">{{$resultado[0]->clase}}</td>
                                    @if ( ($resultado[0]->Acum1) + ($resultado[0]->Exa1) < 70)
                                        <td style="border: 1px solid #dee2e6; text-align:center; width:50px; color:red; padding:0.35rem;">{{($resultado[0]->Acum1) + ($resultado[0]->Exa1)}}</td>
                                    @else 
                                        <td style="border: 1px solid #dee2e6; text-align:center; width:50px; padding:0.35rem;">{{($resultado[0]->Acum1) + ($resultado[0]->Exa1)}}</td>
                                    @endif
                                    
                                    <td style="text-align:center; width:50px ;padding:0.35rem; border: 1px solid #dee2e6;">{{-- {{($resultado[0]->Acum2) + ($resultado[0]->Exa2)}}--}}</td> 
                                    <td style="text-align:center; width:50px ;padding:0.35rem; border: 1px solid #dee2e6;">{{--{{($resultado[0]->Acum3) + ($resultado[0]->Exa3)}}--}}</td>
                                    <td style="text-align:center; width:50px ;padding:0.35rem; border: 1px solid #dee2e6;">{{--{{($resultado[0]->Acum4) + ($resultado[0]->Exa4)}}--}}</td>
                                    <td style="text-align:center; width:50px ;padding:0.35rem; border: 1px solid #dee2e6;">
                                       {{--  (
                                        (($resultado[0]->Acum1) + ($resultado[0]->Exa1))+
                                        (($resultado[0]->Acum2) + ($resultado[0]->Exa2))+
                                        (($resultado[0]->Acum3) + ($resultado[0]->Exa3))+
                                        (($resultado[0]->Acum4) + ($resultado[0]->Exa4))
                                        )/4  --}}
                                        
                                        </td>
                                    <td style="text-align:center; width:50px; border: 1px solid #dee2e6;">{{--{{$resultado[0]->Recu1}}--}}</td>
                                </tr>
                            @endif

                          <?php $cont+=1;?>
                        @endforeach {{-- fin del foreach de cada clase --}}
                    </table>
                    <table class="tabla tabla-striped tabla-bordered"  style="margin-bottom:20px; border: 1px solid #dee2e6;"  align="center" width="700">
                        <?php $promedio1=$total1/$cont; ?>
                            <tr style="border: 1px solid #dee2e6; ">
                                    <td style="font-weight: bold;">PROMEDIO DE PARCIAL</td>
                                    <td style="text-align:center; width:50px;font-weight: bold; padding:0.5rem; border: 1px solid #dee2e6;"><?php echo round($promedio1)?></td>
                                    <td style="text-align:center; width:50px;font-weight: bold; padding:0.5rem; border: 1px solid #dee2e6;"><?php //echo Round(($total2/$cont),2)?></td>
                                    <td style="text-align:center; width:50px;font-weight: bold; padding:0.5rem; border: 1px solid #dee2e6;"><?php //echo Round(($total3/$cont),2)?></td>
                                    <td style="text-align:center; width:50px;font-weight: bold; padding:0.5rem; border: 1px solid #dee2e6;"><?php //echo Round(($total4/$cont),2)?></td>
                                    <td style="text-align:center; width:50px;font-weight: bold; padding:0.5rem; border: 1px solid #dee2e6;"></td>
                                    <td style="text-align:center; width:50px;font-weight: bold; padding:0.5rem; border: 1px solid #dee2e6;"></td>
                                </tr>
                        </table>

                        <?php //obtenemos los datos de personalidad de este alumno en este parcial
                        $personalidad = DB::table('personalidad')
                                  ->where ([
                                            ['personalidad.student_id', '=', $estudiante->user_id],
                                            ['personalidad.parcial', '=', 1],
                                          ])
                                  ->get();   
                            $c1_parcial1 = ""; $c2_parcial1 = ""; $c3_parcial1 = ""; $c4_parcial1 = ""; $c5_parcial1 = ""; $c6_parcial1 = "";

                            if ($personalidad[0]->clase1 == 1) {$c1_parcial1="Insuficiente";}
                            if ($personalidad[0]->clase1 == 2) {$c1_parcial1="Necesita Mejorar";}
                            if ($personalidad[0]->clase1 == 3) {$c1_parcial1="Satisfactorio";}
                            if ($personalidad[0]->clase1 == 4) {$c1_parcial1="Muy Satisfactorio";}
                            if ($personalidad[0]->clase1 == 5) {$c1_parcial1="Avanzado";} 
                            
                            if ($personalidad[0]->clase2 == 1) {$c2_parcial1="Insuficiente";}
                            if ($personalidad[0]->clase2 == 2) {$c2_parcial1="Necesita Mejorar";}
                            if ($personalidad[0]->clase2 == 3) {$c2_parcial1="Satisfactorio";}
                            if ($personalidad[0]->clase2 == 4) {$c2_parcial1="Muy Satisfactorio";}
                            if ($personalidad[0]->clase2 == 5) {$c2_parcial1="Avanzado";} 

                            if ($personalidad[0]->clase3 == 1) {$c3_parcial1="Insuficiente";}
                            if ($personalidad[0]->clase3 == 2) {$c3_parcial1="Necesita Mejorar";}
                            if ($personalidad[0]->clase3 == 3) {$c3_parcial1="Satisfactorio";}
                            if ($personalidad[0]->clase3 == 4) {$c3_parcial1="Muy Satisfactorio";}
                            if ($personalidad[0]->clase3 == 5) {$c3_parcial1="Avanzado";} 

                            if ($personalidad[0]->clase4 == 1) {$c4_parcial1="Insuficiente";}
                            if ($personalidad[0]->clase4 == 2) {$c4_parcial1="Necesita Mejorar";}
                            if ($personalidad[0]->clase4 == 3) {$c4_parcial1="Satisfactorio";}
                            if ($personalidad[0]->clase4 == 4) {$c4_parcial1="Muy Satisfactorio";}
                            if ($personalidad[0]->clase4 == 5) {$c4_parcial1="Avanzado";} 

                            if ($personalidad[0]->clase5 == 1) {$c5_parcial1="Insuficiente";}
                            if ($personalidad[0]->clase5 == 2) {$c5_parcial1="Necesita Mejorar";}
                            if ($personalidad[0]->clase5 == 3) {$c5_parcial1="Satisfactorio";}
                            if ($personalidad[0]->clase5 == 4) {$c5_parcial1="Muy Satisfactorio";}
                            if ($personalidad[0]->clase5 == 5) {$c5_parcial1="Avanzado";} 

                            if ($personalidad[0]->clase6 == 1) {$c6_parcial1="Insuficiente";}
                            if ($personalidad[0]->clase6 == 2) {$c6_parcial1="Necesita Mejorar";}
                            if ($personalidad[0]->clase6 == 3) {$c6_parcial1="Satisfactorio";}
                            if ($personalidad[0]->clase6 == 4) {$c6_parcial1="Muy Satisfactorio";}
                            if ($personalidad[0]->clase6 == 5) {$c6_parcial1="Avanzado";} 
                        ?>
                      <table style="margin-top:10px; font-size:1.25rem; border: 1px solid #dee2e6;"  align="center" width="700">
                            <tr style="border: 1px solid #dee2e6; ">
                                <th style="text-align:center; width:100px ;font-weight: bold; padding:0.25rem; border: 1px solid #dee2e6;">Personalidad</th>
                                <th style="text-align:center; width:150px ;font-weight: bold; padding:0.25rem; border: 1px solid #dee2e6;">I P</th>
                                <th style="text-align:center; width:150px ;font-weight: bold; padding:0.25rem; border: 1px solid #dee2e6;">II P</th>
                                <th style="text-align:center; width:150px ;font-weight: bold; padding:0.25rem; border: 1px solid #dee2e6;">III P</th>
                                <th style="text-align:center; width:150px ;font-weight: bold; padding:0.25rem; border: 1px solid #dee2e6;">IV P</th>
                            </tr>
                            <tr style="border: 1px solid #dee2e6; ">
                                <th style="width:300px; padding:0.25rem; ">Puntualidad</th>
                                <th style="width:100px; padding:0.25rem; text-align:center; border: 1px solid #dee2e6;"><?php echo $c1_parcial1; ?></th>
                                <th style="width:100px; padding:0.25rem; text-align:center; border: 1px solid #dee2e6;"></th>
                                <th style="width:100px; padding:0.25rem; text-align:center; border: 1px solid #dee2e6;"></th>
                                <th style="width:100px; padding:0.25rem; text-align:center; border: 1px solid #dee2e6;"></th>
                            </tr>
                            <tr style="border: 1px solid #dee2e6; ">
                                <th style="width:300px; padding:0.25rem; ">Espíritu de Trabajo</th>
                                <th style="width:100px; padding:0.25rem; text-align:center; border: 1px solid #dee2e6;"><?php echo $c2_parcial1; ?></th>
                                <th style="width:100px; padding:0.25rem; text-align:center; border: 1px solid #dee2e6;"></th>
                                <th style="width:100px; padding:0.25rem; text-align:center; border: 1px solid #dee2e6;"></th>
                                <th style="width:100px; padding:0.25rem; text-align:center; border: 1px solid #dee2e6;"></th>
                            </tr>
                            <tr style="border: 1px solid #dee2e6; ">
                                <th style="width:300px; padding:0.25rem; ">Orden y Presentación</th>
                                <th style="width:100px; padding:0.25rem; text-align:center; border: 1px solid #dee2e6;"><?php echo $c3_parcial1; ?></th>
                                <th style="width:100px; padding:0.25rem; text-align:center; border: 1px solid #dee2e6;"></th>
                                <th style="width:100px; padding:0.25rem; text-align:center; border: 1px solid #dee2e6;"></th>
                                <th style="width:100px; padding:0.25rem; text-align:center; border: 1px solid #dee2e6;"></th>
                            </tr>
                            <tr style="border: 1px solid #dee2e6; ">
                                <th style="width:300px; padding:0.25rem; ">Sociabilidad</th>
                                <th style="width:100px; padding:0.25rem; text-align:center; border: 1px solid #dee2e6;"><?php echo $c4_parcial1; ?></th>
                                <th style="width:100px; padding:0.25rem; text-align:center; border: 1px solid #dee2e6;"></th>
                                <th style="width:100px; padding:0.25rem; text-align:center; border: 1px solid #dee2e6;"></th>
                                <th style="width:100px; padding:0.25rem; text-align:center; border: 1px solid #dee2e6;"></th>
                            </tr>
                            <tr style="border: 1px solid #dee2e6; ">
                                <th style="width:300px; padding:0.25rem; ">Moralidad y Ética</th>
                                <th style="width:100px; padding:0.25rem; text-align:center; border: 1px solid #dee2e6;"><?php echo $c5_parcial1; ?></th>
                                <th style="width:100px; padding:0.25rem; text-align:center; border: 1px solid #dee2e6;"></th>
                                <th style="width:100px; padding:0.25rem; text-align:center; border: 1px solid #dee2e6;"></th>
                                <th style="width:100px; padding:0.25rem; text-align:center; border: 1px solid #dee2e6;"></th>
                            </tr>
                            <tr style="border: 1px solid #dee2e6; ">
                                <th style="width:300px; padding:0.25rem;">Actitud Cívica y Religiosa</th>
                                <th style="width:100px; padding:0.25rem; text-align:center; border: 1px solid #dee2e6;"><?php echo $c6_parcial1; ?></th>
                                <th style="width:100px; padding:0.25rem; text-align:center; border: 1px solid #dee2e6;"></th>
                                <th style="width:100px; padding:0.25rem; text-align:center; border: 1px solid #dee2e6;"></th>
                                <th style="width:100px; padding:0.25rem; text-align:center; border: 1px solid #dee2e6;"></th>
                            </tr>
                        </table>

                        <table   style="margin-top:10px; border: 1px solid #dee2e6;"  align="center" width="700"> 
                                <tr style="border: 1px solid #dee2e6; ">
                                        <th style="text-align:center; width:100px;border: 1px solid #dee2e6; "></th>
                                        <th style="text-align:center; width:150px;border: 1px solid #dee2e6;"></th>
                                        <th style="text-align:center; width:150px;border: 1px solid #dee2e6;"></th>
                                        <th style="text-align:center; width:150px;border: 1px solid #dee2e6;"></th>
                                        <th style="text-align:center; width:150px;border: 1px solid #dee2e6;"></th>
                                    </tr>
                            <tr style="border: 1px solid #dee2e6; ">
                                <td style="width:300px;border: 1px solid #dee2e6;">Número de Reportes</td>
                                <td style="text-align:center; width:100px;border: 1px solid #dee2e6;"><?php echo $personalidad[0]->reportes; ?></td>
                                <td style="text-align:center; width:100px;border: 1px solid #dee2e6;"></td>
                                <td style="text-align:center; width:100px;border: 1px solid #dee2e6;"></td>
                                <td style="text-align:center; width:100px;border: 1px solid #dee2e6;"></td>
                            </tr>
                        </table>
                        @if ($curso > 18)
                            <table  style="margin-top:20px; " border='0' align="center" width="700">

                                    {{-- <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    </tr> --}}
                                
                                    <tr>
                                    <td align="center">__________________________</td>
                                    </tr>
                                    <tr>
                                    <td align="center" style="font-family: Arial; font-size: 14px;"><strong>DIRECCIÓN</strong></td>
                                    </tr>
                            
                            </table>
                        @endif

                        @if ($curso > 15 and $curso < 19)
                            <div align="center"><table  style="margin-top:20px; " border='0' align="center" width="700">

                                    <tr><td>&nbsp;</td><td>&nbsp;</td> <td>&nbsp;</td></tr> 
                                
                                    <tr>
                                        <td align="center">__________________________</td>
                                    </tr>
                                    <tr>
                                        <td align="center" style="font-family: Arial; font-size: 14px;"><strong>DIRECCIÓN</strong></td>
                                    </tr>

                                    <tr><td>&nbsp;</td><td>&nbsp;</td> <td>&nbsp;</td></tr> 
                                    <tr><td>&nbsp;</td><td>&nbsp;</td> <td>&nbsp;</td></tr> 
                            
                            </table></div>
                        @endif

                        @if ($curso == 13)
                           <div align="center"> <table  style="margin-top:20px; " border='0' align="center" width="700">

                                    <tr><td>&nbsp;</td><td>&nbsp;</td> <td>&nbsp;</td></tr> 
                                
                                    <tr align="center">
                                        <td align="center">__________________________</td>
                                    </tr>
                                    <tr align="center">
                                        <td align="center" style="font-family: Arial; font-size: 14px;"><strong>DIRECCIÓN</strong></td>
                                    </tr>

                                    <tr><td>&nbsp;</td><td>&nbsp;</td> <td>&nbsp;</td></tr> 
                                    <tr><td>&nbsp;</td><td>&nbsp;</td> <td>&nbsp;</td></tr> 
                            
                                </table>
                            </div>
                        @endif

                        @if ($curso == 12)
                            <table  style="margin-top:20px; " border='0' align="center" width="700">

                                    <tr><td>&nbsp;</td><td>&nbsp;</td> <td>&nbsp;</td></tr> 
                                
                                    <tr>
                                        <td align="center">__________________________</td>
                                    </tr>
                                    <tr>
                                        <td align="center" style="font-family: Arial; font-size: 14px;"><strong>DIRECCIÓN</strong></td>
                                    </tr>

                                    <tr><td>&nbsp;</td><td>&nbsp;</td> <td>&nbsp;</td></tr> 
                                    <tr><td>&nbsp;</td><td>&nbsp;</td> <td>&nbsp;</td></tr>
                                    <tr><td>&nbsp;</td><td>&nbsp;</td> <td>&nbsp;</td></tr> 
                                    <tr><td>&nbsp;</td><td>&nbsp;</td> <td>&nbsp;</td></tr> 
                            
                            </table>
                        @endif

                        @if ($curso > 8 and $curso < 12)
                            <table  style="margin-top:20px; " border='0' align="center" width="700">

                                    <tr><td>&nbsp;</td><td>&nbsp;</td> <td>&nbsp;</td></tr> 
                                
                                    <tr align="center">
                                        <td align="center">__________________________</td>
                                    </tr>
                                    <tr align="center">
                                        <td align="center" style="font-family: Arial; font-size: 14px;"><strong>DIRECCIÓN</strong></td>
                                    </tr>

                                    <tr><td>&nbsp;</td><td>&nbsp;</td> <td>&nbsp;</td></tr> 
                                    <tr><td>&nbsp;</td><td>&nbsp;</td> <td>&nbsp;</td></tr>
                                    <tr><td>&nbsp;</td><td>&nbsp;</td> <td>&nbsp;</td></tr> 
                                    <tr><td>&nbsp;</td><td>&nbsp;</td> <td>&nbsp;</td></tr> 
                                    <tr><td>&nbsp;</td><td>&nbsp;</td> <td>&nbsp;</td></tr> 
                                    <tr><td>&nbsp;</td><td>&nbsp;</td> <td>&nbsp;</td></tr>
                                    <tr><td>&nbsp;</td><td>&nbsp;</td> <td>&nbsp;</td></tr> 
                                    <tr><td>&nbsp;</td><td>&nbsp;</td> <td>&nbsp;</td></tr> 
                            
                            </table>
                        @endif
                       
               @endforeach  {{-- fin del foreach de estudiante --}}

        </div><!--row-->

 <!--Main Layout-->
<br><br>
   


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

exit();
//==============================================================
//==============================================================
//==============================================================


?>
