@inject('anos','App\Services\anosController')
@inject('menu','App\Services\menuController')
@if($anos->ExisteAno())
  <li class="header text-aqua">AÑO ESCOLAR <b>{{ $anos->AnoActualModel()->ano}}</b></li></li>
  @foreach ($anos->AnoActualModel()->trimestres as $trimestre)
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
                @foreach ($grado->seccions as $seccion)
                  <li><a href="{!! route('estudiantes.filter', ['ano_id' => $anos->AnoActual(),
                  'trimestre_id' => $trimestre,'seccion_id' => $seccion]) !!}"><i class="fa fa-circle-o text-yellow"></i><span>{{$seccion->nombre}}</span></a></li>
                @endforeach
              </ul>
            
            </li>
        @endforeach
      </ul>
    </li>
  @endforeach
@endif

<li class="{{ Request::is('anos*') ? 'active' : '' }}"> 
    <a href="{!! route('anos.index') !!}"><i class="fa fa-calendar {{ Request::is('anos*') ? 'text-yellow' : '' }}" aria-hidden="true"></i><span>Años Escolares</span><span class="pull-right-container">
      <small class="label pull-right bg-blue">{{$menu->countAños()['count']}}</small>
    </span>
    </a>
</li>

<li class="{{ Request::is('grados*') ? 'active' : '' }}">
    <a href="{!! route('grados.index') !!}"><i class="fa fa-glide {{ Request::is('grados*') ? 'text-yellow' : '' }}" aria-hidden="true"></i><span>Grados</span><span class="pull-right-container">
      <small class="label pull-right bg-blue">{{$menu->countGrados()['count']}}</small>
    </span>
    </a>
</li>

<li class="{{ Request::is('docentes*') ? 'active' : '' }}">
    <a href="{!! route('docentes.index') !!}"><i class="fa fa-users {{ Request::is('docentes*') ? 'text-yellow' : '' }}" aria-hidden="true"></i><span>Docentes</span>
     <span class="pull-right-container">
      <small class="label pull-right bg-blue">{{$menu->countDocentes()['count']}}</small>
    </span>
    </a>
</li>

<li class="{{ Request::is('estudiantes*') ? 'active' : '' }}">
    <a href="{!! route('estudiantes.index') !!}"><i class="fa fa-graduation-cap {{ Request::is('estudiantes*') ? 'text-yellow' : '' }}" aria-hidden="true"></i><span>Estudiantes</span><span class="pull-right-container">
      <small class="label pull-right bg-blue">{{$menu->countEstudiantes()['count']}}</small>
    </span>
    </a>
</li>