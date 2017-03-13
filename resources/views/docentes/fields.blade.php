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

<!-- Cedula Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cedula', 'Cedula:') !!}
    {!! Form::text('cedula', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>
@inject('menu','App\Services\menuController')

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <label for="seccions[]">Secciones</label>
    <select multiple="true" name="seccions[]" id="seccions" class="form-control select2">
                    @foreach ($menu->Secciones() as $seccion)
                        <option value="{{ $seccion->id }}" @if(isset($docente)) @if( $docente->seccions()->find( $seccion->id) ) selected @endif @endif > {{$seccion->nombre}}</option>
                    @endforeach
            
    </select>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('docentes.index') !!}" class="btn btn-default">Cancel</a>
</div>
