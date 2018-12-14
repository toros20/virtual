<html>

 <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>usuarios</title>

    </head>
    <body>

        <h1>Ver usuarios</h1>

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

                @foreach ($users as $user)
                     <tr>
                        <td> <a href=" {{route('users.show',$user->id)}} ">
                        {{$user->name}} </a></td>
                        <td> {{$user->lastname}}</td>
                        <td> {{$user->cuenta}}</td>
                        <td> {{$user->role}}</td>
                        <td> {{$user->email}}</td>
                        <td> {{$user->fecha_nacimiento}}</td>
                        <td> {{$user->activo}}</td>
                        <td> <a href=" {{route('users.edit',$user->id)}} ">
                        Editar </a>
                            <form style="display:inline" method="POST" action=" {{route('users.destroy',$user->id)}} ">
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