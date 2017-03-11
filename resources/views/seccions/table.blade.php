<table class="table table-responsive" id="seccions-table">
    <thead>
        <th>Nombre</th>
        <th colspan="3">@lang('main.action')</th>
    </thead>
    <tbody>
    @foreach($seccions as $seccion)
        <tr>
            <td>{!! $seccion->nombre !!}</td>
            <td>
                {!! Form::open(['route' => ['seccions.destroy', $seccion->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('seccions.show', [$seccion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('seccions.edit', [$seccion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>