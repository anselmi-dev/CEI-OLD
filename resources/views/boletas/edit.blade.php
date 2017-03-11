@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Boleta
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($boleta, ['route' => ['boletas.update', $boleta->id], 'method' => 'patch']) !!}

                        @include('boletas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection