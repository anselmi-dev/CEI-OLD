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
                   {!! Form::model($estudiante, ['route' => ['estudiantes.update', $estudiante->id], 'method' => 'patch']) !!}
                    
                 
                       
                        <!-- Activo Field -->
                        {!! Form::select('seccion', $secciones, ['multiple']) !!}

                        @include('estudiantes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection