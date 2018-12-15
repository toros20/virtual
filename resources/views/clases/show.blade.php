<html>

 <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ver clase</title>

    </head>
    <body>       

        <h1>Ver curso {{ $clase->name }} </h1>

        <table>
            <thead>
            <tr>
                <th>Nombre de la clase</th>
                <th>Nombre Corto</th>
                <th>Descripci&oacute;n</th>
                <th>Semestre</th>
                <th>Oficial</th>

            </tr>
            </thead>

            <tbody>
                     <tr>
                        <td> {{$clase->name}} </td>
                        <td> {{$clase->short_name}}</td>
                        <td> {{$clase->descrption}}</td>
                        <td> {{$clase->semester}}</td>
                        <td> {{$clase->oficial}}</td>
                    </tr>
             
            </tbody>
        
        <table>

    </body>

</html>