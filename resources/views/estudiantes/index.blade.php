<html>

 <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Estudiante</title>

    </head>
    <body>

        <h1>Ver estudiantes</h1>

        <table>
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Cuenta</th>
                <th>Fecha Nacimiento</th>
                <th>Activo</th>
            </tr>
            </thead>

            <tbody>

                @foreach ($estudiantes as $estudiante)
                     <tr>
                        <td> {{$estudiante->nombres}} </td>
                        <td> {{$estudiante->apellidos}}</td>
                        <td> {{$estudiante->cuenta}}</td>
                        <td> {{$estudiante->fecha_nacimiento}}</td>
                        <td> {{$estudiante->activo}}</td>
                    </tr>
                @endforeach
            </tbody>
        
        <table>

    </body>

</html>