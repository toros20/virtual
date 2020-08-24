<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Usuario Gsuit</title>

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
                    Usuarios Gsuit
                </div>

                <p><button class="btn-primary">
                            Craer acceso Nuevo
                        </button>
                        </p>
                
                <form method = "POST" action ={{ route('users/gsuitpdf') }} >

                        
                         <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                         <?php
                            //OJO CON EL SEMESTRE
                            $cursos =   DB::table('usuariosgsuit2020')
                                ->Select('curso')
                                ->distinct()
                                ->get(); 

                        ?>

                        <label for="cursos">
                            Selecciones Curso 
                             <select name="cursos" id="cursos" onchange="cargarsecciones_gsuit() >
                                @foreach ($cursos as $curso)
                                    <option value= {{ $curso->curso }}> {{ $curso->curso }}</option>
                                @endforeach
                            </select>

                        </label>

                        <p><label for="modality">
                            Seccion
                            <select name="secciones" id="secciones">
                             <option value=0>Seleccione Seccion</option>
            
                            </select>
                        </label></p>
                        <p>                          
                            <input type="submit"  value="Enviar">
                        </p>

                </form>
               
            </div>
        </div>
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.min.js""></script>
    <script type="text/javascript" language="javascript" src="{{ URL::asset('js/main.js')}}"></script>  

    </body>
</html>
