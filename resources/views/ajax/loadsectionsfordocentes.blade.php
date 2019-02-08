{{-- busqueda de las secciones a las que esta asignado este docente, 
para devolverlos en la seccion de acumulativos --}}
<div class="form-check">
@foreach ($sections as $section)

    <input type="checkbox" class="form-check-input" id="materialUnchecked_{{$section->section}}" value="{{$section->section}}">
    <label class="form-check-label" for="materialUnchecked_{{$section->section}}">{{$section->section}}</label>

@endforeach
</div>

