<html>

 <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cursos</title>

    </head>
    <body>


        <h1>Ver cursos o <a href="{{route('courses.create')}} ">crear nuevo curso</a></h1>
        <table>
            <thead>
            <tr>
                <th>Nombre del Curso</th>
                <th>Nombre Corto</th>
                <th>Modalidad</th>
                <th>Semestral</th>
                
                <th>Acciones</th>
            </tr>
            </thead>

            <tbody>

                @foreach ($courses as $course)
                     <tr>
                        <td> <a href=" {{route('courses.show',$course->id)}} ">
                        {{$course->name}} </a></td>
                        <td> {{$course->short_name}}</td>
                        <td> {{$course->modality_id}}</td>
                        <td> {{$course->is_semestral}}</td>
                       
                       
                        <td> <a href=" {{route('courses.edit',$course->id)}} ">
                        Editar </a>
                            <form style="display:inline" method="POST" action=" {{route('courses.destroy',$course->id)}} ">
                                    @csrf
                                     {{ method_field('DELETE') }}
                                     <button type="submit">ELIMINAR </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        
        <table>

    </body>

</html>