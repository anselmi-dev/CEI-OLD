@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('main.users')
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
            <div class="col-lg-6 col-md-offset-3">
                {!! Form::open(['route' => 'users.store']) !!}

                    @include('users.fields')

                {!! Form::close() !!}
            </div>
            </div>
        </div>
    </div>
@endsection
