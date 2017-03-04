@inject('menu','App\Services\menuController')
<li class="{{ Request::is('trimestres*') ? 'active' : '' }}">
    <a href="{{ url('/') }}"><i class="fa fa-edit"></i><span>@lang('main.home')</span></a>
</li>

<li class="{{ Request::is('trimestres*') ? 'active' : '' }}">
    <a href="{!! route('trimestres.index') !!}"><i class="fa fa-edit"></i><span>@lang('main.trimestres')</span>
     <span class="pull-right-container">
      <small class="label pull-right bg-blue">{{$menu->Trimestres()['count']}}</small>
    </span>
    </a>
</li>

<li class="{{ Request::is('docentes*') ? 'active' : '' }}">
    <a href="{!! route('docentes.index') !!}"><i class="fa fa-edit"></i><span>@lang('main.docentes')</span>
     <span class="pull-right-container">
      <small class="label pull-right bg-blue">{{$menu->Docentes()['count']}}</small>
    </span>
    </a>
</li>

<li class="{{ Request::is('estudiantes*') ? 'active' : '' }}">
    <a href="{!! route('estudiantes.index') !!}"><i class="fa fa-edit"></i><span>@lang('main.estudiantes')</span>
	   <span class="pull-right-container">
      <small class="label pull-right bg-blue">{{$menu->Estudiantes()['NoActive']}}</small>
      <small class="label pull-right bg-red">{{$menu->Estudiantes()['count']}}</small>
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
    <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
    <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Important</span></a></li>
    <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
  </ul>
</li>
<li class="{{ Request::is('grados*') ? 'active' : '' }}">
    <a href="{!! route('grados.index') !!}"><i class="fa fa-edit"></i><span>@lang('main.grados')</span>
     <span class="pull-right-container">
		  <small class="label pull-right bg-green">{{$menu->secciones()['count']}}</small>
      <small class="label pull-right bg-blue">{{$menu->Grados()['count']}}</small>
    </span>
    </a>
</li>

<li class="header">LABELS</li>
<li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
<li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
<li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
