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
    
        <div class="content">

            <div class="title m-b-md">
                    Crear un nuevo estudiante de Excelencia Académica
                </div>
                
                <form method = "POST" action ={{route('excelencia.store')}} >

                        {{-- @csrf --}}
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                        <p><label for="cuenta">
                            Cuenta 
                            <input type="text" name ="cuenta" value=" {{old('cuenta')}} " >
                        </label></p>

                        <p><label for="IP">
                             IP
                            <input type="text" name ="IP" value=" {{old('IP')}} ">
                        </label></p>

                        <p><label for="IIP">
                            IIP
                            <input type="text" name ="IIP" value=" {{old('IIP')}} ">
                        </label></p>

                        <p><label for="IIIP">
                            IIIP
                            <input type="text" name ="IIIP" value=" {{old('IIIP')}} ">
                        </label></p>

                        <p><label for="IVP">
                            IVP
                            <input type="text" name ="IVP" value=" {{old('IVP')}} ">
                        </label></p>

                        <p>                          
                            <input type="submit"  value="Enviar">
                        </p>

                </form>
                
            </div>
        </div>
</body>
</html>