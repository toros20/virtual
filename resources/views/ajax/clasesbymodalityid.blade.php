<select name="clases_id" id="clases">
 
   <option value=-1 >Seleccione Clase</option>

    @foreach ($clases as $clase)

        <option value= {{ $clase->id }} >{{ $clase->name }} ({{ $clase->description }}) ({{ $clase->semester }} Semestre)</option>

    @endforeach 

</select>