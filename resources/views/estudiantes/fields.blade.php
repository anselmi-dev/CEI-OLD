@inject('menu','App\Services\menuController')
<!-- Nombre Field -->
<div class="form-group col-sm-4">
    <label for="seccion">Ano:</label>

{!! Form::select('ano_id',$menu->Anos()->pluck('ano','id'), null, ['class' => 'form-control']) !!}

</div>
<!-- Submit Field -->
<div class="form-group col-sm-4">
    <label for="trimestres[]">Trimestres</label>
    <select multiple="true" name="trimestres[]" id="seccions" class="form-control select2">
        @foreach ($menu->Trimestres() as $trimestre)
            <option value="{{ $trimestre->id }}" @if(isset($estudiante)) @if( $estudiante->trimestres()->find( $trimestre->id) ) selected @endif @else selected @endif > {{$trimestre->trimestre}}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-4">
    <label for="seccion">Seccion:</label>
{!! Form::select('seccion_id',$menu->Secciones()->pluck('nombre','id'), null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Apellido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellido', 'Apellido:') !!}
    {!! Form::text('apellido', null, ['class' => 'form-control']) !!}
</div>

<!-- Fechanacimiento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fechaNacimiento', 'FechaNacimiento:') !!}
    @if( \Request::route()->getName()=='estudiantes.edit' )
        {!! Form::date('fechaNacimiento', $estudiante->fechaNacimiento->format('Y-m-d'), ['class' => 'form-control']) !!}
    @else
        {!! Form::date('fechaNacimiento', null, ['class' => 'form-control']) !!}
    @endif
</div>

<!-- Sexo Email -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Sexo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sexo', 'Sexo:') !!}
    {!! Form::select('sexo', ['M' => 'M', 'F' => 'F'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('guardar', ['class' => 'btn btn-primary']) !!}
    @if(isset($request))
    <a href="{!! route('estudiantes.index',['seccion_id' => $request->seccion_id,
                  'trimestre_id' => $request->trimestre_id,'grado_id' => $request->grado_id]) !!}"
     class="btn btn-default">@lang('main.cancel')</a>
     @else
     <a href="{!! route('estudiantes.index') !!}"
     class="btn btn-default">@lang('main.cancel')</a>
     @endif

</div>