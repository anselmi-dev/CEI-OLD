<table class="table table-responsive" id="sections-table">
    <thead>
        <th>Name</th>
        <th>Quantity</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($sections as $sections)
        <tr>
            <td>{!! $sections->name !!}</td>
            <td>{!! $sections->quantity !!}</td>
            <td>
                {!! Form::open(['route' => ['sections.destroy', $sections->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('sections.show', [$sections->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('sections.edit', [$sections->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>