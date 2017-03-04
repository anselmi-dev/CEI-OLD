<table class="dtable display table" cellspacing="0" width="100%" id="grados-table">
    <thead>
        <th>Id</th>
        <th>Nombre</th>
        <th>Secciones</th>
        <th>Activo</th>
        <th>@lang('main.action')</th>
    </thead>
    <tbody>
    @foreach($grados as $grado)
        <tr>
            <td>{!! $grado->id !!}</td>
            <td>{!! $grado->nombre !!}</td>
            <td>{!! $grado->secciones !!}</td>
            <td>{!! $grado->activo !!}</td>
            <td>
                {!! Form::open(['route' => ['grados.destroy', $grado->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('grados.show', [$grado->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('grados.edit', [$grado->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'Enviar', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>