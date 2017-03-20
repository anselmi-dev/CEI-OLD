<!-- Estudiante Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estudiante_id', 'Estudiante Id:') !!}
    {!! Form::text('estudiante_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Seccion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('seccion_id', 'Seccion Id:') !!}
    {!! Form::text('seccion_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Ano Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ano_id', 'Ano Id:') !!}
    {!! Form::text('ano_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('auxes.index') !!}" class="btn btn-default">Cancel</a>
</div>
