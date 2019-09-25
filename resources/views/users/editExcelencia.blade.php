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

            <div class="row p-4">
                <div class="col-md-3 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            Crear un nuevo estudiante de Excelencia Académica
                        </div>
                        <div class="card-body">
                            <form method = "POST" action ={{route('editExcelencia')}} enctype="multipart/form-data" >

                                {{-- @csrf --}}
                                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                                <p><label for="cuenta">
                                    Cuenta 
                                    <input maxlength="8" required class="form-control" type="text" name ="cuenta" value="{{$excelencia->cuenta}}" autofocus placeholder="20190000">
                                </label></p>

                                <p><label for="IP">
                                    IP
                                    <input max="100" min="0" required class="form-control" type="number" name ="IP" value="{{$excelencia->IP}}">
                                </label></p>

                                <p><label  for="IIP">
                                    IIP
                                    <input max="100" min="0" required class="form-control" type="number" name ="IIP" value="{{$excelencia->IIP}}">
                                </label></p>

                                <p><label for="IIIP">
                                    IIIP
                                    <input max="100" min="0" required class="form-control" type="number" name ="IIIP" value="{{$excelencia->IIIP}}">
                                </label></p>

                                <p><label for="IVP">
                                    IVP
                                    <input max="100" min="0" required class="form-control" type="number" name ="IVP" value="{{$excelencia->IVP}}">
                                </label></p>

                                <img width="70px" src="{{ URL::asset('../storage/app/'.$excelencia->foto)}}" alt="">
                           
                                <div class="file-field">
                                      <div class="btn btn-primary btn-sm float-left">
                                        <span>Seleccione Imagen</span>
                                        <p><input name ="foto" id="foto" type="file"></p>
                                      </div>
                                      <div class="file-path">
                                        <input value="{{$excelencia->foto}}" class="file-path validate" type="text" placeholder="Subir Imagen">
                                      </div>
                                  </div>
                             

                                <p>                          
                                    <input class="btn btn-success btn-block p-2" type="submit"  value="Enviar">
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