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

          @if ($course->is_semestral == 0 )
          <table width="100%">
              <tr>
                 <td align="center"><strong style="font-family: Arial">REPUBLICA DE HONDURAS<BR>
                 SECRETARIA DE EDUCACIÓN<BR>
                 DIRECCIÓN DEPARTAMENTAL DE EDUCACIÓN DE FRANCISCO MORAZÁN<BR>
                 CUADRO N° 1</strong></td>
               </tr>
                 </table>
             
                 <table width="100%" border="0">
               <tr>
                 <td colspan="2" style="font-family: Arial"><strong>INSTITUTO:SAN JOSÉ DEL CARMEN</strong></td>
                 <td colspan="3" style="font-family: Arial"><strong>DEPARTAMENTO:FRANCISCO MORAZÁN</strong></td>
               </tr>
               <tr>
                 <td colspan="2" style="font-family: Arial"><strong>MUNICIPIO:DISTRITO CENTRAL</strong></td>
               <td colspan="3" style="font-family: Arial"><strong>LUGAR: LA CAMPAÑA     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;ASIGNATURA:{{$estudiantes[0]->clase}}</strong></td>
             
               </tr>
               <tr>
                 <td colspan="5" style="font-family: Arial"><strong>NOMBRE DEL PROFESOR:</strong></td>
               </tr>
               <tr>
                 <td width="25%" style="font-family: Arial"><strong>CURSO:{{$course->name}}</strong></td>
                 <td width="9%" style="font-family: Arial"><strong>SECCIÓN:{{$section}}</strong></td>
                 <td width="29%" style="font-family: Arial"><strong>MODALIDAD: SECUNDARIA</strong></td>
                 <td width="18%" style="font-family: Arial"><strong>JORNADA: DOBLE</strong></td>
                 <td width="19%" style="font-family: Arial"><strong>AÑO:2019</strong></td>
               </tr>
              </table>
              
              <table width="100%" border="1" style="border-collapse: collapse; font-family: Arial;">
              <thead>
               <tr>
                 <td text-rotate="180" rowspan="2" align="center" valign="middle" style="font-size:14px;" >N°de Orden</td>
                 <td rowspan="2" align="center" valign="middle" style="font-size:14px;">Nombre del Alumno</td>
                 <td colspan="3" align="center" bgcolor="#CCCCCC" style="font-size:14px;">1er Parcial</td>
                 <td colspan="3" align="center" bgcolor="#CCCCCC" style="font-size:14px;">2do Parcial</td>
                 <td colspan="3" align="center" bgcolor="#CCCCCC" style="font-size:14px;">3er Parcial</td>
                 <td colspan="3" align="center" bgcolor="#CCCCCC" style="font-size:14px;">4to Parcial</td>
                 <td rowspan="2" align="center" valign="bottom" text-rotate="180" style="font-size:14px;">Nota de Promoción</td>
                 <td rowspan="2" align="center" valign="bottom" text-rotate="180" style="font-size:14px;">1ra Recuperación</td>
                 {{-- <td rowspan="2" align="center" valign="bottom" text-rotate="180" style="font-size:14px;">2da Recupreación</td> --}}
                 <td align="center" rowspan="2" style="font-size:14px;">Observaciones</td>
               </tr>
               <tr text-rotate="180">
                 
                 <td valign="bottom" align="center" style="font-size:14px;"> Acumulativo</td>
                 <td valign="bottom" align="center" style="font-size:14px;"> Examen</td>
                 <td valign="bottom" align="center" style="font-size:14px; background-color: #ccc"><strong>Total</strong></td>
                 {{-- <td valign="bottom" align="center" style="font-size:14px;"></td> --}}

                 <td valign="bottom" align="center" style="font-size:14px;"> Acumulativo</td>
                 <td valign="bottom" align="center" style="font-size:14px;"> Examen</td>
                 <td valign="bottom" align="center" style="font-size:14px;  background-color: #ccc"><strong>Total</strong></td>
                
                 <td valign="bottom" align="center" style="font-size:14px;"> Acumulativo</td>
                 <td valign="bottom" align="center" style="font-size:14px;"> Examen</td>
                 <td valign="bottom" align="center" style="font-size:14px;  background-color: #ccc"><strong>Total</strong></td>
                 
                 <td valign="bottom" align="center" style="font-size:14px;"> Acumulativo</td>
                 <td valign="bottom" align="center" style="font-size:14px;"> Examen</td>
                 <td valign="bottom" align="center" style="font-size:14px;  background-color: #ccc"><strong>Total</strong></td>
               
                 
               </tr>
              </thead>

               @php     $cont=0;      @endphp
               @foreach ($estudiantes as $estudiante)

                  <tr>
                      <td style="font-size:14px; width:20px; border: 1px solid #dee2e6; text-align:left;"><?php echo $cont+1; ?></td>
                      <td style="font-size:14px; width:100px; border: 1px solid #dee2e6; text-align:left;"><p> {{$estudiante->name}} {{$estudiante->lastname}}</p></td>
                      
                      <td style="font-size:14px; width:40px; border: 1px solid #dee2e6; text-align:center;">{{$estudiante->Acum1}}</td>
                      <td style="font-size:14px; width:40px; border: 1px solid #dee2e6; text-align:center;">{{$estudiante->Exa1}}</td>
                      @if (($estudiante->Acum1 + $estudiante->Exa1) < 70)
                          <td style="font-size:14px; width:40px; border: 1px solid #dee2e6; text-align:center; color:red; background-color: #ccc">{{$estudiante->Acum1 + $estudiante->Exa1}}</td>
                      @else
                          <td style="font-size:14px; width:40px; border: 1px solid #dee2e6; text-align:center; background-color: #ccc">{{$estudiante->Acum1 + $estudiante->Exa1}}</td>
                      @endif
                     
                    
                      <td style="font-size:14px; width:40px; border: 1px solid #dee2e6; text-align:center;">{{$estudiante->Acum2}}</td>
                      <td style="font-size:14px; width:40px; border: 1px solid #dee2e6; text-align:center;">{{$estudiante->Exa2}}</td>
                      @if (($estudiante->Acum2 + $estudiante->Exa2) < 70)
                          <td style="font-size:14px; width:40px; border: 1px solid #dee2e6; text-align:center; color:red; background-color: #ccc">{{$estudiante->Acum2 + $estudiante->Exa2}}</td>
                      @else
                          <td style="font-size:14px; width:40px; border: 1px solid #dee2e6; text-align:center; background-color: #ccc">{{$estudiante->Acum2 + $estudiante->Exa2}}</td>
                      @endif

                      <td style="font-size:14px; width:40px; border: 1px solid #dee2e6; text-align:center;">{{$estudiante->Acum3}}</td>
                      <td style="font-size:14px; width:40px; border: 1px solid #dee2e6; text-align:center;">{{$estudiante->Exa3}}</td>
                      @if (($estudiante->Acum3 + $estudiante->Exa3) < 70)
                          <td style="font-size:14px; width:40px; border: 1px solid #dee2e6; text-align:center; color:red; background-color: #ccc">{{$estudiante->Acum3 + $estudiante->Exa3}}</td>
                      @else
                          <td style="font-size:14px; width:40px; border: 1px solid #dee2e6; text-align:center; background-color: #ccc">{{$estudiante->Acum3 + $estudiante->Exa3}}</td>
                      @endif

                      <td style="font-size:14px; width:40px; border: 1px solid #dee2e6; text-align:center;">{{$estudiante->Acum4}}</td>
                      <td style="font-size:14px; width:40px; border: 1px solid #dee2e6; text-align:center;">{{$estudiante->Exa4}}</td>
                      @if (($estudiante->Acum4 + $estudiante->Exa4) < 70)
                          <td style="font-size:14px; width:40px; border: 1px solid #dee2e6; text-align:center; color:red; background-color: #ccc">{{$estudiante->Acum4 + $estudiante->Exa4}}</td>
                      @else
                          <td style="font-size:14px; width:40px; border: 1px solid #dee2e6; text-align:center; background-color: #ccc">{{$estudiante->Acum4 + $estudiante->Exa4}}</td>
                      @endif
                     


                      @if ((round(($estudiante->Acum1 + $estudiante->Exa1 + $estudiante->Acum2 + $estudiante->Exa2 +$estudiante->Acum3 + $estudiante->Exa3 + $estudiante->Acum4 + $estudiante->Exa4)/4)) < 70)
                          <td style="font-size:14px; width:40px; border: 1px solid #dee2e6; text-align:center; color:red">{{round(($estudiante->Acum1 + $estudiante->Exa1 + $estudiante->Acum2 + $estudiante->Exa2 +$estudiante->Acum3 + $estudiante->Exa3 + $estudiante->Acum4 + $estudiante->Exa4)/4)}}</td>
                      @else
                          <td style="font-size:14px; width:40px; border: 1px solid #dee2e6; text-align:center;">{{round(($estudiante->Acum1 + $estudiante->Exa1 + $estudiante->Acum2 + $estudiante->Exa2 +$estudiante->Acum3 + $estudiante->Exa3 + $estudiante->Acum4 + $estudiante->Exa4)/4)}}</td>
                      @endif
                   
                      @if (($estudiante->Recu1)<70 and ($estudiante->Recu1)>0)
                           <td style="font-size:14px; width:40px; border: 1px solid #dee2e6; text-align:center;color:red">{{$estudiante->Recu1}}</td>
                      @endif
                      @if (($estudiante->Recu1)>=70)
                          <td style="font-size:14px; width:40px; border: 1px solid #dee2e6; text-align:center;">{{$estudiante->Recu1}}</td>
                      @endif
                      @if (($estudiante->Recu1)==0)
                      <td style="font-size:14px; width:40px; border: 1px solid #dee2e6; text-align:center;"></td>
                      @endif
                      
                      {{-- <td style="font-size:14px; width:40px; border: 1px solid #dee2e6; text-align:center;"></td> --}}
                      <td style="font-size:14px; width:100px; border: 1px solid #dee2e6; text-align:center;"></td>
                      
                  </tr> 
                  @php     $cont+=1;      @endphp
               @endforeach
          </table>
          @endif

          @if ($course->is_semestral == 1 )
            <table width="100%">
                <tr>
                  <td align="center"><strong style="font-family: Arial">REPUBLICA DE HONDURAS<BR>
                  SECRETARIA DE EDUCACIÓN<BR>
                  DIRECCIÓN DEPARTAMENTAL DE EDUCACIÓN DE FRANCISCO MORAZÁN<BR>
                  CUADRO N° 1</strong></td>
                </tr>
                  </table>
              
                  <table width="100%" border="0">
                <tr>
                  <td colspan="2" style="font-family: Arial"><strong>INSTITUTO:SAN JOSÉ DEL CARMEN</strong></td>
                  <td colspan="3" style="font-family: Arial"><strong>DEPARTAMENTO:FRANCISCO MORAZÁN</strong></td>
                </tr>
                <tr>
                  <td colspan="2" style="font-family: Arial"><strong>MUNICIPIO:DISTRITO CENTRAL</strong></td>
                <td colspan="3" style="font-family: Arial"><strong>LUGAR: LA CAMPAÑA     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; II SEMESTRE     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ASIGNATURA:{{$estudiantes[0]->clase}}</strong></td>
              
                </tr>
                <tr>
                  <td colspan="5" style="font-family: Arial"><strong>NOMBRE DEL PROFESOR:</strong></td>
                </tr>
                <tr>
                  <td width="25%" style="font-family: Arial"><strong>CURSO:{{$course->name}}</strong></td>
                  <td width="9%" style="font-family: Arial"><strong>SECCIÓN:{{$section}}</strong></td>
                  <td width="29%" style="font-family: Arial"><strong>MODALIDAD: SECUNDARIA</strong></td>
                  <td width="18%" style="font-family: Arial"><strong>JORNADA: DOBLE</strong></td>
                  <td width="19%" style="font-family: Arial"><strong>AÑO:2019</strong></td>
                </tr>
                </table>
                
                <table width="100%" border="1" style="border-collapse: collapse; font-family: Arial;">
                <thead>
                <tr>
                  <td text-rotate="180" rowspan="2" align="center" valign="middle" style="font-size:14px;" >N°de Orden</td>
                  <td rowspan="2" align="center" valign="middle" style="font-size:14px;">Nombre del Alumno</td>
                  <td colspan="4" align="center" bgcolor="#CCCCCC" style="font-size:14px;">1er Periodo</td>
                  <td colspan="4" align="center" bgcolor="#CCCCCC" style="font-size:14px;">2do Periodo</td>
                  <td rowspan="2" align="center" valign="bottom" text-rotate="180" style="font-size:14px;">Nota de Promoción</td>
                  <td rowspan="2" align="center" valign="bottom" text-rotate="180" style="font-size:14px;">1ra Recuperación</td>
                  <td rowspan="2" align="center" valign="bottom" text-rotate="180" style="font-size:14px;">2da Recupreación</td>
                  <td align="center" rowspan="2" style="font-size:14px;">Observaciones</td>
                </tr>
                <tr text-rotate="180">
                  
                  <td valign="bottom" align="center" style="font-size:14px;"> Acumulativo</td>
                  <td valign="bottom" align="center" style="font-size:14px;"> Examen</td>
                  <td valign="bottom" align="center" style="font-size:14px;"><strong>Total</strong></td>
                  <td valign="bottom" align="center" style="font-size:14px;"></td>
                  
                  <td valign="bottom" align="center" style="font-size:14px;"> Acumulativo</td>
                  <td valign="bottom" align="center" style="font-size:14px;"> Examen</td>
                  <td valign="bottom" align="center" style="font-size:14px;"><strong>Total</strong></td>
                  <td valign="bottom" align="center" style="font-size:14px;"></td>
                  
                </tr>
                </thead>

                @php     $cont=0;      @endphp
                @foreach ($estudiantes as $estudiante)

                    <tr>
                        <td style="font-size:14px; width:20px; border: 1px solid #dee2e6; text-align:left;"><?php echo $cont+1; ?></td>
                        <td style="font-size:14px; width:100px; border: 1px solid #dee2e6; text-align:left;"><p> {{$estudiante->name}} {{$estudiante->lastname}}</p></td>
                        <td style="font-size:14px; width:40px; border: 1px solid #dee2e6; text-align:center;">{{$estudiante->Acum3}}</td>
                        <td style="font-size:14px; width:40px; border: 1px solid #dee2e6; text-align:center;">{{$estudiante->Exa3}}</td>
                        @if (($estudiante->Acum3 + $estudiante->Exa3) < 70)
                            <td style="font-size:14px; width:40px; border: 1px solid #dee2e6; text-align:center; color:red">{{$estudiante->Acum3 + $estudiante->Exa3}}</td>
                        @else
                            <td style="font-size:14px; width:40px; border: 1px solid #dee2e6; text-align:center;">{{$estudiante->Acum3 + $estudiante->Exa3}}</td>
                        @endif
                      
                        <td style="font-size:14px; width:40px; border: 1px solid #dee2e6; text-align:center;"></td>
                        <td style="font-size:14px; width:40px; border: 1px solid #dee2e6; text-align:center;">{{$estudiante->Acum4}}</td>
                        <td style="font-size:14px; width:40px; border: 1px solid #dee2e6; text-align:center;">{{$estudiante->Exa4}}</td>
                        @if (($estudiante->Acum4 + $estudiante->Exa4) < 70)
                            <td style="font-size:14px; width:40px; border: 1px solid #dee2e6; text-align:center; color:red">{{$estudiante->Acum4 + $estudiante->Exa4}}</td>
                        @else
                            <td style="font-size:14px; width:40px; border: 1px solid #dee2e6; text-align:center;">{{$estudiante->Acum4 + $estudiante->Exa4}}</td>
                        @endif
                        <td style="font-size:14px; width:40px; border: 1px solid #dee2e6; text-align:center;"></td>

                        @if ((round(($estudiante->Acum3 + $estudiante->Exa3 + $estudiante->Acum4 + $estudiante->Exa4)/2)) < 70)
                            <td style="font-size:14px; width:40px; border: 1px solid #dee2e6; text-align:center; color:red">{{round(($estudiante->Acum3 + $estudiante->Exa3 + $estudiante->Acum4 + $estudiante->Exa4)/2)}}</td>
                        @else
                            <td style="font-size:14px; width:40px; border: 1px solid #dee2e6; text-align:center;">{{round(($estudiante->Acum3 + $estudiante->Exa3 + $estudiante->Acum4 + $estudiante->Exa4)/2)}}</td>
                        @endif
                    
                        @if (($estudiante->Recu1)<70 and ($estudiante->Recu1)>0)
                            <td style="font-size:14px; width:40px; border: 1px solid #dee2e6; text-align:center;color:red">{{$estudiante->Recu1}}</td>
                        @endif
                        @if (($estudiante->Recu1)>=70)
                            <td style="font-size:14px; width:40px; border: 1px solid #dee2e6; text-align:center;">{{$estudiante->Recu1}}</td>
                        @endif
                        @if (($estudiante->Recu1)==0)
                        <td style="font-size:14px; width:40px; border: 1px solid #dee2e6; text-align:center;"></td>
                        @endif
                        
                        <td style="font-size:14px; width:40px; border: 1px solid #dee2e6; text-align:center;"></td>
                        <td style="font-size:14px; width:100px; border: 1px solid #dee2e6; text-align:center;"></td>
                        
                    </tr> 
                    @php     $cont+=1;      @endphp
                @endforeach
            </table>
          @endif


                <?php echo "<br />"; ?>
                <table>
                    <tr>
                        <td>
                            <STRONG>Fecha: <?php echo date("Y-m-d"); ?></STRONG>
                        </td>
                    </tr>
                    <?php echo "<br />"; ?>
                        <tr>
                        <td>
                            <STRONG>Firma de Catedrático:______________________________</STRONG>
                        </td>
                    </tr>
                </table>
                   
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
    'format' => [216, 330],
    'orientation' => 'L'
]); 

$mpdf->allow_charset_conversion= true;

$mpdf->charset_in='UTF-8';

$mpdf->SetDisplayMode('fullpage');

$mpdf->list_indent_first_level = 0; // 1 or 0 - whether to indent the first level of a list

$mpdf->WriteHTML($html);

$mpdf->Output('Cuadro Uno de '. utf8_encode($course->name) . "-". $section.'.pdf','I');

exit(); 
//==============================================================
//==============================================================
//==============================================================

?>
