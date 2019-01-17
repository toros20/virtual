
<div class="comment-form inline-items" style="background-color: white; margin-bottom: 15px;">
    <p>Tus consultas o comentario serán vistos por todos los padres, docentes y alumnos de esta sección. Recuerda ser cortes y respetuoso.</p>
    <div class="post__author author vcard inline-items">
        <img src="../../img/teacher.png" alt="author">
        
        <input id="course" type="hidden" value="{{$curso}}">
        <input id="section" type="hidden" value=" {{$seccion}}">  
        <input id="user" type="hidden" value="{{$user}}">
        <input id="token" type="hidden" name="_token"  value="{{ csrf_token() }}">
        <input id="key" type="hidden" value="{{$key_msj}} ">  

        <div class="form-group with-icon-right ">
            <textarea required ='required' id="mensaje_{{$key_msj}}" class="form-control" placeholder=""></textarea>
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
    <button id="btn_publicar" onclick="publicar()" class="btn btn-md-2 btn-primary">Enviar</button>
</div>

<!-- ... end Comment Form  -->

