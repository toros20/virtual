<option value="-1" disabled selected>Seleccione Clase</option>
@foreach ($clases as $clase)
<option value="{{$clase->clase_id}} ">{{$clase->clase}} </option>
@endforeach