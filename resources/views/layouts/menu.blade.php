<li class="{{ Request::is('yearschools*') ? 'active' : '' }}">
    <a href="{!! route('yearschools.index') !!}"><i class="fa fa-edit"></i><span>yearschools</span></a>
</li>





<li class="{{ Request::is('students*') ? 'active' : '' }}">
    <a href="{!! route('students.index') !!}"><i class="fa fa-edit"></i><span>students</span></a>
</li>

<li class="{{ Request::is('sections*') ? 'active' : '' }}">
    <a href="{!! route('sections.index') !!}"><i class="fa fa-edit"></i><span>sections</span></a>
</li>

