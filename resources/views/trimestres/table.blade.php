<table class="table table-responsive" id="trimestres-table">
    <thead>
        <th>Trimestre</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($trimestres as $trimestre)
        <tr>
            <td>{!! $trimestre->trimestre !!}</td>
            <td>
                {!! Form::open(['route' => ['trimestres.destroy', $trimestre->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('trimestres.show', [$trimestre->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('trimestres.edit', [$trimestre->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>