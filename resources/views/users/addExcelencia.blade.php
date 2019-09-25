<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/3762dfca53.js" crossorigin="anonymous"></script>
    
    <title>Add New Excelencia</title>
</head>
<body style="background-color:#f5f6f5">
    
        <div class="container">

            <div class="row">
                <div class="col-md-3 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            Crear un nuevo estudiante de Excelencia Académica
                        </div>
                        <div class="card-body">
                            <form method = "POST" action ={{route('excelencia.store')}} >

                                {{-- @csrf --}}
                                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                                <p><label for="cuenta">
                                    Cuenta 
                                    <input maxlength="8" required class="form-control" type="text" name ="cuenta" value=" {{old('cuenta')}} " >
                                </label></p>

                                <p><label for="IP">
                                    IP
                                    <input max="100" maxlength="3" required class="form-control" type="text" name ="IP" value=" {{old('IP')}} ">
                                </label></p>

                                <p><label  for="IIP">
                                    IIP
                                    <input max="100" maxlength="3" required class="form-control" type="text" name ="IIP" value=" {{old('IIP')}} ">
                                </label></p>

                                <p><label for="IIIP">
                                    IIIP
                                    <input max="100" maxlength="3" required class="form-control" type="text" name ="IIIP" value=" {{old('IIIP')}} ">
                                </label></p>

                                <p><label for="IVP">
                                    IVP
                                    <input max="100" maxlength="3" required class="form-control" type="text" name ="IVP" value=" {{old('IVP')}} ">
                                </label></p>

                                <p>                          
                                    <input class="btn btn-success btn-block" type="submit"  value="Enviar">
                                </p>

                            </form>
                        </div>
                    </div>
                   
                </div>
            </div>              
               
                
            </div>
        </div>
</body>
</html>