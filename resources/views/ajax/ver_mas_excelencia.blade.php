@foreach ($excelencias as $excelencia)
<div class="col-md-3">
    <div class="card" style="width: 100%; ">
            @if ($excelencia->foto === 'user')
                @if ($excelencia->sexo === 'M')
                <img src="img/excelencia/boy.png" class="card-img-top">
                @else
                <img src="img/excelencia/girl.png" class="card-img-top">
                @endif
            @else 
                <img src="{{ URL::asset('../storage/app/'.$excelencia->foto)}}" class="card-img-top">
            @endif

            <div class="card-body">
              <h5 class="card-title text-center">{{$excelencia->name}} {{$excelencia->lastname}}</h5>
              <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">I P</th>
                        <th scope="col">II P</th>
                        <th scope="col">III P</th>
                        <th scope="col">IV P</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        
                        @if ($excelencia->IP == 0)
                            <th scope="row">--</th>
                        @else 
                            <th scope="row">{{$excelencia->IP}}%</th>
                        @endif

                        @if ($excelencia->IIP == 0)
                            <th scope="row">--</th>
                        @else 
                            <th scope="row">{{$excelencia->IIP}}%</th>
                        @endif

                        @if ($excelencia->IIIP == 0)
                            <th scope="row">--</th>
                        @else 
                            <th scope="row">{{$excelencia->IIIP}}%</th>
                        @endif

                        @if ($excelencia->IVP == 0)
                            <th scope="row"></th>
                        @else 
                            <th scope="row">{{$excelencia->IVP}}%</th>
                        @endif
                       
                      </tr>

                      <tr>
                        
                            @if ($excelencia->IP == 0)
                                <th scope="row"><i class="fas silver fa-star fa-2x"></i></th>
                            @else 
                                <th scope="row"><i class="fas gold fa-star fa-2x"></i></th>
                            @endif

                            @if ($excelencia->IIP == 0)
                                <th scope="row"><i class="fas silver fa-star fa-2x"></i></th>
                            @else 
                                <th scope="row"><i class="fas gold fa-star fa-2x"></i></th>
                            @endif

                            @if ($excelencia->IIIP == 0)
                                <th scope="row"><i class="fas silver fa-star fa-2x"></i></th>
                            @else 
                                <th scope="row"><i class="fas gold fa-star fa-2x"></i></th>
                            @endif

                            @if ($excelencia->IVP == 0)
                                <th scope="row"><i class="fas silver fa-star fa-2x"></i></th>
                            @else 
                                <th scope="row"><i class="fas gold fa-star fa-2x"></i></th>
                            @endif
                           
                          </tr>
                     
                    </tbody>
                </table>
              
                <div id="button_{{$excelencia->id}}">
                    <a  onclick="felicitar({{$excelencia->id}})" class="btn btn-primary btn-block" style="color:white">Felicitaciones ({{$excelencia->felicitaciones}})</a>
                </div>
                @php
                    $ultimo_id = $excelencia->id;
                @endphp
            </div>
    </div>
</div>
@endforeach

<div id="div_ver_mas_<?php echo $ultimo_id; ?>" align="center" class="col-sm-10 col-md-6 p-4">
        <button onclick="ver_mas(<?php echo $ultimo_id; ?>)" class="btn btn-success btn-block">Ver Mas Estudiantes</button>
   </div>