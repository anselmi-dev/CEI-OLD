<table class="table table-responsive" id="boletas-table">
    <thead>
        <th>Url</th>
        <th>Estudiante Id</th>
        <th>Ano Id</th>
        <th>Trimestre Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($boletas as $boleta)
        <tr>
            <td>{!! $boleta->url !!}</td>
            <td>{!! $boleta->estudiante_id !!}</td>
            <td>{!! $boleta->ano_id !!}</td>
            <td>{!! $boleta->trimestre_id !!}</td>
            <td>
                {!! Form::open(['route' => ['boletas.destroy', $boleta->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('boletas.show', [$boleta->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('boletas.edit', [$boleta->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>