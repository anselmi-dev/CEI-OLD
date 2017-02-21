<table class="table table-responsive" id="students-table">
    <thead>
        <th>Name</th>
        <th>Lastname</th>
        <th>Borndate</th>
        <th>Age</th>
        <th>Boleta</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($students as $student)
        <tr>
            <td>{!! $student->name !!}</td>
            <td>{!! $student->lastname !!}</td>
            <td>{!! $student->borndate->format('d-m-Y') !!}</td>
            <td>{!! $student->Age !!}</td>
            <td>{!! $student->boleta !!}</td>
            <td>
                {!! Form::open(['route' => ['students.destroy', $student->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('students.show', [$student->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('students.edit', [$student->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>