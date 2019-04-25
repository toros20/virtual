<?php 
//date_default_timezone_set('UTC');
$arrayMeses = array('Ene', 'Febr', 'Mar', 'Abr', 'Mayo', 'Jun',
   'Jul', 'Agos', 'Sept', 'Oct', 'Nov', 'Dic');
 
   $arrayDias = array( 'Domingo', 'Lunes', 'Martes',
       'Miercoles', 'Jueves', 'Viernes', 'Sabado');
ob_start();

$host="localhost";
		$user="sitecone_geo";
		$pass="Sistemas20!";
		$baseDatos="sitecone_geo_b1";

    @$conexion=mysql_connect($host,$user,$pass)or die("NO se pudo establecer la conexion ".mysql_error());
     mysql_select_db($baseDatos);

     $curso=$_POST['cursos'];
     $seccion=$_POST['secciones'];

if ($curso!=7 and $curso!=8) {
      
    //obtener el NOMBRE del curso
     $sql_curso="select descripcion from cursos where id = ". $curso;
     $res_curso=mysql_query($sql_curso);
     $fila_curso=mysql_fetch_array($res_curso);

     //obtener el NOMBRE de la seccion
     $sql_seccion="select descripcion from secciones where id = ". $seccion;
     $res_seccion=mysql_query($sql_seccion);
     $fila_seccion=mysql_fetch_array($res_seccion);

     //OBTENER ID DE MATRICULAS Y NOMBRES DE LOS ALUMNOS
     $sql_ids_matricula= "select m.id as m_id,a.nombres,a.apellidos 
                            from matriculas as m, alumnos as a
                            where m.RNE = a.RNE and 
                            cursos_id= ". $curso .  " and secciones_id=".$seccion." order by a.sexo, a.nombres" ;

   ?>  

      <!doctype html>
      <html>

      <head>
      <meta charset="utf-8">
      <title>Boleta de Calificaciones</title>
      </head>

      <body>
      <?php 

        $resp_ids_matricula=mysql_query($sql_ids_matricula);
            
         while ($fila_matricula=mysql_fetch_array($resp_ids_matricula)){
     ?>
      <table width="100%" border="0">
      <tr>
        <td width="12%" rowspan="2" align="center"><img src="/geo/app/webroot/images/isjc_logo.jpg" width="100" height="100" alt=""/></td>
        <td width="78%" rowspan="2" align="center" valign="top"><span style="font-family: Arial; font-size: 24px; font-weight: bold;">Instituto San José del Carmen</span><br>
          <span style="font-family: Arial">Colonia la Campaña, Tegucigalpa.<br>
      Tel. (+504) 2221-4474 / 2221-4475</span></td>
        <td width="10%" height="41" align="center" valign="top" style=" font-weight:bold"><?php echo $arrayDias[date('w')]." ".date('d')."/".$arrayMeses[date('m')-1]."/".date('Y');?></td>
      </tr>
      <tr>
        <td align="center" valign="bottom" style=" font-weight:bold"><img src="/geo/app/webroot/images/geo.png" width="109" height="42" alt=""/></td>
      </tr>
      </table>

      <table width="100%" border="0">
      <tr>
        <td colspan="5" align="center" style="font-family: Arial; font-size: 24px; font-weight: bold;">Boleta de Calificaciones</td>
      </tr>

        
      <tr>
        <td width="6%" valign="bottom">&nbsp;</td>
        <td width="11%" height="36" valign="bottom"><span style="font-family: Arial"><strong>Estudiante</strong></span><strong>:</strong></td>
        <td height="36" colspan="3" valign="bottom"><?php echo utf8_encode($fila_matricula['nombres']." ".$fila_matricula['apellidos']) ?> </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><strong style="font-family: Arial">Grado:</strong></td>
        <td width="43%"><?php echo utf8_encode($fila_curso['descripcion']); ?></td>
        <td width="8%"><strong style="font-family: Arial">Sección:</strong></td>
        <td width="32%"><?php echo utf8_encode($fila_seccion['descripcion']);?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      </table>

      <table width="100%" border="1" style="border-collapse: collapse; font-size: 100%; font-family: Arial;">
      <tr>
        <td width="40%" align="center" bgcolor="#CCCCCC" style="font-family: Arial; font-size: 18px;"><strong>Asignatura</strong></td>
        <td width="7%" align="center" bgcolor="#CCCCCC" style="font-size: 12px"><strong>I PAR.</strong></td>
        <td width="7%" align="center" bgcolor="#CCCCCC" style="font-size: 12px"><strong>NIV.1</strong></td>
        <td width="7%" align="center" bgcolor="#CCCCCC" style="font-size: 12px"><strong>II PAR.</strong></td>
        <td width="7%" align="center" bgcolor="#CCCCCC" style="font-size: 12px"><strong>NIV. 2</strong></td>
        <td width="7%" align="center" bgcolor="#CCCCCC" style="font-size: 12px"><strong>III PAR.</strong></td>
        <td width="7%" align="center" bgcolor="#CCCCCC" style="font-size: 12px"><strong>NIV. 3</strong></td>
        <td width="7%" align="center" bgcolor="#CCCCCC" style="font-size: 12px"><strong>IV PAR.</strong></td>
        <td width="6%" align="center" bgcolor="#CCCCCC" style="font-size: 12px"><strong>PRO.</strong></td>
        <td width="6%" align="center" bgcolor="#CCCCCC" style="font-size: 12px"><strong>REC.1</strong></td>
        <td width="6%" align="center" bgcolor="#CCCCCC" style="font-size: 12px"><strong>REC.2</strong></td>
      </tr>
      <?php 
      //estas sumas son para calcular el promedio
      $suma_1=0;$suma_2=0;$suma_3=0;$suma_4=0; $cont=0;

     $sql_clases="select descripcion, 
                  t_aula_1, t_casa_1, examen_1, nivelacion_1,
                  t_aula_2, t_casa_2, examen_2, nivelacion_2,
                  t_aula_3, t_casa_3, examen_3, nivelacion_3,
                  t_aula_4, t_casa_4, examen_4,
                  recuperacion_1,recuperacion_2
                  from clases as cl, historiales as h where
                  cl.id=h.clases_id and h.matriculas_id=".$fila_matricula['m_id'];
      $resp_clases=mysql_query($sql_clases);
      
         while ($fila_clases=mysql_fetch_array($resp_clases)){
      
     ?>
     
      <tr>
        <td> <?php echo utf8_encode($fila_clases['descripcion']) ?></td>

        <td align="center"><?php echo $fila_clases['t_aula_1'] + $fila_clases['t_casa_1'] + $fila_clases['examen_1'] ?></td>
        <td align="center"><?php if($fila_clases['nivelacion_1']>0) {echo $fila_clases['nivelacion_1']; } ?></td>
        
        <td align="center"><?php echo $fila_clases['t_aula_2'] + $fila_clases['t_casa_2'] + $fila_clases['examen_2'] ?></td>
        <td align="center"><?php if ($fila_clases['nivelacion_2']>0) {echo $fila_clases['nivelacion_2'] ;} ?></td>
        
        <td align="center"><?php echo $fila_clases['t_aula_3'] + $fila_clases['t_casa_3'] + $fila_clases['examen_3'] ?></td>
        <td align="center"><?php if ($fila_clases['nivelacion_3']>0) {echo $fila_clases['nivelacion_3']; } ?></td>
        
        <td align="center"><?php echo $fila_clases['t_aula_4'] + $fila_clases['t_casa_4'] + $fila_clases['examen_4'] ;?></td>
       
        <td bgcolor="#F0F8FF">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>

      </tr>

      <?php 
        $cont+=1;
        $suma_1+=$fila_clases['t_aula_1'] + $fila_clases['t_casa_1'] + $fila_clases['examen_1']+$fila_clases['nivelacion_1'];
        $prom_1=$suma_1/$cont;

        $suma_2+=$fila_clases['t_aula_2'] + $fila_clases['t_casa_2'] + $fila_clases['examen_2']+$fila_clases['nivelacion_2'];
        $prom_2=$suma_2/$cont;

        $suma_3+=$fila_clases['t_aula_3'] + $fila_clases['t_casa_3'] + $fila_clases['examen_3']+$fila_clases['nivelacion_3'];
        $prom_3=$suma_3/$cont;

        $suma_4+=$fila_clases['t_aula_4'] + $fila_clases['t_casa_4'] + $fila_clases['examen_4'];
        $prom_4=$suma_4/$cont;

     } ?>
      <tr>
        <td><strong>ÍNDICE ACADÉMICO:</strong></td>
        <td bgcolor="#F0F8FF" align="center"><?php echo round($prom_1) + " %"; ?></td>
        <td bgcolor="#F0F8FF" align="center">&nbsp;</td>
        <td bgcolor="#F0F8FF" align="center"><?php echo round($prom_2) + " %"; ?></td>
        <td bgcolor="#F0F8FF" align="center">&nbsp;</td>
        <td bgcolor="#F0F8FF" align="center"><?php echo round($prom_3) + " %"; ?></td>
        <td bgcolor="#F0F8FF" align="center">&nbsp;</td>
        <td bgcolor="#F0F8FF" align="center"><?php echo round($prom_4) + " %"; ?></td>
        <td bgcolor="#F0F8FF" align="center"><?php echo round( ($prom_1+$prom_2+$prom_3+$prom_4)/4) + " %"; ?></td>
        <td align="center"> <?php echo $fila_clases['recuperacion_1']; ?> </td>
        <td align="center"> <?php echo $fila_clases['recuperacion_2']; ?></td>
      </tr>
      </table> 

      <table width="100%" border="0">
      <tr>
        <td>&nbsp;</td>
      </tr>
      </table>
      <table width="100%" border="1" style="border-collapse: collapse; font-family: Arial; font-size: 14px;">
      <tr>
        <td width="40%" style="text-align: center; font-size: 14px;"><strong>Personalidad</strong></td>
        <td width="15%" style="text-align: center"><strong>I Parcial</strong></td>
        <td width="15%" style="text-align: center"><strong>II Parcial</strong></td>
        <td width="15%" style="text-align: center"><strong>III Parcial</strong></td>
        <td width="15%" style="text-align: center"><strong>IV Parcial</strong></td>
      </tr>

      <?php //obtener la personalidad
         $sql_per=" select * from phistoriales as h, pclases as c
                     where h.pclases_id=c.id and matriculas_id=".$fila_matricula['m_id'];
          $resp_per=mysql_query($sql_per);
         while ($fila_per=mysql_fetch_array($resp_per)){
       ?>
            <tr>
              <td><?php echo utf8_encode($fila_per['descripcion']); ?></td>
              <td><?php echo $fila_per['parcial1']; ?></td>
              <td><?php echo $fila_per['parcial2']; ?></td>
              <td><?php echo $fila_per['parcial3']; ?></td>
              <td><?php echo $fila_per['parcial4']; ?></td>
            </tr>
      <?php  } ?>
      </table>

      <table width="100%" border="0">
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="center">__________________________</td>
        <td align="center">__________________________</td>
        
      </tr>
      <tr>
        <td align="center" style="font-family: Arial; font-size: 14px;"><strong>Secretaria</strong></td>
        <td align="center" style="font-family: Arial; font-size: 14px;"><strong>Directora</strong></td>
        
      </tr>
     
      </table>
      <?php echo "<br />";echo "<br />";echo "<br />";echo "<br />";echo "<br />"; ?>

      <?php } ?>

      </body>

      </html>

 <?php } ?>

 
  <?php  if ($curso==7 or $curso==8) {
      
    //obtener el NOMBRE del curso
     $sql_curso="select descripcion from cursos where id = ". $curso;
     $res_curso=mysql_query($sql_curso);
     $fila_curso=mysql_fetch_array($res_curso);

     //obtener el NOMBRE de la seccion
     $sql_seccion="select descripcion from secciones where id = ". $seccion;
     $res_seccion=mysql_query($sql_seccion);
     $fila_seccion=mysql_fetch_array($res_seccion);

     //OBTENER ID DE MATRICULAS Y NOMBRES DE LOS ALUMNOS
     $sql_ids_matricula= "select m.id as m_id,a.nombres,a.apellidos 
                            from matriculas as m, alumnos as a
                            where m.RNE = a.RNE and 
                            cursos_id= ". $curso .  " and secciones_id=".$seccion." order by a.sexo, a.nombres" ;

   ?>  

      <!doctype html>
      <html>

      <head>
      <meta charset="utf-8">
      <title>Boleta de Calificaciones</title>
      </head>

      <body>
      <?php 

        $resp_ids_matricula=mysql_query($sql_ids_matricula);
            
         while ($fila_matricula=mysql_fetch_array($resp_ids_matricula)){
     ?>
      <table width="100%" border="0">
      <tr>
        <td width="12%" rowspan="2" align="center"><img src="/geo/app/webroot/images/isjc_logo.jpg" width="100" height="100" alt=""/></td>
        <td width="78%" rowspan="2" align="center" valign="top"><span style="font-family: Arial; font-size: 24px; font-weight: bold;">Instituto San José del Carmen</span><br>
          <span style="font-family: Arial">Colonia la Campaña, Tegucigalpa.<br>
      Tel. (+504) 2221-4474 / 2221-4475</span></td>
        <td width="10%" height="41" align="center" valign="top" style=" font-weight:bold"><?php echo $arrayDias[date('w')]." ".date('d')."/".$arrayMeses[date('m')-1]."/".date('Y');?></td>
      </tr>
      <tr>
        <td align="center" valign="bottom" style=" font-weight:bold"><img src="/geo/app/webroot/images/geo.png" width="109" height="42" alt=""/></td>
      </tr>
      </table>

      <table width="100%" border="0">
      <tr>
        <td colspan="5" align="center" style="font-family: Arial; font-size: 24px; font-weight: bold;">Boleta de Calificaciones I Semestre</td>
      </tr>

        
      <tr>
        <td width="6%" valign="bottom">&nbsp;</td>
        <td width="11%" height="36" valign="bottom"><span style="font-family: Arial"><strong>Estudiante</strong></span><strong>:</strong></td>
        <td height="36" colspan="3" valign="bottom"><?php echo utf8_encode($fila_matricula['nombres']." ".$fila_matricula['apellidos']) ?> </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><strong style="font-family: Arial">Grado:</strong></td>
        <td width="43%"><?php echo utf8_encode($fila_curso['descripcion']); ?></td>
        <td width="8%"><strong style="font-family: Arial">Sección:</strong></td>
        <td width="32%"><?php echo utf8_encode($fila_seccion['descripcion']);?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      </table>

      <table width="100%" border="1" style="border-collapse: collapse; font-size: 100%; font-family: Arial;">
      <tr>
        <td width="50%" align="center" bgcolor="#CCCCCC" style="font-family: Arial; font-size: 18px;"><strong>Asignatura</strong></td>
        <td width="7%" align="center" bgcolor="#CCCCCC" style="font-size: 12px"><strong>I PER.</strong></td>
        <td width="7%" align="center" bgcolor="#CCCCCC" style="font-size: 12px"><strong>NIV.1</strong></td>
        <td width="7%" align="center" bgcolor="#CCCCCC" style="font-size: 12px"><strong>II PER.</strong></td>
        <td width="6%" align="center" bgcolor="#CCCCCC" style="font-size: 12px"><strong>PRO.</strong></td>
        <td width="6%" align="center" bgcolor="#CCCCCC" style="font-size: 12px"><strong>REC.1</strong></td>
        <td width="6%" align="center" bgcolor="#CCCCCC" style="font-size: 12px"><strong>REC.2</strong></td>
      </tr>
      <?php 
      //estas sumas son para calcular el promedio
      $suma_1=0;$suma_2=0;$suma_3=0;$suma_4=0; $cont=0;

     $sql_clases="select descripcion, 
                  t_aula_1, t_casa_1, examen_1, nivelacion_1,
                  t_aula_2, t_casa_2, examen_2, nivelacion_2,
                  t_aula_3, t_casa_3, examen_3, nivelacion_3,
                  t_aula_4, t_casa_4, examen_4,
                  recuperacion_1,recuperacion_2
                  from clases as cl, historiales as h where
                  cl.id=h.clases_id and h.matriculas_id=".$fila_matricula['m_id']." and semestres_id=2";
      $resp_clases=mysql_query($sql_clases);
      
         while ($fila_clases=mysql_fetch_array($resp_clases)){
      
     ?>
     
      <tr>
        <td> <?php echo utf8_encode($fila_clases['descripcion']) ?></td>

        <td align="center"><?php echo $fila_clases['t_aula_3'] + $fila_clases['t_casa_3'] + $fila_clases['examen_3'] ?></td>
        <td align="center"><?php if($fila_clases['nivelacion_3']>0) {echo $fila_clases['nivelacion_3']; } ?></td>
        
        <td align="center"><?php //echo $fila_clases['t_aula_4'] + $fila_clases['t_casa_4'] + $fila_clases['examen_4'] ?></td>
        <td align="center"><?php 
        $ns1= $fila_clases['t_aula_3'] + $fila_clases['t_casa_3'] + $fila_clases['examen_3']+$fila_clases['nivelacion_3'];
        $ns2= $fila_clases['t_aula_4'] + $fila_clases['t_casa_4'] + $fila_clases['examen_4'];
        //echo round(($ns1+$ns2)/2);
         ?></td>
        <td bgcolor="#F0F8FF"><?php //echo $fila_clases['recuperacion_1']; ?></td>
        <td bgcolor="#F0F8FF"><?php //echo $fila_clases['recuperacion_2']; ?></td>
        <td>&nbsp;</td>

      </tr>

      <?php 
        $cont+=1;
        $suma_1+=$fila_clases['t_aula_3'] + $fila_clases['t_casa_3'] + $fila_clases['examen_3']+$fila_clases['nivelacion_3'];
        $prom_1=$suma_1/$cont;

        $suma_2+=$fila_clases['t_aula_4'] + $fila_clases['t_casa_4'] + $fila_clases['examen_4'];
        $prom_2=$suma_2/$cont;

     } ?>
      <tr>
        <td><strong>ÍNDICE ACADÉMICO:</strong></td>
        <td bgcolor="#F0F8FF" align="center"><?php echo round($prom_1) + " %"; ?></td>
        <td bgcolor="#F0F8FF" align="center">&nbsp;</td>
        <td bgcolor="#F0F8FF" align="center"><?php //echo round($prom_2) + " %"; ?></td>
       
        <td bgcolor="#F0F8FF" align="center"><?php  //echo round( ($prom_1+$prom_2)/2) + " %"; ?></td>
        <td align="center"> <?php //echo $fila_clases['recuperacion_1']; ?> </td>
        <td align="center"> <?php //echo $fila_clases['recuperacion_2']; ?></td>
      </tr>
      </table> 

      <table width="100%" border="0">
      <tr>
        <td>&nbsp;</td>
      </tr>
      </table>
      <table width="100%" border="1" style="border-collapse: collapse; font-family: Arial; font-size: 14px;">
      <tr>
        <td width="40%" style="text-align: center; font-size: 14px;"><strong>Personalidad</strong></td>
        <td width="15%" style="text-align: center"><strong>I Período</strong></td>
        <td width="15%" style="text-align: center"><strong>II Período</strong></td>
        <td width="15%" style="text-align: center"><strong></strong></td>
        <td width="15%" style="text-align: center"><strong></strong></td>
      </tr>

      <?php //obtener la personalidad
         $sql_per=" select * from phistoriales as h, pclases as c
                     where h.pclases_id=c.id and matriculas_id=".$fila_matricula['m_id'];
          $resp_per=mysql_query($sql_per);
         while ($fila_per=mysql_fetch_array($resp_per)){
       ?>
            <tr>
              <td><?php echo utf8_encode($fila_per['descripcion']); ?></td>
              <td><?php echo $fila_per['parcial3']; ?></td>
              <td><?php //echo $fila_per['parcial2']; ?></td>
              <td><?php //echo $fila_per['parcial3']; ?></td>
              <td><?php //echo $fila_per['parcial4']; ?></td>
            </tr>
      <?php  } ?>
      </table>

      <table width="100%" border="0">
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="center">__________________________</td>
        <td align="center">__________________________</td>
        <td align="center">__________________________</td>
       
      </tr>
      <tr>
        <td align="center" style="font-family: Arial; font-size: 14px;"><strong>Secretaria</strong></td>
        <td align="center" style="font-family: Arial; font-size: 14px;"><strong>Comision Interventora De C.E.N.G. Privados y Bilingues</strong></td>
        <td align="center" style="font-family: Arial; font-size: 14px;"><strong>Directora</strong></td>
        
      </tr>
     
      </table>
      <?php echo "<br />";echo "<br />";echo "<br />"; ?>

      <?php } ?>

      </body>

      </html>

 <?php } ?>

  ?>

 <?php 

//==============================================================
//==============================================================
//==============================================================
include("mpdf/mpdf.php");

$html = ob_get_clean();

//$html = utf8_encode($html);

$mpdf=new mPDF('c','Letter','',''); 

$mpdf->allow_charset_conversion= true;

$mpdf->charset_in='UTF-8';

$mpdf->SetDisplayMode('fullpage');

$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list

$mpdf->WriteHTML($html);

$mpdf->Output('Boleta de Calificaciones.pdf','I');

exit();
//==============================================================
//==============================================================
//==============================================================


?>