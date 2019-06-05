<head>
    <meta charset="UTF-8">
    <title> Sistema de Registro de Asistencia - @yield('htmlheader_title', '') </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <meta name="author" content="Cristian Fernando Chavez Torres, Cristian Chavez">
  <meta name="description" content="Sistema Web Semáforo Escuela Ugel Carhuaz ">
  <meta name="keywords" content="ugel carhuaz, semáforo escuela, ugel, carhuaz, semáforo, escuela, semáforo escuela ugel carhuaz, semáforo escuela carhuaz, registro de asistencia ugel carhuaz, registro de asistencia, registro, asistencia">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('/css/all.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" /> 
    <link href="{{ asset('/css/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" /> 
    <link href="{{ asset('/css/select2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/datepicker3.css') }}" rel="stylesheet" type="text/css" /> 
    <link href="{{ asset('/css/alertify.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/fileinput.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/iCheck/all.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/prettyPhoto.css') }}" rel="stylesheet" media="screen" type="text/css" charset="utf-8" />
    <link href="{{ asset('css/color/bootstrap-colorpicker.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/estiloadmin.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/spinkit.min.css') }}" rel="stylesheet" type="text/css" />

<link rel="icon" type="image/png" href="{{ asset('/img/icono.png') }}" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
