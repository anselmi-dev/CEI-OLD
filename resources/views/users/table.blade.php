<div class="table-responsive">
    <table class="table" id="trimestres-table">
        <thead>
            <th>Id</th>
            <th>nombre</th>
            <th>correo</th>
            <th>contraseña</th>
            <th>creado</th>
            <th>rol</th>
            <th colspan="3">@lang('main.action')</th>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
            	<td>{!! $user->id !!}</td>
            	<td>{!! $user->name !!}</td>
            	<td>{!! $user->email !!}</td>
            	<td>{!! $user->password !!}</td>
                <td>{!! $user->created_at !!}</td>
            	<td>{!! $user->role !!}</td>
                <td>
                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('users.show', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'Enviar', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<h1 id="ajax">AJAX</h1>