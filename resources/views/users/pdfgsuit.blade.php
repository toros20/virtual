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

                        <table align="center" class="table" style="width='100%'; border: 1px solid black; padding: 10px; ">
                         <tr>
                            <td style="border: 1px solid black;" width="25%" align="center"><h3>Usuario</h3></td>
                            <td style="border: 1px solid black;" align="center"><h3>{{$usuario[0]->Firstname}} {{$usuario[0]->Lastname}}</h3></td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black;" width="25%" align="center"><h3>Email</h3></td>
                            <td style="border: 1px solid black;" align="center"><h3>{{$usuario[0]->Email}}</h3></td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black;" width="25%" align="center"><h3>Contraseña</h3></td>
                            <td style="border: 1px solid black;" align="center"><h3>{{$usuario[0]->Password}}</h3></td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black;" width="25%" align="center"><h3>Enlace Web</h3></td>
                            <td style="border: 1px solid black;" align="center"><h3>https://gsuite.google.com/dashboard</h3></td>
                        </tr>
                        </table>

                        <p>Al ingresar por primera vez deberá seguir los siguientes pasos.</p>
                        <ol>
                            <li>Ingresar al enlace web : https://gsuite.google.com/dashboard</li>
                            <li>Ingresar correo y clave asignado.</li>
                            <li>Aceptar los términos y servicios de Google.</li>
                            <li>Crear una nueva contraseña y confirmarla. </li>
                            (8 caracteres mínimo, Mayúsculas y minúsculas, números)</li>
                            <li>Al completar el proceso será enviado al tablero inicial de aplicaciones.</li>
                            <li>Le pedimos subir en su perfil una fotografía formal y clara de su rostro de frente.</li>
                        </ol>

                        <p>Al ingresar al tablero de aplicaciones el proceso de registro habrá terminado</p>
                        <img width="70%" src="{{ URL::asset('img/tablerogsuit.jpg')}}" alt=""/>

                        <h4 style="text-align: center;">POLITICA USO DE CUENTAS G SUITE PARA EDUCACION</h4> 
                        <h4 style="text-align: center;">Tegucigalpa, M.D.C. septiembre 2020 </h4>
                         <hr />
                         <br />
                        <p style="text-align: justify;"> 1.	<span style="font-weight:bond">DESCRIPCION DEL SERVICIO:</span> Las cuentas de Google Suite para Educación, son proporcionadas por Instituto San José del Carmen, con el objeto de apoyar el proceso académico institucional, así como las funciones de comunicación con todo el personal administrativo educativo y docente, alumnado y padres de familia, conforme el acuerdo establecido con Google. </p>
                        <br />
                        <p style="text-align: justify;">Al activar un dominio en Google Suite para Educación, se han adoptado un conjunto de soluciones de software que Google ofrece a los centros educativos, bajo el modelo Software as a Service. El acceso a estos recursos está condicionado a la aceptación de la Política de Uso, por parte de los usuarios: administrativos educativos, docentes, alumnado que sea mayor a los 14 años de edad y a padres de familia de alumnos menores a los 14 años de edad, en cuya representación se les entrega una cuenta de uso.</p>
                        <br />
                        <p style="text-align: justify;">Las cuentas institucionales se encuentran bajo la plataforma de Google Suite para Educación, e incluye los siguientes servicios integrados: Gmail, Google Calendar, Google Drive, Google Sites y Hangouts.  Todos estos servicios están bajo el dominio: @sanjosedelcarmen.edu.hn a diferencia de las cuentas que normalmente ofrece Google de forma particular.</p>
                        <br />
                        <p style="text-align: justify;">Se ha elegido esta plataforma como parte de nuestra mejora continua en calidad educativa y ofrecer herramientas que nos permitan: </p>
                        <ul>
                           <li>	Alta disponibilidad de servicio </li>
                           <li>	Integración de aplicaciones de productividad y colaboración con e-mail, proporcionando así un ecosistema de trabajo corporativo</li>
                           <li>	Elevada operatividad al ser una solución integrada multidispositivos y multiplataforma</li>
                           <li>	Accesibilidad desde navegador web sin necesidad de instalar software extra</li>
                           <li>	Disponer de herramientas como Clasrroom, para la gestión del aprendizaje</li>
                         </ul>
                        <br />
                        <p style="text-align: justify;">El administrador del dominio de Instituto San José del Carmen, es la persona que administra Google Suite y será el responsable último de la administración y gestión de cuentas y aplicaciones en el Panel de Control. </p>
                        <br />
                        <p>El conjunto de aplicaciones principales de Google Suite se describe en: </p>
                        <p>http://www.google.com/enterprise/apps/education/products.html</p>
                        <br />
                        <p>El acceso a las cuentas de Google Suite institucionales se realiza de forma unificada en:</p> 
                        <p>https://gsuite.google.com/dashboard</p>
                       
                        <hr />

                         <p>2.	Condiciones de servicio:</p>
                         <p>a)	Condiciones Generales: </p>
                           <p style="text-align: justify;">a.1) Las cuentas de Google Suite de Instituto San José del Carmen, constituyen un servicio educativo que se ofrece a todo el personal Administrativo educativo, docente y de servicios que trabajan en él y al alumnado y sus familias que están debidamente matriculados.</p>
                           <p style="text-align: justify;">a.2) Las cuentas de Google Suite de Instituto San José del Carmen serán creadas y utilizadas en consonancia con las condiciones establecidas en el acuerdo suscrito entre la Institución y Google. Los términos del acuerdo pueden consultarse en el sitio web de G Suite en la página:</p>
                           <p>http://www.google.com/apps/intl/es/terms/education_terms.html </p>
                           <p style="text-align: justify;"> a.3) Las cuentas de G Suite de la Institución, sólo podrán ser utilizadas por Instituto San José del Carmen, personal administrativo, administrativo educativo, docentes y alumnado o sus representantes (en el caso de los menores de 14 años) que estén debidamente matriculados y para las tareas relacionadas con su actividad educativa.</p>
                           <p style="text-align: justify;">a.4) La publicación y distribución de cualquier tipo de contenido, mediante los servicios y aplicaciones vinculadas a las cuentas de G Suite de Instituto San José del Carmen, deberá realizarse de acuerdo con la legislación vigente sobre protección de datos de carácter personal.</p>
                           <p style="text-align: justify;">a.5) Queda estrictamente prohibido el uso de las cuentas de G Suite de Instituto San José del Carmen y de todos los servicios y aplicaciones vinculadas a ellas, para actividades personales, comerciales, publicitarias o de cualquier otra índole que no vayan en consonancia con el proceso formativo académico para el cual han sido creadas. De igual forma, no es permitido a ningún miembro del personal de la Institución y/o alumnado y familias, instalar o utilizar aplicaciones fuera de lo establecido en G Suite para Educación.</p>
                           <p style="text-align: justify;">a.6) Las cuentas de G Suite serán nominales y responderán siempre a una persona física. Podrá utilizarse “Alias” para asignar otras direcciones por cargo o grupo. Será el Departamento de Sistemas de la Institución el único que, previa autorización, puede crear y/o eliminar dichas cuentas. </p>
                        
                          <p style="text-align: justify;">a.7) Todo oficio, invitación o trámite que no requiera firma y sello institucional, se realizará vía correo electrónico institucional.</p>
                          <p style="text-align: justify;">a.8) Los usuarios y representantes legales son responsables de todas las actividades realizadas con su cuenta de acceso y buzón asociado a la Institución y se atienen a las consecuencias correspondientes por el mal uso de las mismas.  </p>
                          <p style="text-align: justify;">a.9) Es una falta grave facilitar y ofrecer acceso a la propia cuenta, a personas no autorizadas por Instituto San José del Carmen. Cada cuenta es personal e intransferible.</p>
                          <p style="text-align: justify;">a.10) Es una falta grave hacer uso inadecuado de la cuenta personal, para ocasionar daños a terceros (interrumpir clases, agraviar, amenazar, acosar, denigrar, etc.) lo cual ocasiona suspensión inmediata del servicio, de acuerdo a lo estipulado y convenido con las políticas Institucionales y de Google.</p>
                          <p style="text-align: justify;">a.11) Es responsabilidad de cada usuario, salvaguardar los datos contenidos en las aplicaciones de G Suite, haciendo uso periódico de la aplicación Google Vault, ofrecido por el programa Data Liberation.</p>
                          <p style="text-align: justify;">a.12) Instituto San José del Carmen podrá crear cuentas para la administración de backups, así como habilitar LDAP y Single Sign On para la autenticación con terceros servicios.</p>
                          <p style="text-align: justify;">a.13) Cada alumno y miembro del personal de la Institución, podrá tener una única cuenta de G Suite, bajo el dominio de Instituto San José de Carmen, y su uso es exclusivo para el ámbito escolar y educativo.</p>
                          <p style="text-align: justify;">a.14) Cuando un miembro del personal administrativo y/o docente deje de laborar en Instituto San José del Carmen, se procederá a suspender y/o eliminar la cuenta correspondiente.</p>

                          <br />
                          <h4>b) Condiciones para las cuentas de alumnos y familias:</h4>

                          <p style="text-align: justify;">b.1) Instituto San José del Carmen podrá registrar cuentas para el alumnado y familias de acuerdo a su reglamentación propia y a las condiciones de matrícula.</p>
                          <p style="text-align: justify;">b.2) El uso de las cuentas por parte del alumnado requiere manifestar la conformidad con la Política de Uso de Cuentas de G Suite establecidas para alumnos mayores y menores a los 14 años. Esta conformidad es de uso obligatorio.</p>
                          <p style="text-align: justify;">b.3) Cada alumno podrá tener una única cuenta de G Suite, bajo el dominio de Instituto San José de Carmen, y su uso es exclusivo para el ámbito escolar y educativo.</p>
                          <p style="text-align: justify;">b.4) Cuando un alumno deje de estar matriculado en Instituto San José del Carmen, se procederá a suspender y/o eliminar la cuenta correspondiente.</p>
                          <p style="text-align: justify;">b.5) El uso de la cuenta personal de alumnos y familias, deberá respetar en todo momento, las normas y condiciones establecidas por Instituto San José del Carmen y lo contemplado en las políticas de uso de Google. Debido a que todo lo que sea escrito, enviado, publicado, grabado, etc. en cada cuenta de alumnos y familias (en el caso de los alumnos menores de 14 años), será visto y supervisado por Instituto San José del Carmen, todo acto en contra de lo anteriormente establecido ocasionará la limitación inmediata del acceso a la misma y por consiguiente del proceso académico.</p>
                          <p style="text-align: justify;">b.6) Instituto San José del Carmen se reserva el derecho a condicionar el despliegue de las aplicaciones de G Suite, según criterios pedagógicos y la edad de los alumnos.</p>
                          <br />

                          <h4>3. CLAUSULAS GENERALES:</h4>
                          <p style="text-align: justify;">a) Todos los miembros del personal de Instituto San José del Carmen, alumnado y familias con cuenta G Suite, deben manifestar su conformidad con la presente Política Uso de Cuentas de G Suite para Educación.</p>
                          <p style="text-align: justify;">b) Todos los miembros del personal administrativo educativo y docente, por la Presente Política de Uso, asume la responsabilidad y se obliga a hacer uso único de G Suite para Educación, en todo el proceso académico, debiendo suspender el uso de otras aplicaciones para el desarrollo de las clases virtuales, comunicaciones, envío y/o recepción de tareas, mensajes, notas, etc. Esta cláusula entrará en vigor, el día y fecha que estipule la Dirección General de la Institución.</p>
                          <p style="text-align: justify;">c) En caso de advertirse incumplimiento en las condiciones antes manifestadas sobre este servicio prestado, Instituto San José del Carmen se reserva la potestad de desactivar cualquier cuenta de G Suite, incluso sin previo aviso, o bien aplicar las medidas administrativo laborales correspondientes.</p>
                          <p style="text-align: justify;">d) Todo lo no estipulado en la presente Política de Uso de G Suite para Educación, será retomado y resuelto por las autoridades de Instituto San José del Carmen en consonancia con lo estipulado y convenido con Google para Educación.</p>

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
