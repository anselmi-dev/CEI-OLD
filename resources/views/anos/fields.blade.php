<!-- Ano Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ano', 'Ano:') !!}
    {!! Form::text('ano', null, ['class' => 'form-control']) !!}
</div>

@inject('menu','App\Services\menuController')
<!-- Submit Field -->
<div class="form-group col-sm-6">
    <label for="trimestres[]">Trimestres</label>
    <select multiple="true" name="trimestres[]" id="seccions" class="form-control select2">
        @foreach ($menu->Trimestres() as $trimestre)
            <option value ="{{ $trimestre->id }} " @if(isset($ano)) @if( $ano->trimestres()->find( $trimestre->id) ) selected @endif @else selected  @endif > {{$trimestre->trimestre}}</option>
        @endforeach
    </select>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('anos.index') !!}" class="btn btn-default">Cancel</a>
</div>
