@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('main.trimestre')
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('trimestres.show_fields')
                    <a href="{!! route('trimestres.index') !!}" class="btn btn-default">@lang('main.back')</a>
                </div>
            </div>
        </div>
    </div>
@endsection