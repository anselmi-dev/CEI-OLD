<table class="table table-responsive" id="anos-table">
    <thead>
        <th>Ano</th>
        <th colspan="3">Action</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($anos as $ano)
        <tr>
            <td>{!! $ano->ano !!}</td>
            <td>{!! $ano->trimestres !!}</td>
            <td>
                {!! Form::open(['route' => ['anos.destroy', $ano->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('anos.show', [$ano->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('anos.edit', [$ano->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>