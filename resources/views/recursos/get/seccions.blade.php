@inject('anos','App\Services\anosController')
	@if($anos->ExisteAno())
		<li><a href="{{ route('estudiantes.filter', ['seccion_id' => $seccion->id,'ano_id' => $anos->AnoActual()] ) }}" >{!! $seccion->nombre !!}</a></li>
	@endif