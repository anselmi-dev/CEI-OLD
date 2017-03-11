<table class="table table-responsive" id="trimestres-table">
    <thead>
        <th>Año Escolar</th>
        <th>Trimestres</th>
    </thead>
    <tbody>
        @inject('años','App\Services\anosController')
        <!-- Grado Id Field -->
        @foreach ($años->Anos() as $año)
        <tr>
                <td>{!! $año->ano !!}</td>
                <td>
                    <ul>
                        @foreach($año->trimestres as $trimestre)
                            <li>{!! $trimestre->trimestre !!}
                                {!! Form::open(['route' => ['trimestres.destroy', $trimestre->id], 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    <a href="{!! route('trimestres.show', [$trimestre->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                    <a href="{!! route('trimestres.edit', [$trimestre->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                </div>
                                {!! Form::close() !!}
                            </li>
                        @endforeach
                    </ul>
                </td>
                <td>
                </td>
        </tr>
        @endforeach
    </tbody>
</table>