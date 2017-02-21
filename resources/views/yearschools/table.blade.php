<table class="table table-responsive" id="yearschools-table">
    <thead>
        <th>Year</th>
        <th>Sections</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($yearschools as $yearschool)
        <tr>
            <td>{!! $yearschool->year->format('Y') !!}</td>
            <td>
                @foreach ($sections as $section)
                <p>
                    
                <input type="checkbox" name="ids[]" value="$section->id">
                 {!! $section->name !!}
                 <p>
                 
                 @for ($i = 0; $i < $section->quantity ; $i++)
                   <ul>
                       <li>
                         {!! $section->name !!} {{ $i+1 }}  
                       </li>
                   </ul> 
                 @endfor
                     
                 </p>
                </p>
                @endforeach
            </td>

            <td>
                {!! Form::open(['route' => ['yearschools.destroy', $yearschool->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('yearschools.show', [$yearschool->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('yearschools.edit', [$yearschool->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>