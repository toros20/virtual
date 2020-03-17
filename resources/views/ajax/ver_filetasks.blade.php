<form action="{{ route('teachers/save_notas') }}" method="post">
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <!-- Central Modal Large success -->
    <div class="modal fade modal-notify info" id="centralModalevaluar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-notify modal-lg modal-success" role="document">
          <!--Content-->
          <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
              
              <p class="heading lead">Ver Tareas Subidas</p>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">&times;</span>
              </button>
            </div>

            <!--Body-->
            <div class="modal-body">
              <div class="text-center">
                   {{--  <input type="hidden" name="course_id" value="{{$course_id}}">
                    <input type="hidden" name="seccion" value="{{$seccion}}">
                    <input type="hidden" name="task_id" value="{{$id_task}}"> --}}

                    <table>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Tarea</th>
                            <th>Mensaje</th>
                        </tr>
                        @foreach ($ver_filetasks as $file)
                            <tr>
                                <td> {{$file->name}}</td>
                                <td> {{$file->lastname}}</td>
                                <td><a href="{{ URL::asset('../storage/app/'.$file->filename)}}"  class="btn btn-outline-success waves-effect" type="submit">Descargar Tarea</a> </td>
                                <td><input  type="text" value=" {{$file->detalles}}"></td>
                            </tr>
                        @endforeach
                       
                    </table>
              
              </div>
            </div>

            <!--Footer-->
            <div class="modal-footer justify-content-center">
               <button class="btn btn-outline-success waves-effect" type="submit">GUARDAR NOTAS</button>
              <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">Cerrar</a>
            </div>
          </div>
          <!--/.Content-->
        </div>
    </div>
    <!-- Central Modal Medium Info-->
</form>