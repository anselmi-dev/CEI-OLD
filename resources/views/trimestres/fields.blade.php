<!-- Trimestre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('trimestre', 'Trimestre:') !!}
    {!! Form::select('trimestre', ['ENERO' => 'ENERO', 'FEBRERO' => ' FEBRERO', 'MARZO' => ' MARZO', 'ABRIL' => ' ABRIL', 'MAYO' => ' MAYO', 'JUNIO' => ' JUNIO', 'JULIO' => ' JULIO', 'AGOSTO' => ' AGOSTO', 'SEPTIEMBRE' => ' SEPTIEMBRE', 'OCTUBRE' => ' OCTUBRE'], null, ['class' => 'form-control']) !!}
</div>

<!-- Grado Id Field -->
@inject('años','App\Services\anosController')
<div class="form-group col-sm-6">
    <label for="ano_id">Años Escolares</label>
    <select name="ano_id" id="ano_id" class="form-control select2">
		@foreach ($años->Anos() as $año)
		     <option value="{{ $año->id }}" @if(isset($trimestre)) @if( $trimestre->ano->find( $año->id) ) selected @endif @endif  >{{ $año->ano }}</option>
		@endforeach
    </select>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('trimestres.index') !!}" class="btn btn-default">Cancel</a>
</div>
