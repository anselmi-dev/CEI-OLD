<table class="dtable display table" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Sexo</th>
            <th>Fecha de nacimiento</th>
            <th>Edad</th> 
            <th>Boleta</th> 
            <th>Seccion</th> 
            <th class="pull-right">@lang('main.action')</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Sexo</th>
            <th>Fecha de nacimiento</th> 
            <th>Edad</th> 
            <th>Boleta</th>
            <th>seccion</th>
            <th class="pull-right">@lang('main.action')</th>
        </tr>
    </tfoot>
    <tbody>
        @foreach($estudiantes as $estudiante)
            <tr>
                <td>
                    <a href="{!! route('estudiantes.show', [$estudiante->id]) !!}">
                       {{$estudiante->id}}
                    </a>
                </td>
                <td>
                    <a href="{!! route('estudiantes.show', [$estudiante->id]) !!}">
                       {{$estudiante->nombre}}
                       {!! $estudiante->apellido !!}
                    </a>
                </td>
                <td>{!! $estudiante->email !!}</td>
                <td>{!! $estudiante->sexo !!}</td>
                <td>{!! $estudiante->fechaNacimiento !!}</td>
                <td>{!! $estudiante->edad !!}</td>
                <td>{!! $estudiante->seccion !!}</td>
                <td  class="pull-right">
                    {!! Form::open(['route' => ['estudiantes.destroy', $estudiante->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('estudiantes.show', [$estudiante->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('estudiantes.edit', [$estudiante->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'Enviar', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
