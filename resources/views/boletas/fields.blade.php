@inject('menu','App\Services\menuController')
<!-- Url Field -->

{{Form::file('url') }}

{{ Form::hidden('estudiante_id', $request->estudiante_id) }}

<div class="form-group col-sm-4">
 <label for="seccion">Ano:</label>
{!! Form::select('ano_id',$menu->Anos()->pluck('ano','id'), null, ['class' => 'form-control']) !!}
</div>

<!-- Trimestre Id Field -->
<div class="form-group col-sm-4">
    <label for="trimestre">Trimestre:</label>
{!! Form::select('trimestre_id',$menu->Trimestres()->pluck('trimestre','id'), null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('estudiantes.index') !!}" class="btn btn-default">Cancel</a>
</div>