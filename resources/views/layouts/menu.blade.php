













<li class="{{ Request::is('trimestres*') ? 'active' : '' }}">
    <a href="{!! route('trimestres.index') !!}"><i class="fa fa-edit"></i><span>@lang('main.trimestres')</span></a>
</li>

<li class="{{ Request::is('docentes*') ? 'active' : '' }}">
    <a href="{!! route('docentes.index') !!}"><i class="fa fa-edit"></i><span>@lang('main.docentes')</span></a>
</li>


<li class="{{ Request::is('estudiantes*') ? 'active' : '' }}">
    <a href="{!! route('estudiantes.index') !!}"><i class="fa fa-edit"></i><span>@lang('main.estudiantes')</span></a>
</li>

<li class="{{ Request::is('grados*') ? 'active' : '' }}">
    <a href="{!! route('grados.index') !!}"><i class="fa fa-edit"></i><span>@lang('main.grados')</span></a>
</li>


