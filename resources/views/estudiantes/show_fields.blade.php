
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

    <h3>Boletas</h3>
    <div class="col-md-12">
        <div class="col-sm-6">
            <ul class="mailbox-attachments clearfix">
            @foreach ($estudiante->boletas as $boleta)
                <li>
                  <span class="mailbox-attachment-icon" style="padding: "><embed src="{{ url('boletas'.$boleta->file) }}#toolbar=0" width="100" style="display: block;width: 100%;"></span>
                  <div class="mailbox-attachment-info">
                    <a href="{{ url('boletas'.$boleta->file) }}" target="_blank" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{ $boleta->ano->ano}} - {{ $boleta->trimestre->trimestre }} </a>
                        <span class="mailbox-attachment-size" style="display: initial;">
                            <a href="#" class="btn btn-default btn-xs pull-right" download="true"><i class="fa fa-cloud-download"></i></a>
                            {!! Form::open(['route' => ['boletas.destroy', $boleta->id], 'method' => 'delete']) !!}
                                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                            {!! Form::close() !!}
                        </span>
                  </div>
                </li>
            @endforeach
             </ul>
        </div>
    </div>


