@inject('grados','App\Services\gradosController')
<select class="form-control selectpicker" name="seccion_id" data-width="100%">
		<option value="">Todas las secciones</option>
	@foreach ($grados->grados() as $grado )
  		<optgroup label="{{$grado->nombre}}" >
			@foreach ($grado->seccions as $seccion )
				<option value="{{ $seccion->id }}" 
				        @if(app('request')->input('seccion_id') !=null ) 
				        	@if( $seccion->id  == app('request')->input('seccion_id') )
				        		selected 
				        	@endif 
				        @endif >
					{{$seccion->nombre}}
				</option>
			@endforeach
  		</optgroup>
	@endforeach
</select>
