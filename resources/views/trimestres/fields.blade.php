<!-- Trimestre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('trimestre', 'Trimestre:') !!}
    {!! Form::select('trimestre', ['DICIEMRE' => 'DICIEMRE', 'ABRIL' => ' ABRIL', 'JULIO' => ' JULIO'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('trimestres.index') !!}" class="btn btn-default">Cancel</a>
</div>
