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
                     <td colspan="3" style="font-family: Arial"><strong>LUGAR: LA CAMPAÑA     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; I SEMESTRE&nbsp;&nbsp;&nbsp;ASIGNATURA:<?php //echo utf8_encode($fila_clase['descripcion']);?></strong></td>
                   
                     </tr>
                     <tr>
                       <td colspan="5" style="font-family: Arial"><strong>NOMBRE DEL PROFESOR:<?php //echo utf8_encode($fila_empleado['nombres']." ".$fila_empleado['apellidos']);?></strong></td>
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
                     <tr>
                       <td text-rotate="180" rowspan="2" align="center" valign="middle">N°de Orden</td>
                       <td rowspan="2" align="center" valign="middle">Nombre del Alumno</td>
                       <td colspan="5" align="center" bgcolor="#CCCCCC">1er Semestre</td>
                       <td colspan="4" align="center" bgcolor="#CCCCCC">2do Semestre</td>
                       <td rowspan="2" align="center" valign="bottom"  style="text-rotate: 90; text-align:center; font-weight: bold; border: 1px solid #dee2e6;">Nota de Promoción</td>
                       <td rowspan="2"  style="text-rotate: 90; text-align:center; font-weight: bold; border: 1px solid #dee2e6;">Nota de 1ra Recuperación</td>
                       <td rowspan="2"  style="text-rotate: 90; text-align:center; font-weight: bold; border: 1px solid #dee2e6;">Nota de 2da Recupreación</td>
                       <td align="center" rowspan="2">Observaciones</td>
                     </tr>
                     <tr text-rotate="180">
                       
                       <td valign="bottom" style="text-rotate: 90; text-align:center; font-weight: bold; border: 1px solid #dee2e6;"> Acumulativo</td>
                       <td valign="bottom" style="text-rotate: 90; text-align:center; font-weight: bold; border: 1px solid #dee2e6;"> Examen</td>
                       <td valign="bottom" style="text-rotate: 90; text-align:center; font-weight: bold; border: 1px solid #dee2e6;"><strong>Total</strong></td>                       
                       
                       <td valign="bottom" style="text-rotate: 90; text-align:center; font-weight: bold; border: 1px solid #dee2e6;"> Acumulativo</td>
                       <td valign="bottom" style="text-rotate: 90; text-align:center; font-weight: bold; border: 1px solid #dee2e6;"> Examen</td>
                       <td valign="bottom" style="text-rotate: 90; text-align:center; font-weight: bold; border: 1px solid #dee2e6;"><strong>Total</strong></td>
                     </tr>

                     @php     $cont=0;      @endphp
                     @foreach ($estudiantes as $estudiante)

                        <tr>
                            <td style="font-size:14px; width:20px; border: 1px solid #dee2e6; text-align:left;"><?php echo $cont+1; ?></td>
                            <td style="font-size:14px; border: 1px solid #dee2e6; text-align:left;"><p> {{$estudiante->name}} {{$estudiante->lastname}}</p></td>
                            <td style="font-size:14px; width:20px; border: 1px solid #dee2e6; text-align:left;"></td>
                            <td style="font-size:14px; width:20px; border: 1px solid #dee2e6; text-align:left;"></td>
                            <td style="font-size:14px; width:20px; border: 1px solid #dee2e6; text-align:left;"></td>
                            <td style="font-size:14px; width:20px; border: 1px solid #dee2e6; text-align:left;"></td>
                            <td style="font-size:14px; width:20px; border: 1px solid #dee2e6; text-align:left;"></td>
                            <td style="font-size:14px; width:20px; border: 1px solid #dee2e6; text-align:left;"></td>
                            <td style="font-size:14px; width:20px; border: 1px solid #dee2e6; text-align:left;"></td>
                        </tr>
                         
                     @endforeach
                </table>




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

$mpdf->Output('Cuadro Uno de '. utf8_encode($course->name) . "-". $section,'I');

exit(); 
//==============================================================
//==============================================================
//==============================================================

?>
