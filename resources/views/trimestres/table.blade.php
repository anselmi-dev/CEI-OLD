<table class="table table-responsive" id="trimestres-table">
    <thead>
        <th>Id</th>
        <th>Ano</th>
        <th>Trimestre</th>
        <th>Grados</th>
        <th>Activo</th>
        <th colspan="3">@lang('main.action')</th>
    </thead>
    <tbody>
    @foreach($trimestres as $trimestre)
        <tr>
            <td>{!! $trimestre->id !!}</td>
            <td>{!! $trimestre->ano !!}</td>
            <td>{!! $trimestre->trimestre !!}</td>
            <td>
                <ul>
                @foreach ($trimestre->grados as $grado)
                    <li>Grado: {{ $grado->nombre }}
                    <ul>
                    @foreach($grado->seccion as $seccion)
                    <li>Seecion: {{$seccion->nombre}}
                        <ul>
                        @foreach($seccion->estudiante as $estudiante)
                            <li>Alummno: {{$estudiante->nombre}}</li>
                        @endforeach
                        </ul>

                    </li>
                    
                     @endforeach
                    </ul>

                    </li>
                @endforeach
                </ul>
                
                
            </td>
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