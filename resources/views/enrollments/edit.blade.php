<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Transferir Matricula</title>

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
                    Transferir Matricula de:
                    <p> {{$enrollments[0]->name }} {{$enrollments[0]->lastname }} ({{$enrollments[0]->cuenta}}) </p>
                </div>
                
                <form method = "POST" action ={{route('enrollments.update',$enrollments[0]->enrollment_id)}} >

                        @csrf
                        {{ method_field('PUT') }}
                       
                            <input  type="hidden" name ="name" value=" {{$enrollments[0]->year}} ">
                            <input type="hidden" name ="user_id" value=" {{$enrollments[0]->user_id}} ">
                    
                        <p><label for="description">
                            Curso
                            <select name="course_id" > Seleccione Curso

                                @foreach ($courses as $course)
                                    <option value= {{ $course->id }} >{{ $course->short_name}}</option>
                                @endforeach

                            </select>
                        </label></p>

                        <p><label for="section">
                            Sección
                             <select name="section" > Seleccione Sección
                                <option value='U'>U</option>
                                <option value='A'>A</option>
                                <option value='B'>B</option>
                                <option value='C'>C</option>
                                <option value='D'>D</option>
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
