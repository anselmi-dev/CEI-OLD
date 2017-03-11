<div class="table-responsive">
@inject('menu','App\Services\menuController')

    <table class="table" id="trimestres-table">
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
                            <li> {{$grado->nombre}} 
                                <ul>
                                    @foreach ($grado->seccion as $seccion)
                                        <li>  {{ $seccion->nombre }} 
                                            @foreach ( $menu->eje($seccion->id,$trimestre->id) as $estudiantes)
                                                <ul>
                                                    <li> {{ $estudiantes->estudiante->nombre }}</li>
                                                </ul>
                                            @endforeach
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    @if ($trimestre->activo)
                        <i class="glyphicon glyphicon-ok"></i>
                    @else
                        <i class="glyphicon glyphicon-remove"></i>
                    @endif
                </td>
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
</div>