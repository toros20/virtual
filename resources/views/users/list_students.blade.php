<html>

 <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Lista estudiantes</title>

    </head>
    <body>

        <h1>Listado de Estudiantes de {{$curso->short_name}}-{{$section}} <a href="{{route('users.students.create')}} ">crear nuevo estudiante</a></h1>
     
        <h3><a href="{{route('users_panel_admin/{user_id}', $usuario->id)}} ">Volver al Panel</a></h3>
        <table>
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Cuenta</th>
                <th>Email</th>
                <th>Email 2</th>
                <th>Editar</th>
                <th>Matricula</th>
            </tr>
            </thead>

            <tbody>

                @foreach ($students as $student)
                     <tr>
                        <td> <a href=" {{route('users.show',$student->id)}} ">
                        {{$student->name}} </a></td>
                        <td> {{$student->lastname}}</td>
                        <td> {{$student->cuenta}}</td>
                        <td> {{$student->email}}</td>
                        <td> {{$student->email2}}</td>
                        <td> <a href=" {{route('users.edit',$student->id)}} ">
                            Editar </a>
                        </td>
                        <td> <a href=" {{route('enrollments.edit',$student->enrollment_id)}} ">
                            Transferir </a>
                        </td>
                           {{--  <form style="display:inline" method="POST" action=" {{route('users.destroy',$student->id)}} ">
                                    @csrf
                                     {{ method_field('DELETE') }}
                                     <button type="submit">ELIMINAR </button>
                            </form> --}}
                        
                    </tr>
                @endforeach
            </tbody>
        
        <table>

    </body>

</html>