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
            </tr>
            </thead>

            <tbody>

                @foreach ($users as $user)
                     <tr>
                        <td> {{$user->name}} </td>
                        <td> {{$user->lastname}}</td>
                        <td> {{$user->cuenta}}</td>
                        <td> {{$user->role}}</td>
                        <td> {{$user->email}}</td>
                        <td> {{$user->fecha_nacimiento}}</td>
                        <td> {{$user->activo}}</td>
                    </tr>
                @endforeach
            </tbody>
        
        <table>

    </body>

</html>