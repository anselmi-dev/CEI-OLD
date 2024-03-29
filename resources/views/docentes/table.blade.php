<table class="table table-responsive" id="docentes-table">
    <thead>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Cedula</th>
        <th>Email</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($docentes as $docente)
        <tr>
            <td>{!! $docente->nombre !!}</td>
            <td>{!! $docente->apellido !!}</td>
            <td>{!! $docente->cedula !!}</td>
            <td>{!! $docente->seccions !!}</td>
            <td>
                {!! Form::open(['route' => ['docentes.destroy', $docente->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('docentes.show', [$docente->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('docentes.edit', [$docente->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>