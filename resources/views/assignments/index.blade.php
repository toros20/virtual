<html>

 <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Asignaciones</title>

    </head>
    <body>


        <h1>Ver Asignaciones <a href="{{route('assignments.create')}} ">Crear una Nueva Asignaci&oacute;n </a></h1>
        <table>
            <thead>
            <tr>
                <th>A&ntilde;o</th>
                <th>Docente</th>                
                <th>Curso</th>
                <th>Secci&oacute;n</th>
                <th>Clase</th>
            </tr>
            </thead>

            <tbody>

                @foreach ($assignments as $assignment)
                     <tr>
                        <td> {{$assignment->year}} </td>
                        <td> {{$assignment->user->name}} {{$assignment->user->lastname}}</td>
                        <td> {{$assignment->course->name}}</td>
                        <td> {{$assignment->section}}</td>
                        <td> {{$assignment->clase->name}}</td>                     
                       
                        <td> 
                            <form style="display:inline" method="POST" action=" {{route('assignments.destroy',$assignment->id)}} ">
                                    @csrf
                                     {{ method_field('DELETE') }}
                                     <button type="submit">ELIMINAR </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        
        <table>

        <div>
            {{-- para visualizar data {{  response()->json([$clasecourses]) }} --}}
        </div>

    </body>

</html>