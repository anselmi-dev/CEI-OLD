<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Grado Id Field -->
@inject('grados','App\Services\gradosController')
<div class="form-group col-sm-6">
    <label for="grado_id">Secciones</label>
    <select name="grado_id" id="grado_id" class="form-control select2">
		@foreach ($grados->Grados() as $grado)
		     <option value="{{ $grado->id }}">{{ $grado->nombre }}</option>
		@endforeach
    </select>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('seccions.index') !!}" class="btn btn-default">Cancel</a>
</div>
