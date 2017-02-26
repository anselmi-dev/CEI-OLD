<table class="table table-responsive" id="trimestres-table">
    <thead>
        <th>Id</th>
        <th>Trimestre</th>
        <th>Ano</th>
        <th>Activo</th>
        <th colspan="3">@lang('main.action')</th>
    </thead>
    <tbody>
    @foreach($trimestres as $trimestre)
        <tr>
            <td>{!! $trimestre->id !!}</td>
            <td>{!! $trimestre->trimestre !!}</td>
            <td>{!! $trimestre->Ano !!}</td>
            <td>{!! $trimestre->activo !!}</td>
            <td>
                {!! Form::open(['route' => ['trimestres.destroy', $trimestre->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('trimestres.show', [$trimestre->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('trimestres.edit', [$trimestre->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'Enviar', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>