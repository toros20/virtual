 <select name="section" id="section">
 
   <option value=-1 >Seleccione Secci&oacute;n</option>

    @foreach ($sections as $section)

        <option value= {{ $section->section }} >{{ $section->section }}</option>

    @endforeach 

</select>