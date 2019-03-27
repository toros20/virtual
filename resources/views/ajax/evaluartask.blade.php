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
              
              <p class="heading lead">Titulo: {{$tasks[0]->titulo}} - Valor: {{$tasks[0]->valor}}%</p>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">&times;</span>
              </button>
            </div>

            <!--Body-->
            <div class="modal-body">
              <div class="text-center">
                    <input type="hidden" name="course_id" value="{{$course_id}}">
                    <input type="hidden" name="seccion" value="{{$seccion}}">
                    <input type="hidden" name="task_id" value="{{$id_task}}">

                    <table>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Nota</th>
                            <th>Observaci&oacute;n</th>
                        </tr>
                        @foreach ($students as $student)
                            <tr>
                                <td> {{$student->name}}</td>
                                <td> {{$student->lastname}}</td>
                                <td><input required maxlength="2" min=-1 max="{{$tasks[0]->valor}}" name="txt_{{$student->user}}" type="number" value="{{$student->valor_obtenido}}"> </td>
                                <td><input name="obs_{{$student->user}}" type="text" value=" {{$student->observacion}}"></td>
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