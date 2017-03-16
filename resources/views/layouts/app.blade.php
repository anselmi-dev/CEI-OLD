<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CEI</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datepicker/datepicker3.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('js/plugins/dataTables/dataTables.bootstrap.css') }}"/>
    
    <link rel="stylesheet" type="text/css" href="{{ asset('js/plugins/fileinput/fileinput.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('js/plugins/bootstrap-select/bootstrap-select.min.css') }}"/>
    @yield('css')
</head>

<body class="skin-blue sidebar-mini">
@if (!Auth::guest())
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="{{ url('/') }}" class="logo" style="padding: 0px">
                <b>CEI</b>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="{{ asset('img/default_avatar.jpg') }}"
                                     class="user-image" alt="User Image"/>
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">{!! Auth::user()->name !!}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="{{ asset('img/default_avatar.jpg') }}"
                                         class="img-circle" alt="User Image"/>
                                    <p>
                                        {!! Auth::user()->name !!}
                                        <small>@lang('main.memberSince') {!! Auth::user()->created_at->format('M. Y') !!}</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">@lang('main.profile')</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{!! url('/logout') !!}" class="btn btn-default btn-flat"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            @lang('main.signOut')
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- Main Footer -->
        <footer class="main-footer" style="max-height: 100px;text-align: center">
            <strong>Copyright © 2016-2017 <a href="#">Carlos Anselmi, Oscar Peres & Antoni Ruth</a>.</strong> All rights reserved.
        </footer>

    </div>
@else
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
@endif

    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/icheck.min.js') }}"></script>
 
    <script type="text/javascript" src="{{ asset('js/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/dataTables/dataTables.min.js') }}"></script>


    <script type="text/javascript" src="{{ asset('js/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/fileinput/fileinput.min.js') }}"></script>

    {!! Html::script('js/plugins/dataTables/dataTables.bootstrap.min.js'); !!}

    <!-- AdminLTE App -->
    <script src="{{ asset('js/app.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.dtable').DataTable({
              "paging": false,
              "lengthChange": false,
              "searching": true,
              "ordering": true,
              "info": true,
                "scrollY": "500px",
                "scrollCollapse": true,
              "autoWidth": false
            });
            $('.datepicker').datepicker();
            $("#box-widget").activateBox();

            $('#url').fileinput({
                language: 'es',
                uploadUrl: "{{ route('boletas.store') }}",
                showUpload: false,
                maxFileSize: 10000,
                maxFilesNum: 1,
                fileType: "any",
                actionUpload: '<button type="button" class="kv-file-upload {uploadClass}" title="adadad">adad</button>\n'
            });

        });
        $("#ajax").click(function(){
            var data =$('form').serializeArray();
            console.log(data);
            $.ajax({
                url: "",
                type: "POST",
                data: {data},
                success: function(data){
                    console.log(data);
                }
            });
        });
        $('#seccions').select2({
            tags: true
        });
    </script>

    @yield('scripts')
</body>
</html>