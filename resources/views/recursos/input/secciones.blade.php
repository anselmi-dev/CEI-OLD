@inject('grados','App\Services\gradosController')
<select class="form-control selectpicker" name="seccion_id" data-width="100%">
		<option value="">Todas las secciones</option>
	@foreach ($grados->grados() as $grado )
  		<optgroup label="{{$grado->nombre}}" >
			@foreach ($grado->seccions as $seccion )
			<option value="{{$seccion->id}}" >{{$seccion->nombre}}</option>
			@endforeach
  		</optgroup>
	@endforeach
</select>
