<!-- Nombre Field -->
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
    {!! Form::label('fechaNacimiento', 'Fechanacimiento:') !!}
    {!! Form::date('fechaNacimiento', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>


<!-- Seccion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estudiante_id', 'estudiante Id:') !!}
    {!! Form::text('estudiante_id', null, ['class' => 'form-control']) !!}
</div>

@inject('estudiantes','App\Services\estudiantesController')
<!-- Submit Field -->
<div class="form-group col-sm-12">
    <label for="boleta[]">Secciones</label>
    <select multiple="true" name="seccions[]" id="seccions" class="form-control select2">
            @foreach ($estudiantes->Estudiantes() as $estudiante)
                <option value="{{ $estudiante->id }}">{{ $estudiante->nombre}}</option> 
            @endforeach
    </select>
</div>


<!-- Sexo Field -->
<div class="form-group col-sm-12">
    {!! Form::label('sexo', 'Sexo:') !!}
    <label class="radio-inline">
        {!! Form::radio('sexo', "M", null) !!} M
    </label>

    <label class="radio-inline">
        {!! Form::radio('sexo', "F", null) !!} F
    </label>

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('estudiantes.index') !!}" class="btn btn-default">Cancel</a>
</div>
