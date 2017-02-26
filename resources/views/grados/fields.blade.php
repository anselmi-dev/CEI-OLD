

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Secciones Field -->
<div class="form-group col-sm-6">
    {!! Form::label('secciones', 'Secciones:') !!}
    {!! Form::number('secciones', null, ['class' => 'form-control']) !!}
</div>

<!-- Activo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activo', 'Activo:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('activo', false) !!}
        {!! Form::checkbox('activo', '1', null) !!}
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('grados.index') !!}" class="btn btn-default">@lang('main.cancel')</a>
</div>