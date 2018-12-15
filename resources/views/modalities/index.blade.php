<html>

 <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Modalidades</title>

    </head>
    <body>


        <h1>Ver Modalidades o <a href="{{route('modalities.create')}} ">crear nueva modalidad</a></h1>
        <table>
            <thead>
            <tr>
                <th>Nombre de la Modalidad</th>
                <th>Descripci&oacute;n</th>                
                <th>Acciones</th>
            </tr>
            </thead>

            <tbody>

                @foreach ($modalities as $modality)
                     <tr>
                        <td> <a href=" {{route('modalities.show',$modality->id)}} ">
                        {{$modality->name}} </a></td>
                        <td> {{$modality->description}}</td>                     
                       
                        <td> <a href=" {{route('modalities.edit',$modality->id)}} ">
                        Editar </a>
                            <form style="display:inline" method="POST" action=" {{route('modalities.destroy',$modality->id)}} ">
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