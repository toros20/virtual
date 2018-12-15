<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Crear un nuevo Curso</title>

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
                    Editar Curo
                </div>
                
                <form method = "POST" action ={{route('courses.store')}} >

                        @csrf

                        <p><label for="name">
                            Nombre del Curso 
                            <input type="text" name ="name" value=" {{old('name')}} ">
                        </label></p>

                        <p><label for="short_name">
                             Nombre Corto 
                            <input type="text" name ="short_name" value=" {{old('short_name')}} ">
                        </label></p>

                        <p><label for="is_semestral">
                            Semestral 
                             <select name="is_semestral">
                                <option value=0>Curso No semestral</option>
                                <option value=1>Curso Semestral</option>
                                
                            </select>
                        </label></p>

                        <p><label for="modality">
                            Modalidad
                            <select name="modality_id">
                                <option value=1>Pre-Basica</option>
                                <option value=2>Basica</option>
                                <option value=3>Media</option>
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
