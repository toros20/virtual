
@foreach ($tasks as $task)
<tr>
                                    
    <td>{{$task->titulo}} </td>
    @if ($task->tipo==2)
        <td><i class="fas fa-home mr-5"></i> </td>
    @else                                                 
        <td><i class="fas fa-school mr-5"></i> </td>   
    @endif
    <td>{{ \Carbon\Carbon::parse($task->fecha_entrega)->format('d/m/Y')}}</td>
    
    <td>{{$task->valor}}%</td>
    
    @if ( $task->evaluada == 0)
        <td><button type="button" class="btn btn-info btn-rounded btn-sm m-0">Evaluar</button></td>
        <td><button type="button" class="btn btn-warning btn-rounded btn-sm m-0">Editar</button></td>
        <td><button type="button" class="btn btn-danger btn-rounded btn-sm m-0">Eliminar</button></td>
    @else 
        <td><button type="button" class="btn btn-success btn-rounded btn-sm m-0">Evaluada</button></td>
        <td><button type="button" class="btn btn-warning btn-rounded btn-sm m-0">Editar</button></td>
        <td><button disabled type="button" class="btn btn-default btn-rounded btn-sm m-0">Eliminar</button></td>
    @endif
    
    
</tr>
@endforeach
