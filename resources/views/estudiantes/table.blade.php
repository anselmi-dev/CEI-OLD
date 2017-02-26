<table class="table table-responsive" id="estudiantes-table">
    <thead>
        <th>Id</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Fechanacimiento</th>
        <th>Sexo</th>
        <th>Activo</th>
        <th colspan="3">@lang('main.action')</th>
    </thead>
    <tbody>
    @foreach($estudiantes as $estudiante)
        <tr>
            <td>{!! $estudiante->id !!}</td>
            <td>{!! $estudiante->nombre !!}</td>
            <td>{!! $estudiante->apellido !!}</td>
            <td>{!! $estudiante->fechaNacimiento !!}</td>
            <td>{!! $estudiante->sexo !!}</td>
            <td>{!! $estudiante->activo !!}</td>
            <td>
                {!! Form::open(['route' => ['estudiantes.destroy', $estudiante->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('estudiantes.show', [$estudiante->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('estudiantes.edit', [$estudiante->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'Enviar', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>