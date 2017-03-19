<div class=" table-responsive">
<table class="table" id="boletas-table">
    <thead>
        <th>Estudiante Id</th>
        <th>Seccion Id</th>
        <th>Trimestre Id</th>
        <th >Action</th>
    </thead>
    <tbody>
    @foreach($boletas as $boleta)
        <tr>
            <td>{!! $boleta->estudiante !!}</td>
            <td>{!! $boleta->seccion !!}</td>
            <td>{!! $boleta->trimestre !!}</td>
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
</div>