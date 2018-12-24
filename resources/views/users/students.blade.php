<html>

 <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>usuarios estudiantes</title>

    </head>
    <body>

        <h1>Modulo de Estudiantes o <a href="{{route('users.students.create')}} ">crear nuevo estudiante</a></h1>

        <table>
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Cuenta</th>
                <th>Rol</th>
                <th>email</th>
                <th>Fecha Nacimiento</th>
                <th>Activo</th>
                <th>Acciones</th>
            </tr>
            </thead>

            <tbody>

                @foreach ($students as $student)
                     <tr>
                        <td> <a href=" {{route('users.show',$student->id)}} ">
                        {{$student->name}} </a></td>
                        <td> {{$student->lastname}}</td>
                        <td> {{$student->cuenta}}</td>
                        <td> {{$student->role}}</td>
                        <td> {{$student->email}}</td>
                        <td> {{$student->fecha_nacimiento}}</td>
                        <td> {{$student->activo}}</td>
                        <td> <a href=" {{route('users.edit',$student->id)}} ">
                        Editar </a>
                            <form style="display:inline" method="POST" action=" {{route('users.destroy',$student->id)}} ">
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