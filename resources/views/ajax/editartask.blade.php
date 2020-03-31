<form action="{{ route('teachers/save_editar_tarea') }}" method="post">
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <!-- Central Modal Large success -->
    <div class="modal fade modal-notify info" id="centralModaleditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                    <input type="hidden" name="clase_id" value="{{$tasks[0]->clase}}">

                        <div class="md-form">
                            <input required type="text" id="titulo" name="titulo" class="form-control" value="{{$tasks[0]->titulo}}">
                            <label for="titulo">Nombre del Acumulativo</label>
                        </div>

                        <div class="md-form">
                            <textarea required type="text" id="descripcion" name="descripcion" class="md-textarea form-control" rows="3" >{{$tasks[0]->descripcion}}</textarea>
                            <label for="descripcion">Descripción del Acumulativo</label>
                        </div>

                        <div>
                        <label>Tipo de Acumulativo</label>
                        @php  if($tasks[0]->tipo == 1 {$tipo_trabaho = "Trabajo en Clase"} else{$tipo_trabaho = "Trabajo Extra-Clase"})  @endphp
                            <select required="required" class="browser-default custom-select mt-3" id="select_tipo" name="select_tipo">
                                <option value="{{$tasks[0]->tipo}}" selected>@php echo $tipo_trabaho @endphp</option>
                                <option value="1">Trabajo en Clase</option>
                                <option value="2">Trabajo Extra-Clase</option>      
                            </select>
                        </div>

                        <div>
                        <label>Seleccione Parcial</label>
                            <select required="required" class="browser-default custom-select mt-3" id="select_parcial" name="select_parcial">
                                <option value="{{$tasks[0]->parcial}}" selected>{{$tasks[0]->parcial}}</option>
                                <option value="1">I Parcial</option>
                                <option value="2">II Parcial</option>
                                <option value="3">III Parcial</option>
                                <option value="4">IV Parcial</option>
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <label for="valor">Valor del Acumulativo</label>
                            <input value="{{$tasks[0]->valor}}" required id="valor" name="valor" type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                            <div class="input-group-append">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>

                        <div class="md-form">
                            <input value="{{$tasks[0]->fecha_entrega}}" required placeholder="Selected date" type="text" id="date-picker-example" name="date_acum" class="form-control datepicker">
                        </div>

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