{{-- tabla de acumulativos mas sus resultados obtenidos y mostrados por ajax en el panel de estudiantes luego de esleccionar una clase --}}

        <!-- Table de acumulativos -->
       <div  class="card card-cascade narrower">

         <!--Card image-->
         <div align="center" class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
     
         <h4 class="white-text mx-3">Acumulativos del {{$parcial}} Parcial de {{$clases[0]->clase}} </h4>
     
         </div>
         <!--/Card image-->

         <div class="px-4">
     
         <div class="table-wrapper">
             <!--Table-->
             <table class="table table-hover mb-0 table-responsive-md ">
     
             <!--Table head-->
             <thead>
                <tr>
                
                <th class="th-lg">
                    <a>T&iacute;tulo
                    
                    </a>
                </th>

                <th class="th-lg">
                    <a>Lugar
                      
                    </a>
                </th>
                
                <th class="th-md">
                    <a href="">Fecha
                     
                    </a>
                </th>
                <th class="th-sm">
                        <a href="">Valor
                          
                        </a>
                    </th>
                <th class="th-sm">
                    <a href="">Estado
                      
                    </a>
                </th>

                <th class="th-sm">
                    <a href="">Detalles
                        
                    </a>
                </th>
                  
                
                </tr>
            </thead>
             <!--Table head--> 
             <!--Table body-->
             <tbody id="tbody1" >
                 @php $total_publicado=0; $total_evaluado=0;$total_obtenido=0; @endphp
                 @foreach ($tasks as $task)
                 @php $total_publicado+=$task->valor; @endphp
                 <tr>
                                         
                     <td>{{$task->titulo}} </td>
                     @if ($task->tipo==2)
                         <td><i class="fas fa-home mr-5"></i> </td>
                     @else                                                 
                         <td><i class="fas fa-school mr-5"></i> </td>   
                     @endif
                   
                     <td>{{ \Carbon\Carbon::parse($task->fecha_entrega)->format('d/m/Y')}}</td>
                     
                     <td>{{$task->valor_obtenido}}/{{$task->valor}}%</td>
                     
                     @if ( $task->evaluada == 0)
                     <td><p style="font-weight: bold;" class="red-text">No Evaluada</p></td>
                     <td><button type="button" class="btn btn-warning btn-rounded btn-sm m-0" data-toggle="modal" data-target="#centralModalInfo_{{$task->id}}">Detalles</button></td>
                      @else
                        @php $total_obtenido+=$task->valor_obtenido;@endphp 
                        @php $total_evaluado+=$task->valor;@endphp
                        <td><p style="font-weight: bold;" class="green-text">Evaluada</p></td>
                        <td><button type="button" class="btn btn-warning btn-rounded btn-sm m-0" data-toggle="modal" data-target="#centralModalInfo_{{$task->id}}">Detalles</button></td>
                    @endif
                     
                     <!-- Central Modal Medium Info {{$task->id}}-->
                     <div class="modal fade modal-notify info" id="centralModalInfo_{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-notify modal-info" role="document">
                          <!--Content-->
                          <div class="modal-content">
                            <!--Header-->
                            <div class="modal-header">
                              
                               <p class="heading lead">{{$task->titulo}} - ({{$task->valor_obtenido}}/{{$task->valor}})</p>

                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="white-text">&times;</span>
                              </button>
                            </div>

                            <!--Body-->
                            <div class="modal-body">
                              <div class="text-center">
                                <i class="fas fa-edit fa-4x mb-3 animated rotateIn"></i>
                                <p>{{$task->descripcion}}</p>
                                <p>{{ \Carbon\Carbon::parse($task->fecha_entrega)->format('d/m/Y')}}</p>
                                <p>Obs:{{$task->observacion}}</p>
                              </div>
                            </div>

                            <!--Footer-->
                            <div class="modal-footer justify-content-center">
                              <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">Cerrar</a>
                            </div>
                          </div>
                          <!--/.Content-->
                        </div>
                      </div>
                      <!-- Central Modal Medium Info-->
                 </tr>
                 @endforeach
                                                       
                 
             </tbody>
             
             <!--Table body-->
             </table>
             <!--Table-->

             
         </div>

   
       </div>

       
     </div>
       <!-- fin de la Table de acumulativos -->
       <br>
       <!-- Table with panel -->
       <div align="center" class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
       
               <h4 class="white-text mx-3">@php echo( $total_obtenido ."% Evaluado de ". $total_evaluado."% Evaluado ") @endphp</h4>
       </div>


       
       <br>
         {{-- tabla de recursos --}}
         <div  class="card card-cascade narrower">

            <!--Card image-->
              <div align="center" class="view view-cascade gradient-card-header peach-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
              
                  <h4 class="white-text mx-3">Recursos </h4>
              
              </div>
            <!--/Card image-->

              <div class="px-4">
              
                  <div class="table-wrapper">
                      <!--Table-->
                      <table class="table table-hover mb-0 table-responsive-md ">
              
                          <!--Table head-->
                          <thead>
                              <tr>
                              
                              <th class="th-lg">
                                  <a>Tipo de Recursos
                                  </a>
                              </th>

                              <th class="th-lg">
                                  <a>Nombre de Recurso
                                  </a>
                              </th>
                              
                              <th class="th-md">
                                  <a href="">Fecha publicación
                                  </a>
                              </th>

                              <th class="th-sm">
                                  <a href="">Detalles
                                  </a>
                              </th>
                              
                              <th class="th-sm">
                                  <a href="">Descargar
                                  </a>
                              </th>
                              </tr>
                          </thead>
                          <!--Table head--> 
                          <!--Table body-->
                          <tbody id="tbody_recursos" >
                              @foreach ($files as $file)
                              <tr>     
                                  @if ($file->typefile== 'pdf') 
                                      <td><span style="color: red;"><i class="far fa-file-pdf fa-3x"></i></span></td>
                                  @endif  
                                  @if ($file->typefile== 'pptx') 
                                     <td><span style="color: tomato;"><i class="far fa-file-powerpoint fa-3x"></i></span></td>
                                  @endif            
                                 
                                  <td><a href="">{{$file->filename}} </a></td>
                                  <td>{{ \Carbon\Carbon::parse($file->fecha)->format('d/m/Y')}}</td>
                                  <td><button type="button" class="btn btn-info btn-rounded btn-sm m-0">Detalles</button></td>
                                  <td><a target="_blank"  href="{{ URL::asset('files/'.$file->filename.'.'.$file->typefile)}}" class="btn btn-success btn-rounded btn-sm m-0">Descargar</a></td>
                                  
                                    <!-- Central Modal Medium Info {{$file->id}}-->
                                    <div class="modal fade modal-notify info" id="centralModalfile_{{$file->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-notify modal-info" role="document">
                                          <!--Content-->
                                          <div class="modal-content">
                                            <!--Header-->
                                            <div class="modal-header">
                                              
                                              <p class="heading lead">{{$file->filename}}</p>
    
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" class="white-text">&times;</span>
                                              </button>
                                            </div>
    
                                            <!--Body-->
                                            <div class="modal-body">
                                              <div class="text-center">
                                                <i class="fas fa-edit fa-4x mb-3 animated rotateIn"></i>
                                                <p>{{$file->detalles}}</p>
                                              
                                              </div>
                                            </div>
    
                                            <!--Footer-->
                                            <div class="modal-footer justify-content-center">
                                              <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">Cerrar</a>
                                            </div>
                                          </div>
                                          <!--/.Content-->
                                        </div>
                                    </div>
                                      <!-- Central Modal Medium Info-->
                              </tr>
                              @endforeach
                              
                          </tbody>
                      
                          <!--Table body-->
                      </table>
                      <!--Table-->
                  </div> <!--fin de table-wrapper-->

              </div><!--fin de px-4-->

        </div><!--fin de DIV RECURSOS--> 
          <br>
         {{-- tabla de videos --}}
         <div  class="card card-cascade narrower">

            <!--Card image-->
              <div align="center" class="view view-cascade gradient-card-header aqua-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
              
                  <h4 class="white-text mx-3">Videos </h4>
              
              </div>
            <!--/Card image-->

              <div class="px-4">
              
                  <div class="table-wrapper">
                      <!--Table-->
                      <table class="table table-hover mb-0 table-responsive-md ">
              
                          <!--Table head-->
                          <thead>
                              <tr>
                                <th class="th-lg">
                                    <a>Tipo
                                    </a>
                                </th>
                                         
                              <th class="th-lg">
                                  <a>Nombre del Video
                                  </a>
                              </th>
                              
                              <th class="th-md">
                                  <a href="">Fecha publicación
                                  </a>
                              </th>

                              <th class="th-sm">
                                  <a href="">Visualizar
                                  </a>
                              </th>
                              </tr>
                          </thead>
                          <!--Table head--> 
                          <!--Table body-->
                          <tbody id="tbody_recursos" >
                              @foreach ($videos as $video)
                              <tr>  
                                  <td><span style="color: red;"><i class="fab fa-youtube fa-3x"></i></span></td>
                                  <td><a href="">{{$video->titulo}} </a></td>
                                  <td>{{ \Carbon\Carbon::parse($video->fecha)->format('d/m/Y')}}</td>
                                  
                                  <td><button type="button" class="btn btn-success btn-rounded btn-sm m-0" data-toggle="modal" data-target="#centralModalvideo_{{$video->id}}">Visualizar</button></td>

                                      <!-- Central Modal Medium Video {{$video->id}}-->
                                      <div class="modal fade modal-notify info" id="centralModalvideo_{{$video->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                          aria-hidden="true">
                                          <div class="modal-dialog modal-notify modal-danger" role="document">
                                            <!--Content-->
                                            <div class="modal-content">
                                              <!--Header-->
                                              <div class="modal-header">
                                                
                                                <p class="heading lead">{{$video->titulo}}</p>
      
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true" class="white-text">&times;</span>
                                                </button>
                                              </div>
      
                                              <!--Body-->
                                              <div class="modal-body">
                                                <div class="text-center">
                                                  <p> @php
                                                        //tomamos solo los  ultimo 11 caracteres de la url del video
                                                        $url = substr($video->url, -11);    
                                                      @endphp   
                                                      <iframe width="95%" height="315" src="https://www.youtube.com/embed/{{$url}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                  </p>
                                                  <p>Observaci&oacute;n: {{$video->detalles}}</p>
                                                  <p>Publicado el:{{ \Carbon\Carbon::parse($video->fecha)->format('d/m/Y')}}</p>
                                                                                                                     
                                                </div>
                                              </div>
      
                                              <!--Footer-->
                                              <div class="modal-footer justify-content-center">
                                                <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">Cerrar</a>
                                              </div>
                                            </div>
                                            <!--/.Content-->
                                          </div>
                                      </div>
                                      <!-- Central Modal Medium Info-->
                              </tr>

                              @endforeach
                              
                          </tbody>
                      
                          <!--Table body-->
                      </table>
                      <!--Table-->
                  </div> <!--fin de table-wrapper-->

              </div><!--fin de px-4-->

        </div><!--fin de DIV videos--> 
  </div>
  {{--fin del div que abarca el --}}