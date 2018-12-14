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
                    Editar a  {{$user->name}} - {{$user->lastname}}
                </div>
                
                <form method = "POST" action=" {{route('users.update', $user->id)}} ">
                       
                         {{ method_field('PUT') }}
                        @csrf

                        <p><label for="nombre">
                            Nombres 
                            <input type="text" name ="name"  value=" {{$user->name}} ">
                        </label></p>

                        <p><label for="apellido">
                            Apellidos 
                            <input type="text" name ="lastname" value=" {{$user->lastname}} ">
                        </label></p>

                        <p><label for="cuenta">
                            Cuenta 
                            <input type="text" name ="cuenta" value=" {{$user->cuenta}} ">
                        </label></p>
                                                   
                        <input type="hidden" name ="role" value="estudiante">

                        
                        <p><label for="email">
                            Estudiante Activo 
                           <input type="text " name ="activo" value=" {{$user->activo}} ">
                        </label></p>

                        <p><label for="email">
                            Correo Electr&oacute;nico 
                            <input type="email" name ="email" value=" {{$user->email}} ">
                        </label></p>

                        <p><label for="fecha_nacimiento">
                            Fecha de Nacimiento 
                            <input type="text" name ="fecha_nacimiento" value=" {{$user->fecha_nacimiento}} ">
                        </label></p>

                        <p>                          
                            <input type="submit"  value="Enviar">
                        </p>

                </form>
               
            </div>
        </div>
    </body>
</html>
