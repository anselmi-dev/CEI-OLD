<div class="table-responsive">

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
                <?php $i = 0?>
                <div class="panel-group" id="accordion1">
                @foreach ($trimestre->grados as $grado)
                    <?php $i++?>
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h5 class="panel-title">
                            
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#accordion_in_{{$i}}" style="display: block"><i class="fa fa-circle-o text-green"></i> {{ $grado->nombre }}</a>
                        </h5>
                      </div>
                      <div id="accordion_in_{{$i}}" class="panel-collapse collapse">
                        <div class="panel-body">
                            <?php $j = 0?>
                            @foreach($grado->seccion as $seccion)
                                <?php $j++?>
                                <li class="panel chart-legend clearfix"> 
                                    <i class="fa fa-circle-o text-blue"></i><a data-toggle="collapse" data-parent="#accordion2" href="#Link_{{$j}}_{{$i}}">
                                       {{$seccion->nombre}}                                                
                                        <ul id="Link_{{$j}}_{{$i}}" class="collapse chart-legend clearfix" style="padding-left: 10px">
                                            @foreach($seccion->estudiante as $estudiante)
                                                <li><i class="fa fa-circle-o text-red"></i>
                                                    <a href="{!! route('estudiantes.show', [$estudiante->id]) !!}">
                                                        {{$estudiante->nombre}}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </a>
                                </li>
                            @endforeach
                        </div>
                      </div>
                    </div>
                @endforeach
                </div>
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