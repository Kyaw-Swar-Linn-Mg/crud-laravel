<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="{{asset('bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('jquery-datatable/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">
</head>
<body>
@include('partial/nav_bar')
@yield('body')

<script src="{{asset('bootstrap/js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
<script src="{{asset('jquery-datatable/js/jquery.dataTables.min.js')}}"></script>

<script>
    $(document).ready(function () {
       $("#jTable").dataTable();
    });
</script>
</body>
</html>