<select name="clases_id" id="clases">
 
   <option value=-1 >Seleccione Clase</option>

    @foreach ($clasescourses as $clasescourse)

        <option value= {{ $clasescourse->clase->id }} >{{ $clasescourse->clase->name }} ({{ $clasescourse->clase->description }})</option>

    @endforeach 

</select>