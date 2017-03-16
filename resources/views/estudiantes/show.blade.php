@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Estudiante
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('estudiantes.show_fields')
                    <a href="{!! route('estudiantes.index') !!}" class="btn btn-default col-md-2" style="margin-top: 40px">Atras</a>
                </div>
            </div>
        </div>
    </div>
@endsection
