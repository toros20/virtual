<ul id="lista_{{$comentarios[0]->msj_key}}" class="comments-list">
   
    @foreach ($comentarios as $comentario)
    
    <li class="comment-item">
        <div class="post__author author vcard inline-items">
            @if ($comentario->role == 'student')
                <img src="{{ URL::asset('img/boy.png')}}" >
                <div class="author-date">
                    <a class="h6 post__author-name fn" href="#">Estudiante:| {{$comentario->name}}</a>
                    <div class="post__date">
                        <time class="published">
                            {{$comentario->fecha}}
                        </time>
                    </div>
                </div>
            @else
                <img src="{{ URL::asset('img/teacher.png')}}" >
                <div class="author-date">
                    <a class="h6 post__author-name fn" href="#">Lic:|{{$comentario->name}}</a>
                    <div class="post__date">
                        <time class="published">
                            {{$comentario->fecha}}
                        </time>
                    </div>
                </div>
            @endif

        </div>

        <p>{{$comentario->comentario}}</p>
        
    </li>

    @endforeach
</ul>
<div align="center" id="circle{{$comentario->msj_key}}"></div>

@if ($comentario->role == 'student')

<div align="center"><h5>Comentar este Post</h5> </div>
<div class="comment-form inline-items" style="background-color: white; margin-bottom: 15px;">
        <p>Tus consultas o comentario serán vistos por todos los padres, docentes y alumnos de esta sección. Recuerda ser cortes y respetuoso.</p>
        <div class="post__author author vcard inline-items">
            {{-- <img src="{{ URL::asset('img/boy.png')}}" alt="author"> --}}
           
            <input id="token" type="hidden" name="_token"  value="{{ csrf_token() }}">
            <div class="form-group with-icon-right ">
                <textarea required ='required' id="mensaje_{{$comentarios[0]->msj_key}}" class="form-control" placeholder=""></textarea>
                <div class="add-options-message">
                   {{--  <a href="#" class="options-message" data-toggle="modal" data-target="#update-header-photo">
                        <svg class="olymp-camera-icon">
                            <use xlink:href="../../svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                        </svg> 
                    </a> --}}
                </div>
            </div>
        </div>
        <button id="btn_publicar" onclick="publicarComentario('{{$comentarios[0]->msj_key}}')" class="btn btn-md-2 btn-primary">Enviar</button>
    </div>
@else

<div align="center"><h5>Comentar este Post</h5> </div>
<div class="comment-form inline-items" style="background-color: white; margin-bottom: 15px;">
    <p>Tus consultas o comentario serán vistos por todos los padres, docentes y alumnos de esta sección. Recuerda ser cortes y respetuoso.</p>
    <div class="post__author author vcard inline-items">
        {{-- <img src="{{ URL::asset('img/teacher.png')}}" alt="author"> --}}
       
        <input id="token" type="hidden" name="_token"  value="{{ csrf_token() }}">

        <div class="form-group with-icon-right ">
            <textarea required ='required' id="mensaje_{{$comentarios[0]->msj_key}}" class="form-control" placeholder=""></textarea>
            <div class="add-options-message">
                {{-- <a href="#" class="options-message" data-toggle="modal" data-target="#update-header-photo">
                    <svg class="olymp-camera-icon">
                        <use xlink:href="../../svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                    </svg>
                </a> --}}
            </div>
        </div>
    </div>
    <button id="btn_publicar" onclick="publicarComentario('{{$comentarios[0]->msj_key}}')" class="btn btn-md-2 btn-primary">Enviar</button>
</div>
@endif


