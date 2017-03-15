{!! Form::open(['route' => ['estudiantes.promover'], 'method' => 'post', 'id' => 'estudiantes' ]) !!}
<table class="table table-responsive dtable display table hover" cellspacing="0" id="estudiantes-table">
    <thead>
        <th><input name="select_all" id="select_all" value="1" type="checkbox"></th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Fechanacimiento</th>
        <th>Edad</th>
        <th>Email</th>
        <th>Sexo</th>
        <th>Año</th>
        <th>Grado</th>
        <th>Seccion</th>
        <th>Action</th>
    </thead>
    <tbody>
    @foreach($estudiantes as $estudiante)
        <tr>
            <td>{!! Form::checkbox('ids[]', $estudiante->id, false) !!}</td>
            <td>{!! $estudiante->nombre !!}</td>
            <td>{!! $estudiante->apellido !!}</td>
            <td>{!! $estudiante->fechaNacimiento->format('d-M-Y') !!}</td>
            <td>{!! $estudiante->edad !!}</td>
            <td>{!! $estudiante->email !!}</td>
            <td>{!! $estudiante->sexo !!}</td>
            <td>{!! $estudiante->ano->ano !!}</td>
            <td>{!! $estudiante->seccion->grado->nombre !!}</td>
            <td>{!! $estudiante->seccion->nombre !!}</td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('estudiantes.show', [$estudiante->id]) !!}" class='btn btn-warning btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('estudiantes.edit', [$estudiante->id]) !!}" class='btn btn-primary btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="{!! route('estudiantes.boleta', ['estudiante_id' => $estudiante->id, 'ano_id' => $estudiante->ano]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i>Add Boleta</a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>   
    <div class="form-group col-sm-3" >
        {!! Form::text('ano_id',$menu->Anos()->last()->id, null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-3">
        {!! Form::select('seccion_id',$menu->Secciones()->pluck('nombre','id')->prepend('Select Seccion', '')->toArray(), null, ['class' => 'form-control selectpicker']) !!}
    </div>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i> promover', ['type' => 'submit', 'class' => 'btn btn-danger  ']) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
{!! Form::close() !!}


@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $("#select_all").on('click', function(){
                var value = $(this).prop('checked');
                $('#estudiantes-table tbody tr').each(function (index2) {
                    if (value)
                        $(this).find('td:first-child input').attr('checked',true).prop("checked", "checked");
                    else
                        $(this).find('td:first-child input').attr('checked',false).prop("checked", "");
                });
            });
        });
    </script>
@endsection