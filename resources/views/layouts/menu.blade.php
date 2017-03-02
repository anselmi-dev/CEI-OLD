<li class="{{ Request::is('trimestres*') ? 'active' : '' }}">
    <a href="{{ url('/home') }}"><i class="fa fa-edit"></i><span>@lang('main.home')</span></a>
</li>

<li class="{{ Request::is('trimestres*') ? 'active' : '' }}">
    <a href="{!! route('trimestres.index') !!}"><i class="fa fa-edit"></i><span>@lang('main.trimestres')</span></a>
</li>

<li class="{{ Request::is('docentes*') ? 'active' : '' }}">
    <a href="{!! route('docentes.index') !!}"><i class="fa fa-edit"></i><span>@lang('main.docentes')</span></a>
</li>

<li class="{{ Request::is('estudiantes*') ? 'active' : '' }}">
    <a href="{!! route('estudiantes.index') !!}"><i class="fa fa-edit"></i><span>@lang('main.estudiantes')</span>
	    <span class="pull-right-container">
		  <small class="label pull-right bg-red">3</small>
		  <small class="label pull-right bg-blue">17</small>
		</span>
	</a>
</li>

<li class="treeview">
  <a href="#">
    <i class="fa fa-pie-chart"></i>
    <span>links</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu" style="display: none;">
    <li><a href="#"><i class="fa fa-circle-o"></i> link</a></li>
    <li><a href="#"><i class="fa fa-circle-o"></i> link</a></li>
    <li><a href="#"><i class="fa fa-circle-o"></i> link</a></li>
  </ul>
</li>
<li class="{{ Request::is('grados*') ? 'active' : '' }}">
    <a href="{!! route('grados.index') !!}"><i class="fa fa-edit"></i><span>@lang('main.grados')</span></a>
</li>

<li class="header">LABELS</li>
<li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
<li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
<li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>