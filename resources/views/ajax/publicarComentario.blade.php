{{-- <ul class="comments-list"> --}}
   
    <li class="comment-item">
        <div class="post__author author vcard inline-items">
                @if ($comentario[0]->role === 'student')
                    <img src="../../img/boy.png" >
                @else
                    <img src="../../img/teacher.png" >
                @endif

            <div class="author-date">
                <a class="h6 post__author-name fn" href="#">{{$comentario[0]->name}}</a>
                <div class="post__date">
                    <time class="published">
                        {{$comentario[0]->fecha}}
                    </time>
                </div>
            </div>
        </div>

        <p>{{$comentario[0]->comentario}}</p>
        
    </li>
{{-- </ul> --}}