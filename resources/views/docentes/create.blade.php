@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            <i class="fa fa-user" aria-hidden="true"></i> Docente
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'docentes.store']) !!}

                        @include('docentes.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
