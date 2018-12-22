<html>

 <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Secciones a Cursos</title>

    </head>
    <body>


        <h1>Ver Secciones en Cursos o <a href="{{route('sectioncourses.create')}} ">Asignar Nueva Secci&oacute;n a Curso </a></h1>
        <table>
            <thead>
            <tr>
                <th>A&ntilde;o</th>
                <th>Curso</th>                
                <th>Secci&oacute;n</th>
            </tr>
            </thead>

            <tbody>

                @foreach ($sectioncourses as $sectionescourse)
                     <tr>
                        <td> <a href=" {{route('sectioncourses.show',$sectionescourse->id)}} ">
                        {{$sectionescourse->year}} </a></td>
                        <td> {{$sectionescourse->course_id}}</td>
                        <td> {{$sectionescourse->section}}</td>                     
                       
                        <td> <a href=" {{route('sectioncourses.edit',$sectionescourse->id)}} ">
                        Editar </a>
                            <form style="display:inline" method="POST" action=" {{route('sectioncourses.destroy',$sectionescourse->id)}} ">
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