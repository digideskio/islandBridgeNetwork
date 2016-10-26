<!DOCTYPE html>
<html>
<head>
    <script src="{{asset('asset/js/jquery-2.2.4.min.js')}}"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="{{asset('asset/js/bootstrap.js')}}"></script>
    <link href="{{asset('asset/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset/css/bootstrap-theme.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset/css/normalize.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('asset/css/global.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link href="{{asset('asset/css/dataTables.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('asset/js/dataTables.js')}}"></script>
    @yield('css')
</head>
<body>

<div class="container">
    @yield('content')
</div>
<br/>
<br/>
</body>
@yield('js')
</html>