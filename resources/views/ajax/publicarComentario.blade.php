{{-- <ul class="comments-list"> --}}
   
    <li class="comment-item">
        <div class="post__author author vcard inline-items">
                @if ($comentario[0]->role === 'student')
                    <img src="{{ URL::asset('img/boy.png')}}" >
                @else
                    <img src="{{ URL::asset('img/teacher.png')}}" >
                @endif

            <div class="author-date">
                <a class="h6 post__author-name fn" href="#">{{$comentario[0]->name}}</a>
                <div class="post__date">
                    <time class="published">
                        <td>{{ \Carbon\Carbon::parse($comentario[0]->fecha)->format('d/m/Y')}}</td>
                    </time>
                </div>
            </div>
        </div>

        <p>{{$comentario[0]->comentario}}</p>
        
    </li>
{{-- </ul> --}}