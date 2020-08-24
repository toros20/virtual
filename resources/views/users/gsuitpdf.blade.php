<html>

 <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Lista de Usuarios</title>

    </head>
    <body>

        <h1>Listado de Usuarios de {{$curso}}-{{$seccion}} </h1>
     
        <h3><a href="{{route('users/gsuit')}} ">Volver</a></h3>
        <table>
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Password</th>
                <th>Organizacion</th>
                <th>Ver Acceso</th>
               
            </tr>
            </thead>

            <tbody>

                @foreach ($usuarios as $usuario)
                     <tr>
                        <td> {{$usuario->Firstname}} </a></td>
                        <td> {{$usuario->Lastname}}</td>
                        <td> {{$usuario->Email}}</td>
                        <td> {{$usuario->Password}}</td>
                        <td> {{$usuario->OrgUnitPath}}</td>
                        <td> <button onclick={{ $url = route( 'users/pdfGsuit/{email}',[$usuario->Email])}}>Ver Acceso</button></td>
                    </tr>
                @endforeach
            </tbody>
        
        <table>
        <br><br>

    </body>

</html>