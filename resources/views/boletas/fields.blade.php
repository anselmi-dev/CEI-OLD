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

<!-- Grado Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grado_id', 'Grado Id:') !!}
    {!! Form::text('grado_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Trimestre Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('trimestre_id', 'Trimestre Id:') !!}
    {!! Form::text('trimestre_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('boletas.index') !!}" class="btn btn-default">Cancel</a>
</div>
