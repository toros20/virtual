<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Crear un nuevo Estudiante</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 24px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">

            <div class="title m-b-md">
                    Crear un nuevo estudiante
                </div>
                
                <form method = "POST" action ={{route('users.store')}} >

                        @csrf

                        <p><label for="nombre">
                            Nombres 
                            <input type="text" name ="name" value=" {{old('name')}} ">
                        </label></p>

                        <p><label for="apellido">
                            Apellidos 
                            <input type="text" name ="lastname" value=" {{old('lastname')}} ">
                        </label></p>

                        <p><label for="cuenta">
                            Cuenta 
                            <input type="text" name ="cuenta" value=" {{old('cuenta')}} " >
                        </label></p>
                                                   
                        <input type="hidden" name ="role" value="student">
                        <input type="hidden" name ="activo" value=1>

                        <p><label for="email">
                            Correo Electr&oacute;nico 
                            <input type="email" name ="email" value=" {{old('email')}} ">
                        </label></p>

                        <p><label for="password">
                            Elije una Constrase&ntilde;a 
                            <input type="password" name ="password" value=" {{old('password')}} ">
                        </label></p>

                        <p><label for="fecha_nacimiento">
                            Fecha de Nacimiento 
                            <input type="text" name ="fecha_nacimiento" value=" {{old('fecha_nacimiento')}} ">
                        </label></p>

                         <p><label for="modality_id">
                            Modalidad 
                             <select name="modality_id">
                                @foreach ($modalities as $modality)
                                    <option value= {{ $modality->id }} >{{ $modality->name }}</option>
                                @endforeach
                            </select>
                        </label></p>

                         <p><label for="course_id">
                            Curso 
                             <select name="course_id">
                                @foreach ($courses as $course)
                                    <option value= {{ $course->id }} >{{ $course->name }}</option>
                                @endforeach
                            </select>
                        </label></p>

                         <p><label for="section">
                            Secci&oacute;n 
                             <select name="section">
                                <option value=1>U</option>
                                <option value=2>A</option>
                                <option value=3>B</option>
                                <option value=4>C</option>
                                <option value=5>D</option>
                            </select>
                        </label></p>

                        <p>                          
                            <input type="submit"  value="Enviar">
                        </p>

                </form>
               
            </div>
        </div>
    </body>
</html>
