<select name="secciones" id="secciones">
 
   <option value=-1 >Seleccione Secci&oacute;n</option>

    @foreach ($secciones as $s)

        <option value= {{ $s->seccion }} >{{ $s->seccion }}</option>

    @endforeach 

</select>