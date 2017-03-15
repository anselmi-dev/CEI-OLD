@extends('layouts.app')
@section('content')
@inject('menu','App\Services\menuController')
    <section class="content-header">
        <h1 class="pull-left"><i class="fa fa-graduation-cap" aria-hidden="true"></i> @lang('main.estudiantes') </h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('estudiantes.create',['seccion_id' => $request->seccion_id,
                  'trimestre_id' => $request->trimestre_id,'ano_id' => $request->ano_id]) !!}">@lang('main.addNew')</a>
        </h1>
    </section>
    {{$estudiantes}}
    <div class="content">
        <div class="clearfix"></div>
        
        @include('flash::message')
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                {!! Form::model($request->all(),['route' => 'estudiantes.filter','method' => 'GET','class' => 'navbar-form nav-bar left']) !!}
                    <!-- Apellido Field -->
                    <div class="row">
                        <div class="form-group col-sm-4">
                            {!! Form::select('ano_id',$menu->Anos()->pluck('ano','id')->prepend('Año escolar', '')->toArray(), null,  ['class' => 'form-control selectpicker']) !!}
                        </div>
                            
                        <div class="form-group col-sm-4">
                            @include('recursos.input.secciones')
                        </div>  
                          
                        <div class="form-group col-sm-4">
                            {!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
                        </div>  
                    </div>
                {!! Form::close() !!}
                @include('estudiantes.table')
            </div>
        </div>
    </div>
@endsection

