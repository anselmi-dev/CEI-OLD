<table class="table table-responsive" id="grados-table">
    <thead>
        <th>Nombre</th>
        <th>Activo</th>
        <th colspan="3">@lang('main.action')</th>
    </thead>
    <tbody>
    @foreach($grados as $grado)
        <tr>
            <td>{!! $grado->nombre !!}</td>
            <td>{!! $grado->activo !!}</td>
            <td>
                {!! Form::open(['route' => ['grados.destroy', $grado->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('grados.show', [$grado->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('grados.edit', [$grado->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>