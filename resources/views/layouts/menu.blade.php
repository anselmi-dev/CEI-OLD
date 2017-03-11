@inject('menu','App\Services\menuController')
<li class="{{ Request::is('anos*') ? 'active' : '' }}">
    <a href="{!! route('anos.index') !!}"><i class="fa fa-edit"></i><span>anos</span>     <span class="pull-right-container">
      <small class="label pull-right bg-blue">{{$menu->countAños()['count']}}</small>
    </span>
    </a>
</li>

<li class="{{ Request::is('grados*') ? 'active' : '' }}">
    <a href="{!! route('grados.index') !!}"><i class="fa fa-edit"></i><span>grados</span>     <span class="pull-right-container">
      <small class="label pull-right bg-blue">{{$menu->countGrados()['count']}}</small>
    </span>
    </a>
</li>

<li class="{{ Request::is('docentes*') ? 'active' : '' }}">
    <a href="{!! route('docentes.index') !!}"><i class="fa fa-edit"></i><span>docentes</span>
     <span class="pull-right-container">
      <small class="label pull-right bg-blue">{{$menu->countDocentes()['count']}}</small>
    </span>
    </a>
</li>


<li class="{{ Request::is('trimestres*') ? 'active' : '' }}">
    <a href="{!! route('trimestres.index') !!}"><i class="fa fa-edit"></i><span>trimestres</span>     <span class="pull-right-container">
      <small class="label pull-right bg-blue">{{$menu->countTrimestres()['count']}}</small>
    </span>
    </a>
</li>

<li class="{{ Request::is('boletas*') ? 'active' : '' }}">
    <a href="{!! route('boletas.index') !!}"><i class="fa fa-edit"></i><span>boletas</span>     <span class="pull-right-container">
      <small class="label pull-right bg-blue">{{$menu->countBoletas()['count']}}</small>
    </span>
    </a>
</li>

<li class="{{ Request::is('seccions*') ? 'active' : '' }}">
    <a href="{!! route('seccions.index') !!}"><i class="fa fa-edit"></i><span>seccions</span>     <span class="pull-right-container">
      <small class="label pull-right bg-blue">{{$menu->countSecciones()['count']}}</small>
    </span>
    </a>
</li>

<li class="{{ Request::is('estudiantes*') ? 'active' : '' }}">
    <a href="{!! route('estudiantes.index') !!}"><i class="fa fa-edit"></i><span>estudiante</span>     <span class="pull-right-container">
      <small class="label pull-right bg-blue">{{$menu->countEstudiantes()['count']}}</small>
    </span>
    </a>
</li>
