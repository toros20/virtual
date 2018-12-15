<html>

 <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Clases</title>

    </head>
    <body>


        <h1>Ver Clases o <a href="{{route('clases.create')}} ">crear nueva clase</a></h1>
        <table>
            <thead>
            <tr>
                <th>Nombre de la clase</th>
                <th>Nombre Corto</th>
                <th>Descripci&oacute;n</th>
                <th>Semestre</th>
                <th>Oficial</th>
                <th>Acciones</th>
            </tr>
            </thead>

            <tbody>

                @foreach ($clases as $clase)
                     <tr>
                        <td> <a href=" {{route('clases.show',$clase->id)}} ">
                        {{$clase->name}} </a></td>
                        <td> {{$clase->short_name}}</td>
                        <td> {{$clase->description}}</td>
                        <td> {{$clase->semester}}</td>
                        <td> {{$clase->oficial}}</td>
                       
                       
                        <td> <a href=" {{route('clases.edit',$clase->id)}} ">
                        Editar </a>
                            <form style="display:inline" method="POST" action=" {{route('clases.destroy',$clase->id)}} ">
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