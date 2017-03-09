
<!-- Trimestre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('trimestre', 'Trimestre:') !!}
    {!! Form::select('trimestre',['ENERO' => 'ENERO', 'FEBRERO' => 'FEBRERO', 'MARZO' => 'MARZO', 'ABRIL' => 'ABRIL', 'MAYO' => 'MAYO', 'JUNIO' => 'JUNIO', 'JULIO' => 'JULIO', 'AGOSTO' => 'AGOSTO', 'SEPTIEMBRE' => 'SEPTIEMBRE', 'OCTUBRE' => 'OCTUBRE'], null, ['class' => 'form-control']) !!}
</div>

<!-- Ano Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ano', 'Año:') !!}
    {{ Form::selectRange('ano', date('Y'), date('Y') - 10, null, ['class' => 'form-control']) }}
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
    <a href="{!! route('trimestres.index') !!}" class="btn btn-default">@lang('main.cancel')</a>
</div>