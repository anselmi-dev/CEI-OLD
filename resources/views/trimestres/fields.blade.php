<?php $date = date('Y-m-d 10:11:41') ?>

<!-- Fechanacimiento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha', 'Ano:') !!}
    {!! Form::date('fecha', $date, ['class' => 'form-control']) !!}
</div>

<!-- Trimestre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('trimestre', 'Trimestre:') !!}
    {!! Form::select('trimestre', ['ENERO' => 'ENERO', 'FEBRERO' => ' FEBRERO', 'MARZO' => ' MARZO', 'ABRIL' => ' ABRIL', 'MAYO' => ' MAYO', 'JUNIO' => ' JUNIO', 'JULIO' => ' JULIO', 'AGOSTO' => ' AGOSTO', 'SEPTIEMBRE' => ' SEPTIEMBRE', 'OCTUBRE' => ' OCTUBRE'], null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('trimestres.index') !!}" class="btn btn-default">Cancel</a>
</div>
