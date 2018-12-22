<html>

 <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ver Asignaci&oacute;n</title>

    </head>
    <body>       

        <h1>Ver Asignaci&oacute;n {{ $sectioncourse->id }} </h1>

        <table>
            <thead>
            <tr>
               <th>A&ntilde;o</th>
                <th>Curso</th>                
                <th>Secci&oacute;n</th>

            </tr>
            </thead>

            <tbody>
                     <tr>
                        <td> {{$sectioncourse->year}} </a></td>
                        <td> {{$sectioncourse->course_id}}</td>
                        <td> {{$sectioncourse->section}}</td> 
                    </tr>
             
            </tbody>
        
        <table>

    </body>

</html>