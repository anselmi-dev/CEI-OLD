
@foreach ($boletas as $boleta)
	{{$boleta->trimestre->ano}} {{$boleta->trimestre->id}}
	<ul>
		<?php if ($boleta->seccion_id): ?>
		<li>
			{{$boleta->trimestre->trimestre}} 
			<li>
				<p>Seccion: {{$boleta->seccion->nombre}}  {{$boleta->seccion->id}}</p>
				<p>Grado: {{$boleta->seccion->grado->nombre}} {{$boleta->seccion->grado->id}}</p>
		<?php if ($boleta->estudiante_id): ?>
				{{$boleta->estudiante->nombre}} {{$boleta->estudiante->id}}
		<?php endif ?>
			</li>
		</li>
		<?php endif ?>
	</ul>
@endforeach