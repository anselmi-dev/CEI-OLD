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