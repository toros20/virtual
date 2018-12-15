<html>

 <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ver curso</title>

    </head>
    <body>       

        <h1>Ver curso {{ $course->name }} </h1>

        <table>
            <thead>
            <tr>
               <th>Nombre del Curso</th>
                <th>Nombre Corto</th>
                <th>Modalidad</th>
                <th>Semestral</th>

            </tr>
            </thead>

            <tbody>
                     <tr>
                        <td> {{$course->name}} </td>
                        <td> {{$course->short_name}}</td>
                        <td> {{$course->modality_id}}</td>
                        <td> {{$course->is_semestral}}</td>
                    </tr>
             
            </tbody>
        
        <table>

    </body>

</html>