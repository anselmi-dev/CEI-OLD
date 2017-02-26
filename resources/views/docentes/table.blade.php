<table class="table table-responsive" id="docentes-table">
    <thead>
        <th>Id</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Cedula</th>
        <th>Activo</th>
        <th colspan="3">@lang('main.action')</th>
    </thead>
    <tbody>
    @foreach($docentes as $docente)
        <tr>
            <td>{!! $docente->id !!}</td>
            <td>{!! $docente->nombre !!}</td>
            <td>{!! $docente->apellido !!}</td>
            <td>{!! $docente->cedula !!}</td>
            <td>{!! $docente->activo !!}</td>
            <td>
                {!! Form::open(['route' => ['docentes.destroy', $docente->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('docentes.show', [$docente->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('docentes.edit', [$docente->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'Enviar', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>