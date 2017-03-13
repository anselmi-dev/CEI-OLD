<!-- Id Field -->
<div class="form-group col-md-6">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $estudiante->id !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group col-md-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $estudiante->nombre !!}</p>
</div>

<!-- Apellido Field -->
<div class="form-group col-md-6">
    {!! Form::label('apellido', 'Apellido:') !!}
    <p>{!! $estudiante->apellido !!}</p>
</div>

<!-- Fechanacimiento Field -->
<div class="form-group col-md-6">
    {!! Form::label('fechaNacimiento', 'Fechanacimiento:') !!}
    <p>{!! $estudiante->fechaNacimiento->format('d-M-Y') !!}</p>
</div>

<!-- Email Field -->
<div class="form-group col-md-6">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $estudiante->email !!}</p>
</div>

<!-- Sexo Field -->
<div class="form-group col-md-6">
    {!! Form::label('sexo', 'Sexo:') !!}
    <p>{!! $estudiante->sexo !!}</p>
</div>

<!-- Ano Id Field -->
<div class="form-group col-md-6">
    {!! Form::label('ano_id', 'Año:') !!}
    <p>{!! $estudiante->ano->ano !!}</p>
</div>

<!-- Seccion Id Field -->
<div class="form-group col-md-6">
    {!! Form::label('Seccion', 'Seccion:') !!}
    <p>{!! $estudiante->seccion->nombre !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-md-6">
    {!! Form::label('created_at', 'Creado:') !!}
    <p>{!! $estudiante->created_at->format('d-M-Y') !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-md-6">
    {!! Form::label('updated_at', 'Actualizado:') !!}
    <p>{!! $estudiante->updated_at->format('d-M-Y') !!}</p>
</div>
<!-- Updated At Field -->
<div class="form-group col-md-6">
    {!! Form::label('boleta', 'Boletas:') !!}
    <div id="example1">
        
    </div>
        @foreach ($estudiante->boletas as $boleta)
      
        {{$boleta->file}}
        @endforeach
  

</div>

