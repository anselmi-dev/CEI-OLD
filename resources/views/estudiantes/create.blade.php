@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('main.estudiante')
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">

                    {!! Form::open(['route' => 'estudiantes.store']) !!}
                    
                        
                        @foreach ($secciones as $seccion)
                        <!-- Activo Field -->
                        <div class="form-group col-sm-3">
                            <label class="checkbox-inline">
                            {!! Form::radio('seccion', $seccion->id) !!}
                            </label>
                            {!! Form::label('activo', $seccion->nombre) !!}
                        </div>
                        @endforeach
                    @include('estudiantes.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
