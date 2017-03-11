@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Ano
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($ano, ['route' => ['anos.update', $ano->id], 'method' => 'patch']) !!}

                        @include('anos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection