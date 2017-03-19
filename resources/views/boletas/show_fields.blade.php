<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $boleta->id !!}</p>
</div>

<!-- Estudiante Id Field -->
<div class="form-group">
    {!! Form::label('estudiante_id', 'Estudiante Id:') !!}
    <p>{!! $boleta->estudiante_id !!}</p>
</div>

<!-- Seccion Id Field -->
<div class="form-group">
    {!! Form::label('seccion_id', 'Seccion Id:') !!}
    <p>{!! $boleta->seccion_id !!}</p>
</div>


<!-- Trimestre Id Field -->
<div class="form-group">
    {!! Form::label('trimestre_id', 'Trimestre Id:') !!}
    <p>{!! $boleta->trimestre_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $boleta->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $boleta->updated_at !!}</p>
</div>

