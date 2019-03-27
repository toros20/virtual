
@foreach ($tasks as $task)
<tr>
                                    
    
    @if ($task->tipo==2)
        <td><i class="fas fa-home mr-5 fa-2x"></i> </td>
    @else                                                 
        <td><i class="fas fa-school mr-5 fa-2x"></i> </td>   
    @endif
    <td>{{$task->titulo}} </td>
    <td>{{ \Carbon\Carbon::parse($task->fecha_entrega)->format('d/m/Y')}}</td>
    
    <td>{{$task->valor}}%</td>
    
    @if ( $task->evaluada == 0)
        <td><button type="button" class="btn btn-info btn-rounded btn-sm m-0">Evaluar</button></td>
        <td><button type="button" class="btn btn-warning btn-rounded btn-sm m-0">Editar</button></td>
        <td><button onclick="eliminar_task({{$task->id}},{{$curso_actual}},'{{$section_actual}}')" type="button" class="btn btn-danger btn-rounded btn-sm m-0">Eliminar</button></td>
    @else 
        <td><button type="button" class="btn btn-success btn-rounded btn-sm m-0">Evaluada</button></td>
        <td><button type="button" class="btn btn-warning btn-rounded btn-sm m-0">Editar</button></td>
        <td><button disabled type="button" class="btn btn-default btn-rounded btn-sm m-0">Eliminar</button></td>
    @endif
    
    
</tr>
@endforeach
  <!--Este div recibira el resultado de el modal para evaluar alumnos-->
  <div id="div_modal_evaluar"></div>                    
  <!--Este div recibira el resultado de el modal para evaluar alumnos-->
