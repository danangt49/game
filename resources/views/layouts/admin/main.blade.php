<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="{{ url('public/vendor/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ url('public/vendor/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
        <!-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css') }}"> -->
        <link href="{{ asset('vendor/datatables/datatables.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('vendor/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ url('public/vendor/easyui/themes/material/easyui.css') }}"  >
		<link rel="stylesheet" href="{{ url('public/vendor/easyui/themes/icon.css') }}">
        <link rel="stylesheet" href="{{ url('public/vendor/adminlte/dist/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{ url('public/css/admin_custom.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body>
        
            @yield('content')
        

        <script src="{{ url('public/vendor/jquery.min.js')}}"></script>
        <script src="{{ url('public/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ url('public/vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
        <!-- <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->
        <!-- <script src="//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> -->
        <script src="{{ asset('public/vendor/datatables/datatables.min.js') }}" type="text/javascript" ></script>
        <script src="{{ asset('public/vendor/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript" ></script>
        <script src="{{ url('public/vendor/easyui/jquery.easyui.min.js') }}"></script>
        <script src="{{ url('public/vendor/adminlte/dist/js/adminlte.min.js')}}"></script>

    </body>
</html>