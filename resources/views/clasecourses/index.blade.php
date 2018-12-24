<html>

 <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Clase a Cursos</title>

    </head>
    <body>


        <h1>Ver Clase en Cursos o <a href="{{route('clasecourses.create')}} ">Asignar Nueva Clase a Curso </a></h1>
        <table>
            <thead>
            <tr>
                <th>A&ntilde;o</th>
                <th>Curso</th>                
                <th>Clase</th>
                <th>Descripci&oacute;n</th>
            </tr>
            </thead>

            <tbody>

                @foreach ($clasecourses as $clasecourse)
                     <tr>
                        <td> {{$clasecourse->year}} </td>
                        <td> {{$clasecourse->course->name}}</td>
                        <td> {{$clasecourse->clase->name}}</td>
                        <td> {{$clasecourse->clase->description}}</td>                     
                       
                        <td> 
                            <form style="display:inline" method="POST" action=" {{route('clasecourses.destroy',$clasecourse->id)}} ">
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