@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('main.estudiante')
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    <div class="col-sm-6">
                        
                    @include('estudiantes.show_fields')
                    <a href="{!! route('estudiantes.index') !!}" class="btn btn-default">@lang('main.back')</a>
                    </div>
                    <div class="col-sm-6">
                        <ul class="mailbox-attachments clearfix">
                            <li>
                              <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>

                              <div class="mailbox-attachment-info">
                                <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> Sep2014-report.pdf</a>
                                    <span class="mailbox-attachment-size">
                                      1,245 KB
                                      <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                                    </span>
                              </div>
                            </li>
                            <li>
                              <span class="mailbox-attachment-icon"><i class="fa fa-file-word-o"></i></span>

                              <div class="mailbox-attachment-info">
                                <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> App Description.docx</a>
                                    <span class="mailbox-attachment-size">
                                      1,245 KB
                                      <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                                    </span>
                              </div>
                            </li>
                         </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
