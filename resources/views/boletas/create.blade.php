@extends('layouts.app')
 
@section('content')

@inject('menu','App\Services\menuController')

<div class="box-body">
  {!! Form::open(['route'=> 'file.store', 'method' => 'POST', 'files'=>'true', 'id' => 'e' ]) !!}
    <!-- Nombre Field -->
    <input type="hidden" name="año" value="{{ $menu->TrimestresActual()->ano }}">
    <input type="hidden" name="trimestre" value="{{ $menu->TrimestresActual()->trimestre }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row">
      <div class="col-sm-6 col-sm-push-3">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">@lang('main.estudiante')</h3>
            <div class="box-tools pull-right">
              <span class="label label-primary">@lang('main.required')</span>
            </div><!-- /.box-tools -->
          </div><!-- /.box-header -->
          <div class="box-body">
            <div class="form-group">
              <select name="estudiante" class="selectpicker" data-label="estudiante" id="id_estudiante" data-size="15" required data-live-search="true"  data-width="100%">
                  <option disabled selected>@lang('main.estudiante')</option>
                @foreach ($menu->Estudiantes() as $Estudiante)
                  <option value="{{ $Estudiante->getGradoAttribute($Estudiante->seccion_id) }}_{{ $Estudiante->seccion_id }}_{{ $Estudiante->id }}">{{ $Estudiante->nombre }} {{ $Estudiante->apellido }}</option>
                @endforeach
              </select>
            </div>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div>      
    </div>

    <div class="row">
      <div class="col-sm-6 col-sm-push-3">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">@lang('main.boleta')</h3>
            <div class="box-tools pull-right">
              <span class="label label-primary">@lang('main.required')</span>
              <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div><!-- /.box-tools -->
          </div><!-- /.box-header -->
          <div class="box-body">
            <div class="box">
                <input id="file-es" name="file" type="file">
            </div><!-- /.box-body -->
            <button type="submit" class="btn btn-primary"><i class="fa fa-download"></i> @lang('main.upload')</button>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div>
    </div>

  {!! Form::close() !!}
  <a href="http://almsaeedstudio.com/download/AdminLTE-dist" class="btn btn-primary"><i class="fa fa-download"></i> Download</a>
</div>

  @section('js')
  <script>
      function realizaProceso(){
        var data = JSON.parse(JSON.stringify( $('form').serializeArray() ));
        console.log( data );
        $.ajax({
          data: data,
          url:   "{{ route('file.store')}}",
          type:  'post',
          beforeSend: function () {
          },
          success:  function (data) {
            console.log(data);
          }
        });
      };
  </script>
  @stop

@endsection