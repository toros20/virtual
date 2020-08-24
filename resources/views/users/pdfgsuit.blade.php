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
                        <table class=" tabla tabla-striped tabla-bordered" style=" text-align:center " align="center" width="700">
                         <tr>
                            <td><img src="{{ URL::asset('img/gsuit.jpg')}}" alt=""/></td>
                        </tr>
                        </table>

                        <table align="center" class="table" style="align='center'; width='100%'; border: 1px solid black; padding: 10px; ">
                         <tr>
                            <td width="25%" align="left"><h3>Usuario</h3></td>
                            <td><h3>{{$usuario[0]->Firstname}}-{{$usuario[0]->Lastname}}</h3></td>
                        </tr>
                        <tr>
                            <td width="25%" align="left"><h3>Email</h3></td>
                            <td><h3>{{$usuario[0]->Email}}</h3></td>
                        </tr>
                        <tr>
                            <td width="25%" align="left"><h3>Contraseña</h3></td>
                            <td><h3>{{$usuario[0]->Password}}</h3></td>
                        </tr>
                        <tr>
                            <td width="25%" align="left"><h3>Enlace Web</h3></td>
                            <td><h3>https://accounts.google.com</h3></td>
                        </tr>
                        </table>

        </div><!--row-->

    </div><!--container-fluid-->

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
    //'format' => [190, 236],
    'format' => [216, 279],
    'orientation' => 'P'
]); 

$mpdf->allow_charset_conversion= true;

$mpdf->charset_in='UTF-8';

//$mpdf->SetDisplayMode('fullpage');

$mpdf->list_indent_first_level = 0; // 1 or 0 - whether to indent the first level of a list

$mpdf->WriteHTML($html);

$mpdf->Output('Gsuit.pdf','I');

exit();
//==============================================================
//==============================================================
//==============================================================


?>
