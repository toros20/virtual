<html>

 <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ver usuario</title>

    </head>
    <body>       

        <h1>Ver usuario {{ $user->name }} - {{ $user->lastname }}</h1>

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
                     <tr>
                        <td> {{$user->name}} </td>
                        <td> {{$user->lastname}}</td>
                        <td> {{$user->cuenta}}</td>
                        <td> {{$user->role}}</td>
                        <td> {{$user->email}}</td>
                        <td> {{$user->fecha_nacimiento}}</td>
                        <td> {{$user->activo}}</td>
                    </tr>
             
            </tbody>
        
        <table>

    </body>

</html>