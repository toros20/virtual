<html>

 <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ver modalidad</title>

    </head>
    <body>       

        <h1>Ver curso {{ $modality->name }} </h1>

        <table>
            <thead>
            <tr>
               <th>Nombre de la Modalidad</th>
                <th>Descripci&oacute;n</th>
            </tr>
            </thead>

            <tbody>
                     <tr>
                        <td> {{$modality->name}} </td>
                        <td> {{$modality->description}}</td>
                    </tr>
             
            </tbody>
        
        <table>

    </body>

</html>