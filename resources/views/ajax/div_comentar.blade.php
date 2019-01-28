
<div class="comment-form inline-items" style="background-color: white; margin-bottom: 15px;">
    <p>Tus consultas o comentario serán vistos por todos los padres, docentes y alumnos de esta sección. Recuerda ser cortes y respetuoso.</p>
    <div class="post__author author vcard inline-items">
         {{--    @if ($user->role === 'student')
                <img src="{{ URL::asset('img/boy.png')}}" >
            @else
                <img src="{{ URL::asset('img/teacher.png')}}" >
            @endif --}}
        
        <input id="courseC" type="hidden" value="{{$curso}}">
        <input id="sectionC" type="hidden" value=" {{$seccion}}">  
        <input id="userC" type="hidden" value="{{$user}}">
        <input id="tokenC" type="hidden" name="_token"  value="{{ csrf_token() }}">
        <input id="keyC" type="hidden" value="{{$key_msj}}">  

        <div class="form-group with-icon-right ">
            <textarea required ='required' id="comentario_{{$key_msj}}" class="form-control" placeholder=""></textarea>
           {{-- comentar con imagen
            <div class="add-options-message">
                <a href="#" class="options-message" data-toggle="modal" data-target="#update-header-photo">
                    <svg class="olymp-camera-icon">
                        <use xlink:href="../../svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                    </svg>
                </a>
            </div> --}}
        </div>
    </div>
    <button id="btn_publicar" onclick="enviar_comentario('{{$key_msj}}')" class="btn btn-md-2 btn-primary">Enviar</button>
</div>

<!-- ... end Comment Form  -->

