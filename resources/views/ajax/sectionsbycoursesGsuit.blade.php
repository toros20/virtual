
<select name="secciones" id="secciones">
 
   <option value=-1 >Seleccione Secci&oacute;n</option>

    @foreach ($secciones as $seccion)

        <option value= {{ $seccion->seccion }} >{{ $seccion->seccion }}</option>

    @endforeach 

</select>