<div class="modal-dialog window-popup update-header-photo" role="document">
        <div class="modal-content">
            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                <svg class="olymp-close-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
            </a>

            <div class="modal-header">
                <h6 class="title">Mensajes enviados por Lic. {{$mensajes[0] ->lastname}}</h6>
            </div>

            <div class="modal-body">
                @foreach ($mensajes as $mensaje)
                    <article class="hentry post">
                
                        <div class="post__author author vcard inline-items">
                            <img src="../../img/teacher.png" alt="author">
                    
                            <div class="author-date">
                                    @if ($mensaje->role === 'student')
                                    <a class="h6 post__author-name fn" href="#">Estudiante: |  {{$mensaje->name}} {{$mensaje->lastname}}</a>
                                    @else
                                    <a class="h6 post__author-name fn" href="#">Lic. |  {{$mensaje->name}} {{$mensaje->lastname}}</a>
                                    @endif
                                
                                <div class="post__date">
                                    <time class="published" >
                                            <td>{{ \Carbon\Carbon::parse($mensaje->fecha)->format('d/m/Y')}}</td>
                                    </time>
                                </div>
                            </div>
                    
                            {{-- <div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                                <ul class="more-dropdown">
                                    <li>
                                        <a href="#">Edit Post</a>
                                    </li>
                                    <li>
                                        <a href="#">Delete Post</a>
                                    </li>
                                    <li>
                                        <a href="#">Turn Off Notifications</a>
                                    </li>
                                    <li>
                                        <a href="#">Select as Featured</a>
                                    </li>
                                </ul>
                            </div> --}}
                    
                        </div>

                        @if ($mensaje->tipo != 'seccion')
                            <div align="center">
                                <a target="_blank" href="{{ URL::asset('../storage/app/'.$mensaje->tipo)}}">
                                    <img class="img-fluid mx-auto" src="{{ URL::asset('../storage/app/'.$mensaje->tipo)}}" >
                                </a>
                            </div>
                        @endif
                    
                        <p> {{$mensaje->mensaje}}</p>
                    
                        <div class="post-additional-info inline-items">
                    
                             {{--<a href="#" class="post-add-icon inline-items">
                                <svg class="olymp-heart-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
                                <span> {{$mensaje->megusta}} Me gusta</span> 
                            </a>--}}
                    
                            <div class="comments-shared">
                                <a href="#" class="post-add-icon inline-items">
                                    <svg class="olymp-speech-balloon-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use></svg>
                                    <span>2 Comentarios</span>
                                </a>
                    
                            </div>
                    
                        </div>
                    
                    </article>
                @endforeach
            </div>
        </div>
    </div> 