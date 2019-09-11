<html>

 <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>usuarios docentes</title>

    </head>
    <body>

        <h1>Modulo de Docentes o <a href="{{route('users.teachers.create')}} ">crear nuevo docente</a></h1>

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

                @foreach ($teachers as $teacher)
                     <tr>
                        <td> <a href=" {{route('users.show',$teacher->id)}} ">
                        {{$teacher->name}} </a></td>
                        <td> {{$teacher->lastname}}</td>
                        <td> {{$teacher->cuenta}}</td>
                        <td> {{$teacher->role}}</td>
                        <td> {{$teacher->email}}</td>
                        <td> {{$teacher->fecha_nacimiento}}</td>
                        <td> {{$teacher->activo}}</td>
                        <td> 
                            <a href=" {{route('users.password_edit',$teacher->id)}}">Password</a>
                            <a href=" {{route('users.edit',$teacher->id)}} ">
                        Editar </a>
                            <form style="display:inline" method="POST" action=" {{route('users.destroy',$teacher->id)}} ">
                                 {{--    @csrf
                                     {{ method_field('DELETE') }}
                                     <button type="submit">ELIMINAR </button> --}}
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        
        <table>

    </body>

</html>