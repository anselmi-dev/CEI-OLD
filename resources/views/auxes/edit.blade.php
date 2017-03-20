@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Auxes
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($auxes, ['route' => ['auxes.update', $auxes->id], 'method' => 'patch']) !!}

                        @include('auxes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection