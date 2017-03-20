<table class="table table-responsive" id="auxes-table">
    <thead>
        <th>Estudiante Id</th>
        <th>Seccion Id</th>
        <th>Ano Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($auxes as $auxes)
        <tr>
            <td>{!! $auxes->estudiante_id !!}</td>
            <td>{!! $auxes->seccion_id !!}</td>
            <td>{!! $auxes->ano_id !!}</td>
            <td>
                {!! Form::open(['route' => ['auxes.destroy', $auxes->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('auxes.show', [$auxes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('auxes.edit', [$auxes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>