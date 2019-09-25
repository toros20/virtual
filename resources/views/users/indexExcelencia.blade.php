<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/3762dfca53.js" crossorigin="anonymous"></script>
    <style>
        .gold {
            color: gold;
        }
        .silver{
            color:silver;
        }
    </style>
    <title>Excelencia Académica 2019</title>
</head>
<body style="background-color:#f5f6f5">

        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
                
                <a class="navbar-brand" href="{{ $url = route('excelencia')}}">Excelencia Académica 2019</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown active m-2">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Admin
                                     </a>
                                     <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="{{ $url = route('addExcelencia')}} ">Add</a>
                                     </div>
                            </li>

                          <li class="nav-item dropdown active m-2">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             Primaria
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            
                                <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [3,'A'])}} ">Primer Grado A</a>
                                <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [3,'B'])}} ">Primer Grado B</a>
                                <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [3,'C'])}} ">Primer Grado C</a> 
                                <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [4,'A'])}} ">Segundo Grado A</a>
                                <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [4,'B'])}} ">Segundo Grado B</a>
                                <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [4,'C'])}} ">Segundo Grado C</a>  
                                <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [5,'A'])}} ">Tercer Grado A</a>
                                <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [5,'B'])}} ">Tercer Grado B</a>
                                <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [5,'C'])}} ">Tercer Grado C</a>
                                <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [5,'D'])}} ">Tercer Grado D</a>
                                <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [6,'A'])}} ">Cuarto Grado A</a>
                                <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [6,'B'])}} ">Cuarto Grado B</a>
                                <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [6,'C'])}} ">Cuarto Grado C</a>
                                <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [6,'D'])}} ">Cuarto Grado D</a>
                                <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [7,'A'])}} ">Quinto Grado A</a>
                                <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [7,'B'])}} ">Quinto Grado B</a>
                                <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [7,'C'])}} ">Quinto Grado C</a>
                                <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [8,'A'])}} ">Sexto Grado D</a>
                                <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [8,'B'])}} ">Sexto Grado A</a>
                                <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [8,'C'])}} ">Sexto Grado B</a>
                                <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [8,'D'])}} ">Sexto Grado C</a>
                            </div>
                          </li>

                          <li class="nav-item dropdown active m-2">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Secundaria Español
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [9,'U'])}} ">Séptimo U</a>
                                    <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [10,'U'])}} ">Octavo U</a>
                                    <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [11,'U'])}} ">Noveno U</a>  
                                    <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [12,'A'])}} ">Décimo A</a>  
                                    <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [12,'B'])}} ">Décimo B</a>  
                                    <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [13,'A'])}} ">Undécimo A</a>  
                                    <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [13,'B'])}} ">Undécimo B</a>   
                                    <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [14,'U'])}} ">II BTP-I U</a>  
                                    <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [15,'U'])}} ">III BTP-U</a> 
                            </div>
                            </li>

                          <li class="nav-item dropdown active m-2">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Secundaria Bilingue
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [16,'A'])}} ">Septimo Bilingue A</a>
                                        <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [16,'B'])}} ">Septimo Bilingue B</a>  
                                        <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [16,'C'])}} ">Septimo Bilingue C</a>  
                                        <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [17,'A'])}} ">Octavo Bilingue A</a>
                                        <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [17,'B'])}} ">Octavo Bilingue B</a>  
                                        <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [17,'C'])}} ">Octavo Bilingue C</a>   
                                        <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [18,'A'])}} ">Noveno Bilingue A</a>
                                        <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [18,'B'])}} ">Noveno Bilingue B</a>  
                                        <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [18,'C'])}} ">Noveno Bilingue C</a>
                                        <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [19,'A'])}} ">Décimo Bilingue A</a>
                                        <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [19,'B'])}} ">Décimo Bilingue B</a>  
                                        <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [19,'C'])}} ">Décimo Bilingue C</a>
                                        <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [20,'A'])}} ">Undécimo Bilingue A</a>
                                        <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [20,'B'])}} ">Undécimo Bilingue B</a>  
                                        <a class="dropdown-item" href="{{ $url = route('excelencias_by_id/{course_id}/{section}', [20,'C'])}} ">Undécimo Bilingue C</a> 
                                </div>
                            </li>
                        </ul>
                </div>
        </nav> 

        <div class="container" style="margin-top: 100px ">
            <h1>Estudiantes de Excelencia Académica</h1>
            <button class="btn btn-success btn-lg">Nuevo Estudiante</button>
            <div class="row">
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Foto</th>
                            <th scope="col">Curso</th>
                            <th scope="col">Section</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Cuenta</th>
                            <th scope="col">IP</th>
                            <th scope="col">IIP</th>
                            <th scope="col">IIIP</th>
                            <th scope="col">IVP</th>
                            <th scope="col">Felic...</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($excelencias as $excelencia)
                                <tr>
                                    @if ($excelencia->sexo == 'M')
                                        <td scope="col"><img width="70px" src="img/excelencia/boy.png " alt=""></td>
                                    @else
                                        <td scope="col"><img width="70px" src="img/excelencia/girl.png " alt=""></td>
                                    @endif
                                    
                                    <td scope="col">{{$excelencia->short_name}}</td>
                                    <td scope="col">{{$excelencia->section}}</td>
                                    <td scope="col">{{$excelencia->name}} {{$excelencia->lastname}} </td>
                                    <td scope="col">{{$excelencia->cuenta}}</td>
                                    <td scope="col">{{$excelencia->IP}} </td>
                                    <td scope="col">{{$excelencia->IIP}} </td>
                                    <td scope="col">{{$excelencia->IIIP}} </td>
                                    <td scope="col">{{$excelencia->IVP}} </td>
                                    <td scope="col">{{$excelencia->felicitaciones}} </th>
                                    <td scope="col"><button class="btn btn-sm btn-warning">Editar</button> </th>
                                    <td scope="col"><button class="btn btn-sm btn-danger">Eliminar</button> </th>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
       

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>