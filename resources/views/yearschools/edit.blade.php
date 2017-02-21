@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Yearschool
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($yearschool, ['route' => ['yearschools.update', $yearschool->id], 'method' => 'patch']) !!}

                        @include('yearschools.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection