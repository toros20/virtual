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
  <!-- Your custom styles (optional) css-->
  <!--<link href="{{ URL::asset('css/style.css')}}" rel="stylesheet">-->
 
  <!-- Start your project here-->
  <body class="hidden-sn mdb-skin">
  
    <!--Main Layout-->
   
      <div class="container-fluid" align="center">
        <!--row-->
        <div class="row" align="center"> 
               
            <table width="100%" style="tabla-striped; border: 1px solid #000; ">
              <tr><td align="center"><img width="50px" src="img/honduras.jpg" alt=""></td></tr>  
              <tr>
                  <td align="center"><strong style="font-family: Arial">REPÚBLICA DE HONDURAS<BR>
              SECRETARÍA DE EDUCACIÓN<BR>
              DIRECCIÓN DEPARTAMENTAL DE EDUCACIÓN DE FRANCISCO MORAZÁN<BR>
              </strong></td>
                </tr>
            </table>
              
            <table width="100%" style="tabla-striped;  border: 1px solid #000; ">

                    {{-- Codigo para cursos bilingues --}}
                   @if ($course->is_bilingue == 1)

                        <tr style="font-family: Arial">
                            <td width="25%" style="font-size: 12px"><strong>CODIGO: 080101680T03</strong></td>
                            <td colspan="2" style="font-size: 12px" align="center"><strong>ACTA FINAL</strong></td>
                            <td colspan="2" style="font-size: 12px" align="center"><strong>CÓDIGO DE PASO</strong></td>
                        </tr>
                        
                        <tr>
                            <td style="font-family: Arial;font-size: 12px"><strong>NOMBRE DEL CENTRO EDUCATIVO:</strong></td>
                            <td colspan="2" style="font-family: Arial;font-size: 12px"><strong>C.E.M.N.G.B SAN JOSÉ DEL CARMEN</strong></td>
                            <td width="34%" style="font-family: Arial;font-size: 12px"><strong>ORDINARIOS</strong></td>
                            <td width="3%" ><table width="100%" style="tabla-striped; text-align:center; border: 1px solid #000; ">
                            <tr>
                                <td><strong>X</strong></td>
                            </tr>
                            </table></td>
                       </tr>    
                   @endif
                    {{-- FIN de Codigo para cursos bilingues --}}

                     {{-- Codigo para cursos NO bilingues --}}
                   @if ($course->is_bilingue == 0)

                        <tr style="font-family: Arial">
                                <td width="25%" style="font-size: 12px"><strong>CODIGO: 080100255M02</strong></td>
                                <td colspan="2" style="font-size: 12px" align="center"><strong>ACTA FINAL</strong></td>
                                <td colspan="2" style="font-size: 12px" align="center"><strong>CÓDIGO DE PASO</strong></td>
                            </tr>
                            
                            <tr>
                                <td style="font-family: Arial;font-size: 12px"><strong>NOMBRE DEL CENTRO EDUCATIVO:</strong></td>
                                <td colspan="2" style="font-family: Arial;font-size: 12px"><strong>C.E.M.N.G SAN JOSÉ DEL CARMEN</strong></td>
                                <td width="34%" style="font-family: Arial;font-size: 12px"><strong>ORDINARIOS</strong></td>
                                <td width="3%" ><table width="100%" style="tabla-striped; text-align:center; border: 1px solid #000; ">
                                <tr>
                                    <td><strong>X</strong></td>
                                </tr>
                                </table></td>
                        </tr>    
                       
                   @endif
                    {{-- FIN de Codigo para cursos bilingues --}}
                
                <tr>
                  <td style="font-family: Arial;font-size: 12px"><strong>CURSO: {{$course->name}}</strong></td>
                  <td width="13%" style="font-family: Arial;font-size: 12px">&nbsp;</td>
                  <td width="25%" style="font-family: Arial;font-size: 12px">&nbsp;</td>
                  <td style="font-family: Arial;font-size: 12px"><strong>RECUPERACIÓN</strong></td>
                  <td><table width="100%" style="tabla-striped; text-align:center; border: 1px solid #000; ">
                    <tr>
                      <td><strong>X</strong></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td style="font-family: Arial;font-size: 12px"><strong>SECCIÓN: {{$section}}</strong></td>
                  <td colspan="2" style="font-family: Arial;font-size: 12px"><strong>AÑO: 2019<?php //echo date('Y'); ?></strong></td>
                  <td style="font-family: Arial;font-size: 12px"><strong>RETRASADA</strong></td>
                  <td><table width="100%" style="tabla-striped; border: 1px solid #000; ">
                    <tr>
                      <td>.</td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  @if ($course->is_semestral == 1)
                    <td style="font-family: Arial;font-size: 12px"><strong>ACTA DEL SEGUNDO SEMESTRE</strong></td>
                  @else
                    <td style="font-family: Arial;font-size: 12px"><strong>ACTA FINAL </strong></td>
                  @endif
                 
                  <td colspan="2" style="font-family: Arial;font-size: 12px"><strong>JORNADA: DOBLE</strong></td>
                  <td style="font-family: Arial;font-size: 12px"><strong>EQUIVALENCIA</strong></td>
                  <td><table width="100%" style="tabla-striped; border: 1px solid #000; ">
                    <tr>
                      <td>.</td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td colspan="3" style="font-family: Arial;font-size: 12px"><strong>LUGAR Y FECHA:Tegucigalpa <?php ECHO "Noviembre 2019"  //echo $arrayDias[date('w')]." ".date('d')."/".$arrayMeses[date('m')-1]."/".date('Y'); ?></strong></td>
                  <td style="font-family: Arial;font-size: 12px"><strong>PREMISO ESPECIAL</strong></td>
                  <td><table width="100%" style="tabla-striped; border: 1px solid #000; ">
                    <tr>
                      <td>.</td>
                    </tr>
                  </table></td>
                </tr>
               
            </table>
            {{-- INICIO PARA CURSOS SEMESTRALES --}}
            @if ($course->is_semestral == 1)

                <table width="100%" style="tabla-striped;  border: 1px solid #000;">
                  <thead>
                      <?php $historial = 'historial_'.$curso.'_'.$seccion; ?>
                  
                      <?php $cont=0; $cont_clase=1;$total1=0; $total2=0; $total3=0; $total4=0; ?>

                          <tr style="border: 1px solid #000; ">
                          <th style="border: 1px solid #000;">No.</th>
                          <th  style="border: 1px solid #000; font-size:14 px;font-weight: bold;">Nombre de Estudiante</th>
                          
                          @foreach ($clases as $clase)
                              <th valign="bottom" style="text-rotate: 90; text-align:center; font-weight: bold; border: 1px solid #000;">@php echo $cont_clase;  @endphp .{{$clase->short_name}}</th>
                              <th valign="bottom" style="text-rotate: 90; text-align:center;  border: 1px solid #000;">RECUPERACION</th>
                              @php  $cont_clase+=1;   @endphp
                          @endforeach

                          <th style="text-align:center; width:50px;font-weight: bold; border: 1px solid #000;">Promedio</th>
                      </tr>

                  </thead>

                      @foreach ($estudiantes as $estudiante)
                      @php
                          $promedio=0;
                      @endphp
                      <tr>
                          <td style="font-size:14px; width:20px; border: 1px solid #000; text-align:left;"><?php echo $cont+1; ?></td>
                          <td style="font-size:14px; border: 1px solid #000; text-align:left;"><p> {{$estudiante->name}} {{$estudiante->lastname}}</p></td>
                        
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

                                              $total1=($resultado[0]->Acum3) + ($resultado[0]->Exa3);
                                              $total2=($resultado[0]->Acum4) + ($resultado[0]->Exa4);
                                              $total = ($total1 + $total2)/2;
                                              //se redondea el promedio de clase
                                              $total = round($total);

                                              //se suman todos los promedios para obtener el promedio global
                                              $promedio += $total;

                                              $recuperacion =$resultado[0]->Recu1;
                              
                                              /*$total2=($resultado[0]->Acum2) + ($resultado[0]->Exa2);
                                              $total3=($resultado[0]->Acum3) + ($resultado[0]->Exa3);
                                              $total4=($resultado[0]->Acum4) + ($resultado[0]->Exa4);
                                              mañana miercoles se suspenden las clases
                                              debido a la perdida de la Madre Natividd
                                              Quien partio con el señor este día martes 18 de Junio
                                              */
                                  
                              ?>
                              @if ( $total < 70)
                                  <td style="font-size:14px ;text-align:center; width:30px; border: 1px solid #000; color:red"><?php echo $total ?> </td>
                              @else 
                                  <td style="font-size:14px ;text-align:center; width:30px; border: 1px solid #000;"><?php echo $total ?> </td>
                              @endif

                              @if ( $recuperacion < 70 and $recuperacion  > 0)
                              <td style="font-size:14px ;text-align:center; width:30px; border: 1px solid #000; color:red"><?php echo $recuperacion ?> </td>
                              @endif

                              @if ($recuperacion > 69)
                              <td style="font-size:14px ;text-align:center; width:30px; border: 1px solid #000;"><?php echo $recuperacion ?> </td>                                
                              @endif

                              @if ($recuperacion ==0)
                              <td style="font-size:14px ;text-align:center; width:30px; border: 1px solid #000;"></td>                                
                              @endif
                                  
                          @endforeach {{--fin del ciclo para cada clase --}}
                          
                          @php
                                $promedio_final =  ($promedio /  ($cont_clase-1) );
                                $promedio_final =  round($promedio_final);
                          @endphp

                          @if ( $promedio_final < 70)
                              <td style="font-size:14px ;text-align:center; width:50px; border: 1px solid #000; color:red"><?php echo $promedio_final ?> </td>
                          @else 
                              <td style="font-size:14px ;text-align:center; width:50px; border: 1px solid #000;"><?php echo $promedio_final ?> </td>
                          @endif
                          
                      </tr>
                          <?php $cont+=1;?>
                      @endforeach {{--fin del ciclo para cada estudiante --}}

                       {{-- CALCULAR EL NUMERO DE PROBACIONES POR CLASE --}}
                         {{-- USAR EL CODIGO DEL ARCHIVO actas_con_num_reprobados --}}
                       {{-- FIN DE CALCULAR EL NUMERO DE PROBACIONES POR CLASE --}}

               </table>

            @endif
             {{-- FIN PARA CURSOS SEMESTRALES --}}

             {{-- INICIO PARA CURSOS NO SEMESTRALES --}}
            @if ($course->is_semestral == 0)
                
                <table width="100%" style="tabla-striped;  border: 1px solid #dee2e6;">
                  <thead>
                      <?php $historial = 'historial_'.$curso.'_'.$seccion; ?>
                  
                      <?php $cont=0; $cont_clase=1;$total1=0; $total2=0; $total3=0; $total4=0; ?>

                          <tr style="border: 1px solid #dee2e6; ">
                          <th style="border: 1px solid #dee2e6;">No.</th>
                          <th style="border: 1px solid #dee2e6; font-size:14 px;font-weight: bold;">Nombre de Estudiante</th>
                          
                          @foreach ($clases as $clase)
                              <th valign="bottom" style="text-rotate: 90; text-align:center; font-weight: bold; border: 1px solid #dee2e6;">@php echo $cont_clase;  @endphp .{{$clase->short_name}}</th>
                              <th valign="bottom" style="text-rotate: 90; text-align:center;  border: 1px solid #dee2e6;">Recuperación</th>
                              @php  $cont_clase+=1;   @endphp
                          @endforeach

                          <th valign="bottom" style="text-rotate: 90; text-align:center; font-weight: bold; border: 1px solid #dee2e6;">Observación</th>
                      </tr>

                  </thead>

                      @foreach ($estudiantes as $estudiante)
                      @php
                          $promedio=0; $clase_reprobada=0;
                      @endphp
                      <tr>
                          <td style="font-size:14px; width:20px; border: 1px solid #dee2e6; text-align:left;"><?php echo $cont+1; ?></td>
                          <td style="font-size:14px; border: 1px solid #dee2e6; text-align:left;"><p> {{$estudiante->name}} {{$estudiante->lastname}}</p></td>
                        
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
                                              $total2=($resultado[0]->Acum2) + ($resultado[0]->Exa2);
                                              $total3=($resultado[0]->Acum3) + ($resultado[0]->Exa3);
                                              $total4=($resultado[0]->Acum4) + ($resultado[0]->Exa4);

                                              $total = round(($total1+$total2+$total3+$total4)/4);

                                              $recuperacion = $resultado[0]->Recu1;
                                  
                              ?>
                              @if ( $total < 70)
                                  <td style="font-size:14px ;text-align:center; width:30px; border: 1px solid #dee2e6; color:red"><?php echo $total ?> </td>
                              @else 
                                  <td style="font-size:14px ;text-align:center; width:30px; border: 1px solid #dee2e6;"><?php echo $total ?> </td>
                              @endif

                              @if ( $recuperacion < 70 and $recuperacion  > 0)
                              <td style="font-size:14px ;text-align:center; width:30px; border: 1px solid #dee2e6; color:red"><?php echo $recuperacion ?> </td>
                              @endif

                              @if ($recuperacion > 69)
                              <td style="font-size:14px ;text-align:center; width:30px; border: 1px solid #dee2e6;"><?php echo $recuperacion ?> </td>                                
                              @endif

                              @if ($recuperacion ==0)
                              <td style="font-size:14px ;text-align:center; width:30px; border: 1px solid #dee2e6;"></td>                                
                              @endif
                                  
                          @endforeach {{--fin del ciclo para cada clase --}}
                                
                           <td style="font-size:1.25rem ;text-align:center; width:50px;font-weight: bold; border: 1px solid #dee2e6; color:red"></td> 
                          
                      </tr>
                          <?php $cont+=1;?>
                      @endforeach {{--fin del ciclo para cada estudiante --}}
                      

                </table>

              
            @endif

            @if ( $course->id == 14)
              <table width="90%" border="0" align="center">
                <tr>
                  <td align="center">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td align="center">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td align="center">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td width="2%" align="center" style="font-size: 15px">1.</td>
                  <td width="25%" align="center" style="font-size: 15px">________________________________________________</td>
                  <td width="3%" align="center" style="font-size: 15px">2.</td>
                  <td width="25%" align="center" style="font-size: 15px">________________________________________________</td>
                  <td width="2%" align="center" style="font-size: 15px">3.</td>
                  <td width="25%" align="center" style="font-size: 15px">________________________________________________</td>
                  <td width="2%" align="center" style="font-size: 15px">4.</td>
                  <td width="25%" align="center" style="font-size: 15px">________________________________________________</td>
                </tr>
              
                <tr>
                  <td align="center" style="font-size: 15px">&nbsp;</td>
                  <td align="center" style="font-size: 15px">&nbsp;</td>
                  <td align="center" style="font-size: 15px">&nbsp;</td>
                  <td align="center" style="font-size: 15px">&nbsp;</td>
                  <td align="center" style="font-size: 15px">&nbsp;</td>
                  <td align="center" style="font-size: 15px">&nbsp;</td>
                </tr>
                
                <tr>
                    <td width="2%" align="center" style="font-size: 15px">5.</td>
                    <td width="25%" align="center" style="font-size: 15px">________________________________________________</td>
                    <td width="3%" align="center" style="font-size: 15px">6.</td>
                    <td width="25%" align="center" style="font-size: 15px">________________________________________________</td>
                    <td width="2%" align="center" style="font-size: 15px">7.</td>
                    <td width="25%" align="center" style="font-size: 15px">________________________________________________</td>
                    <td width="2%" align="center" style="font-size: 15px">8.</td>
                    <td width="25%" align="center" style="font-size: 15px">________________________________________________</td>
                </tr>
                    
                <tr>
                    <td align="center" style="font-size: 15px">&nbsp;</td>
                    <td align="center" style="font-size: 15px">&nbsp;</td>
                    <td align="center" style="font-size: 15px">&nbsp;</td>
                    <td align="center" style="font-size: 15px">&nbsp;</td>
                    <td align="center" style="font-size: 15px">&nbsp;</td>
                    <td align="center" style="font-size: 15px">&nbsp;</td>
                </tr>

                <tr>
                    <td width="2%" align="center" style="font-size: 15px">9.</td>
                    <td width="25%" align="center" style="font-size: 15px">________________________________________________</td>
                    <td width="3%" align="center" style="font-size: 15px">10.</td>
                    <td width="25%" align="center" style="font-size: 15px">________________________________________________</td>
                    <td width="2%" align="center" style="font-size: 15px"></td>
                    <td width="25%" align="center" style="font-size: 15px"></td>
                    <td width="2%" align="center" style="font-size: 15px"></td>
                    <td width="25%" align="center" style="font-size: 15px"></td>
                </tr>
                    
                <tr>
                    <td align="center" style="font-size: 15px">&nbsp;</td>
                    <td align="center" style="font-size: 15px">&nbsp;</td>
                    <td align="center" style="font-size: 15px">&nbsp;</td>
                    <td align="center" style="font-size: 15px">&nbsp;</td>
                    <td align="center" style="font-size: 15px">&nbsp;</td>
                    <td align="center" style="font-size: 15px">&nbsp;</td>
                </tr>

                <tr>
                    <td align="center" style="font-size: 15px">&nbsp;</td>
                    <td align="center" style="font-size: 15px">&nbsp;</td>
                    <td align="center" style="font-size: 15px">&nbsp;</td>
                    <td align="center" style="font-size: 15px">&nbsp;</td>
                    <td align="center" style="font-size: 15px">&nbsp;</td>
                    <td align="center" style="font-size: 15px">&nbsp;</td>
                </tr>

                <tr>
                    <td align="center" style="font-size: 15px">&nbsp;</td>
                    <td align="center" style="font-size: 15px"><strong>________________________________________________</strong></td>
                    <td align="center" style="font-size: 15px">&nbsp;</td>
                    <td align="center" style="font-size: 15px"><strong>________________________________________________</strong></td>
                    <td align="center" style="font-size: 15px">&nbsp;</td>
                    <td align="center" style="font-size: 15px"><strong>________________________________________________</strong></td>
                </tr>

                <tr>
                  <td align="center" style="font-size: 15px">&nbsp;</td>
                  <td align="center" style="font-size: 15px"><strong>Director(a)</strong></td>
                  <td align="center" style="font-size: 15px">&nbsp;</td>
                  <td align="center" style="font-size: 15px"><strong>Distrito Educativo #6</strong></td>
                  <td align="center" style="font-size: 15px">&nbsp;</td>
                  <td align="center" style="font-size: 15px"><strong>Secretario(a)</strong></td>
                </tr>
              
              </table>
            @endif
            {{-- FIN PARA CURSOS SEMESTRALES --}}
                  @if ( $course->id == 15)
                      <table width="90%" border="0" align="center">
                          <tr>
                            <td align="center">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td width="2%" align="center" style="font-size: 15px">1.</td>
                            <td width="25%" align="center" style="font-size: 15px">________________________________________________</td>
                            <td width="3%" align="center" style="font-size: 15px">2.</td>
                            <td width="25%" align="center" style="font-size: 15px">________________________________________________</td>
                            <td width="2%" align="center" style="font-size: 15px">3.</td>
                            <td width="25%" align="center" style="font-size: 15px">________________________________________________</td>
                          </tr>
                        
                          <tr>
                            <td align="center" style="font-size: 15px">&nbsp;</td>
                            <td align="center" style="font-size: 15px">&nbsp;</td>
                            <td align="center" style="font-size: 15px">&nbsp;</td>
                            <td align="center" style="font-size: 15px">&nbsp;</td>
                            <td align="center" style="font-size: 15px">&nbsp;</td>
                            <td align="center" style="font-size: 15px">&nbsp;</td>
                          </tr>
                          
                          <tr>
                              <td width="2%" align="center" style="font-size: 15px">4.</td>
                              <td width="25%" align="center" style="font-size: 15px">________________________________________________</td>
                              <td width="3%" align="center" style="font-size: 15px">5.</td>
                              <td width="25%" align="center" style="font-size: 15px">________________________________________________</td>
                              <td width="2%" align="center" style="font-size: 15px">6.</td>
                              <td width="25%" align="center" style="font-size: 15px">________________________________________________</td>
                          </tr>
                              
                        
                          <tr>
                              <td align="center" style="font-size: 15px">&nbsp;</td>
                              <td align="center" style="font-size: 15px">&nbsp;</td>
                              <td align="center" style="font-size: 15px">&nbsp;</td>
                              <td align="center" style="font-size: 15px">&nbsp;</td>
                              <td align="center" style="font-size: 15px">&nbsp;</td>
                              <td align="center" style="font-size: 15px">&nbsp;</td>
                          </tr>

                          <tr>
                              <td align="center" style="font-size: 15px">&nbsp;</td>
                              <td align="center" style="font-size: 15px">&nbsp;</td>
                              <td align="center" style="font-size: 15px">&nbsp;</td>
                              <td align="center" style="font-size: 15px">&nbsp;</td>
                              <td align="center" style="font-size: 15px">&nbsp;</td>
                              <td align="center" style="font-size: 15px">&nbsp;</td>
                          </tr>

                          <tr>
                              <td align="center" style="font-size: 15px">&nbsp;</td>
                              <td align="center" style="font-size: 15px"><strong>________________________________________________</strong></td>
                              <td align="center" style="font-size: 15px">&nbsp;</td>
                              <td align="center" style="font-size: 15px"><strong>________________________________________________</strong></td>
                              <td align="center" style="font-size: 15px">&nbsp;</td>
                              <td align="center" style="font-size: 15px"><strong>________________________________________________</strong></td>
                          </tr>

                          <tr>
                            <td align="center" style="font-size: 15px">&nbsp;</td>
                            <td align="center" style="font-size: 15px"><strong>Director(a)</strong></td>
                            <td align="center" style="font-size: 15px">&nbsp;</td>
                            <td align="center" style="font-size: 15px"><strong>Distrito Educativo #6</strong></td>
                            <td align="center" style="font-size: 15px">&nbsp;</td>
                            <td align="center" style="font-size: 15px"><strong>Secretario(a)</strong></td>
                          </tr>
                        
                      </table>
                  @else
                    <table width="90%" border="0" align="center">
                        <tr>
                          <td align="center">&nbsp;</td>
                          <td>&nbsp;</td>
                          <td align="center">&nbsp;</td>
                          <td>&nbsp;</td>
                          <td align="center">&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td width="2%" align="center" style="font-size: 15px">1.</td>
                          <td width="25%" align="center" style="font-size: 15px">________________________________________________</td>
                          <td width="3%" align="center" style="font-size: 15px">2.</td>
                          <td width="25%" align="center" style="font-size: 15px">________________________________________________</td>
                          <td width="2%" align="center" style="font-size: 15px">3.</td>
                          <td width="25%" align="center" style="font-size: 15px">________________________________________________</td>
                          <td width="2%" align="center" style="font-size: 15px">4.</td>
                          <td width="25%" align="center" style="font-size: 15px">________________________________________________</td>
                        </tr>
                       
                        <tr>
                          <td align="center" style="font-size: 15px">&nbsp;</td>
                          <td align="center" style="font-size: 15px">&nbsp;</td>
                          <td align="center" style="font-size: 15px">&nbsp;</td>
                          <td align="center" style="font-size: 15px">&nbsp;</td>
                          <td align="center" style="font-size: 15px">&nbsp;</td>
                          <td align="center" style="font-size: 15px">&nbsp;</td>
                        </tr>
                        
                        <tr>
                            <td width="2%" align="center" style="font-size: 15px">5.</td>
                            <td width="25%" align="center" style="font-size: 15px">________________________________________________</td>
                            <td width="3%" align="center" style="font-size: 15px">6.</td>
                            <td width="25%" align="center" style="font-size: 15px">________________________________________________</td>
                            <td width="2%" align="center" style="font-size: 15px">7.</td>
                            <td width="25%" align="center" style="font-size: 15px">________________________________________________</td>
                            <td width="2%" align="center" style="font-size: 15px">8.</td>
                            <td width="25%" align="center" style="font-size: 15px">________________________________________________</td>
                        </tr>
                            
                        <tr>
                            <td align="center" style="font-size: 15px">&nbsp;</td>
                            <td align="center" style="font-size: 15px">&nbsp;</td>
                            <td align="center" style="font-size: 15px">&nbsp;</td>
                            <td align="center" style="font-size: 15px">&nbsp;</td>
                            <td align="center" style="font-size: 15px">&nbsp;</td>
                            <td align="center" style="font-size: 15px">&nbsp;</td>
                        </tr>

                        <tr>
                            <td width="2%" align="center" style="font-size: 15px">9.</td>
                            <td width="25%" align="center" style="font-size: 15px">________________________________________________</td>
                            <td width="3%" align="center" style="font-size: 15px">10.</td>
                            <td width="25%" align="center" style="font-size: 15px">________________________________________________</td>
                            <td width="2%" align="center" style="font-size: 15px">11.</td>
                            <td width="25%" align="center" style="font-size: 15px">________________________________________________</td>
                            <td width="2%" align="center" style="font-size: 15px">12.</td>
                            <td width="25%" align="center" style="font-size: 15px">________________________________________________</td>
                        </tr>
                            
                        <tr>
                            <td align="center" style="font-size: 15px">&nbsp;</td>
                            <td align="center" style="font-size: 15px">&nbsp;</td>
                            <td align="center" style="font-size: 15px">&nbsp;</td>
                            <td align="center" style="font-size: 15px">&nbsp;</td>
                            <td align="center" style="font-size: 15px">&nbsp;</td>
                            <td align="center" style="font-size: 15px">&nbsp;</td>
                        </tr>

                        <tr>
                            <td width="2%" align="center" style="font-size: 15px">13.</td>
                            <td width="25%" align="center" style="font-size: 15px">________________________________________________</td>
                            <td width="3%" align="center" style="font-size: 15px">14.</td>
                            <td width="25%" align="center" style="font-size: 15px">________________________________________________</td>
                            <td width="2%" align="center" style="font-size: 15px">15.</td>
                            <td width="25%" align="center" style="font-size: 15px">________________________________________________</td>
                            <td width="2%" align="center" style="font-size: 15px">16.</td>
                            <td width="25%" align="center" style="font-size: 15px">________________________________________________</td>
                        </tr>
                            
                        <tr>
                            <td align="center" style="font-size: 15px">&nbsp;</td>
                            <td align="center" style="font-size: 15px">&nbsp;</td>
                            <td align="center" style="font-size: 15px">&nbsp;</td>
                            <td align="center" style="font-size: 15px">&nbsp;</td>
                            <td align="center" style="font-size: 15px">&nbsp;</td>
                            <td align="center" style="font-size: 15px">&nbsp;</td>
                        </tr>

                        <tr>
                            <td align="center" style="font-size: 15px">&nbsp;</td>
                            <td align="center" style="font-size: 15px"><strong>________________________________________________</strong></td>
                            <td align="center" style="font-size: 15px">&nbsp;</td>
                            <td align="center" style="font-size: 15px"><strong></strong></td>
                            <td align="center" style="font-size: 15px">&nbsp;</td>
                            <td align="center" style="font-size: 15px"><strong>________________________________________________</strong></td>
                        </tr>

                        <tr>
                          <td align="center" style="font-size: 15px">&nbsp;</td>
                          <td align="center" style="font-size: 15px"><strong>Director(a)</strong></td>
                          <td align="center" style="font-size: 15px">&nbsp;</td>
                          <td align="center" style="font-size: 15px"><strong></strong></td>
                          <td align="center" style="font-size: 15px">&nbsp;</td>
                          <td align="center" style="font-size: 15px"><strong>Secretario(a)</strong></td>
                        </tr>
                      
                    </table>
                  @endif
        </div><!--row-->

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
    'format' => 'Legal',
    'orientation' => 'L'
]); 

$mpdf->allow_charset_conversion= true;

$mpdf->charset_in='UTF-8';

$mpdf->SetDisplayMode('fullpage');

$mpdf->list_indent_first_level = 0; // 1 or 0 - whether to indent the first level of a list

$mpdf->WriteHTML($html);

$mpdf->Output('Acta Final I Semestre '. utf8_encode($course->name) . "-". $section.'.pdf','I');

exit(); 
//==============================================================
//==============================================================
//==============================================================

?>
