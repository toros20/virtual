 
 <article class="hentry post">
					
        <div class="post__author author vcard inline-items">
            <img src="../../img/teacher.png" alt="author">
    
            <div class="author-date">
                    @if ($mensaje[0]->role === 'student')
                    <a class="h6 post__author-name fn" href="#">Estudiante: - {{$mensaje[0]->name}} {{$mensaje[0]->lastname}}</a>
                    @else
                    <a class="h6 post__author-name fn" href="#">Lic. - {{$mensaje[0]->name}} {{$mensaje[0]->lastname}}</a>
                    @endif
                    
                
                <div class="post__date">
                    <time class="published" datetime="2017-03-24T18:18">
                            {{$mensaje[0]->fecha}}
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
    
        <p> {{$mensaje[0]->mensaje}}</p>
    
        <div class="post-additional-info inline-items">
    
            <a href="#" class="post-add-icon inline-items">
                <svg class="olymp-heart-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
                <span> {{$mensaje[0]->megusta}} Me gusta</span>
            </a>					
    
            <div class="comments-shared">
                <a href="#" class="post-add-icon inline-items">
                    <svg class="olymp-speech-balloon-icon"><use xlink:href="../../svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use></svg>
                    <span>2 Comentarios</span>
                </a>
    
            </div>
    
        </div>
    
    </article> 

   