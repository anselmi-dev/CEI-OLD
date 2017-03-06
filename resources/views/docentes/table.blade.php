<table class="dtable display table" cellspacing="0" width="100%" id="docentes-table">
    <thead>
        <th>Id</th>
        <th>Nombre</th>
        <th>Cedula</th>
        <th>Seccion</th>
        <th>Activo</th>
        <th>@lang('main.action')</th>
    </thead>
    <tbody>
    @foreach($docentes as $docente)
        <tr>
            <td><a href="{!! route('docentes.show', [$docente->id]) !!}"/>{!! $docente->id !!}</a></td>
            <td><a href="{!! route('docentes.show', [$docente->id]) !!}"/>{!! $docente->nombre !!} {!! $docente->apellido !!}</a></td>
            <td>{!! $docente->cedula !!}</td>
            <td>
            @foreach ($docente->secciones  as $seccion)
            {!!  $seccion->nombre !!}
            @endforeach
            </td>
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