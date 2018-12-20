

 <select name="course_id" id="courses">
 
   <option value=-1 >Seleccione Curso</option>

    @foreach ($courses as $course)

        <option value= {{ $course->id }} >{{ $course->name }}</option>

    @endforeach 

</select>