@inject('menu','App\Services\menuController')
<li class="{{ Request::is('/*') ? 'active' : '' }}">
    <a href="{{ url('/') }}"><i class="fa fa-home" aria-hidden="true"></i><span>@lang('main.home')</span></a>
</li>

<li class="{{ Request::is('trimestres*') ? 'active' : '' }}">
    <a href="{!! route('trimestres.index') !!}"><i class="fa fa-folder-open-o" aria-hidden="true"></i><span>@lang('main.trimestres')</span>
     <span class="pull-right-container">
      <small class="label pull-right bg-blue">{{$menu->countTrimestres()['count']}}</small>
    </span>
    </a>
</li>

<li class="{{ Request::is('docentes*') ? 'active' : '' }}">
    <a href="{!! route('docentes.index') !!}"><i class="fa fa-graduation-cap" aria-hidden="true"></i></i><span>@lang('main.docentes')</span>
     <span class="pull-right-container">
      <small class="label pull-right bg-blue">{{$menu->countDocentes()['count']}}</small>
    </span>
    </a>
</li>

<li class="{{ Request::is('estudiantes*') ? 'active' : '' }}">
    <a href="{!! route('estudiantes.index') !!}"><i class="fa fa-users" aria-hidden="true"></i><span>@lang('main.estudiantes')</span>
	   <span class="pull-right-container">
      <small class="label pull-right bg-blue">{{$menu->countEstudiantes()['NoActive']}}</small>
      <small class="label pull-right bg-red">{{$menu->countEstudiantes()['count']}}</small>
    </span>
  </a>
</li>

<li class="{{ Request::is('grados*') ? 'active' : '' }}">
    <a href="{!! route('grados.index') !!}"><i class="fa fa-graduation-cap" aria-hidden="true"></i><span>@lang('main.grados')</span>
     <span class="pull-right-container">
      <small class="label pull-right bg-green">{{$menu->countsecciones()['count']}}</small>
      <small class="label pull-right bg-blue">{{$menu->countGrados()['count']}}</small>
    </span>
    </a>
</li>

<li class="header text-aqua">AÑO ESCOLAR <b >{{ $menu->TrimestresActual()->ano }}</b></li>
@foreach ($menu->Trimestres() as $trimestre)
  <li class="treeview">
    <a href="#">
      <i class="fa fa-calendar-plus-o text-aqua" aria-hidden="true"></i>
      <span>{{$trimestre->trimestre}}</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right text-aqua"></i>
      </span>
    </a>
    <ul class="treeview-menu" style="display: none;">
      @foreach ($trimestre->grados as $grado)
          <li class="treeview">
            <a href="#">
              <i class="fa fa-map-o text-yellow" aria-hidden="true"></i>
              <span>{{$grado->nombre}}</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right text-yellow"></i>
              </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
              @foreach ($grado->seccion as $seccion)
                <li><a href="{!! route('nuevoid', [$seccion->id]) !!}"><i class="fa fa-circle-o text-red"></i><span>{{$seccion->nombre}}</span></a></li>
              @endforeach
            </ul>
          </li>
      @endforeach
    </ul>
  </li>
@endforeach
<li class="{{ Request::is('boletas*') ? 'active' : '' }}">
    <a href="{!! route('boletas.create') !!}"><i class="fa fa-map-o" aria-hidden="true"></i><span>@lang('main.boletas')</span>
    </a>
</li>

<li class="header">LABELS</li>
<li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>APP</span></a></li>
<li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Informacion</span></a></li>
<li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Ayuda</span></a></li>
