@extends('layouts.app')
 
@section('content')
    <form enctype="multipart/form-data">
        <label for="file-0">Test invalid input type</label>
        <input id="file-0" name="file-0" class="file" type="text" multiple data-min-file-count="1">

    </form>
<input id="input-id" name="input-id[]" type="file" data-upload-url="/site/file-upload" multiple="true">
<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
      <div class="panel-heading">Agregar archivos</div>
        <div class="panel-body">
          <form method="POST" action="{!! url('/') !!}/storage/create" accept-charset="UTF-8" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label class="col-md-4 control-label">Nuevo Archivo</label>
              <div class="col-md-6">
                <input type="file" class="form-control" name="file" >
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
 
@endsection