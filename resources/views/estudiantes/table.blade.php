<table class="table table-responsive" id="estudiantes-table">
    <thead>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Fechanacimiento</th>
        <th>Edad</th>
        <th>Email</th>
        <th>Sexo</th>
        <th>Año</th>
        <th>Grado</th>
        <th>Seccion</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($estudiantes as $estudiante)
        <tr>
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
                {!! Form::open(['route' => ['estudiantes.destroy', $estudiante->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('estudiantes.show', [$estudiante->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('estudiantes.edit', [$estudiante->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="{!! route('estudiantes.boleta', ['estudiante_id' => $estudiante->id, 'ano_id' => $estudiante->ano]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i>Add Boleta</a>

                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>