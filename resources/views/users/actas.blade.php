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
               
        
            <table width="100%" style="tabla-striped; border: 1px solid #dee2e6; ">
                <tr>
                  <td align="center"><strong style="font-family: Arial">REPÚBLICA DE HONDURAS<BR>
              SECRETARÍA DE EDUCACIÓN<BR>
              DIRECCIÓN DEPARTAMENTAL DE EDUCACIÓN DE FRANCISCO MORAZÁN<BR>
              </strong></td>
                </tr>
              </table>
              
              <table width="100%" style="tabla-striped;  border: 1px solid #dee2e6; ">
              
                   
                 <tr style="font-family: Arial">
                  <td width="25%" style="font-size: 12px"><strong>CODIGO: 080101680T03</strong></td>
                
                  <td colspan="2" style="font-size: 12px" align="center"><strong>CÓDIGO DE PASO</strong></td>
                </tr>
              
                <tr>
                  <td style="font-family: Arial;font-size: 12px"><strong>NOMBRE DEL CENTRO EDUCATIVO:</strong></td>
                  <td colspan="2" style="font-family: Arial;font-size: 12px"><strong>C.E.B.N.G.B SAN JOSÉ DEL CARMEN</strong></td>
                  <td width="34%" style="font-family: Arial;font-size: 12px"><strong>ORDINARIOS</strong></td>
                  <td width="3%" ><table width="100%" style="tabla-striped; border: 1px solid #dee2e6; ">
                    <tr>
                      <td><strong>X</strong></td>
                    </tr>
                  </table></td>
                </tr>              
                
                <tr>
                  <td style="font-family: Arial;font-size: 12px"><strong>CURSO: {{$course->name}}</strong></td>
                  <td width="13%" style="font-family: Arial;font-size: 12px">&nbsp;</td>
                  <td width="25%" style="font-family: Arial;font-size: 12px">&nbsp;</td>
                  <td style="font-family: Arial;font-size: 12px"><strong>RECUPERACIÓN</strong></td>
                  <td><table width="100%" style="tabla-striped; border: 1px solid #dee2e6; ">
                    <tr>
                      <td><strong>X</strong></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td style="font-family: Arial;font-size: 12px"><strong>SECCIÓN: {{$section}}</strong></td>
                  <td colspan="2" style="font-family: Arial;font-size: 12px"><strong>AÑO: 2019<?php //echo date('Y'); ?></strong></td>
                  <td style="font-family: Arial;font-size: 12px"><strong>RETRASADA</strong></td>
                  <td><table width="100%" style="tabla-striped; border: 1px solid #dee2e6; ">
                    <tr>
                      <td>.</td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td style="font-family: Arial;font-size: 12px"><strong>ACTA DEL PRIMER SEMESTRE</strong></td>
                  <td colspan="2" style="font-family: Arial;font-size: 12px"><strong>JORNADA: DOBLE</strong></td>
                  <td style="font-family: Arial;font-size: 12px"><strong>EQUIVALENCIA</strong></td>
                  <td><table width="100%" style="tabla-striped; border: 1px solid #dee2e6; ">
                    <tr>
                      <td>.</td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td colspan="3" style="font-family: Arial;font-size: 12px"><strong>LUGAR Y FECHA: <?php ECHO "JUNIO 2019"  //echo $arrayDias[date('w')]." ".date('d')."/".$arrayMeses[date('m')-1]."/".date('Y'); ?></strong></td>
                  <td style="font-family: Arial;font-size: 12px"><strong>PREMISO ESPECIAL</strong></td>
                  <td><table width="100%" style="tabla-striped; border: 1px solid #dee2e6; ">
                    <tr>
                      <td>.</td>
                    </tr>
                  </table></td>
                </tr>
               
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

//$mpdf->SetDisplayMode('fullpage');

$mpdf->list_indent_first_level = 0; // 1 or 0 - whether to indent the first level of a list

$mpdf->WriteHTML($html);

$mpdf->Output('Acta de Calificaciones.pdf','I');

exit(); 
//==============================================================
//==============================================================
//==============================================================


?>
