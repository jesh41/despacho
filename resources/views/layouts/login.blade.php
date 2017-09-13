<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="{{asset('img/logo.png') }}"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>@yield('pageTitle') - Despacho</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />

    <!--  Material Dashboard CSS  -->
    <link href="{{ asset('css/material-dashboard.css') }}" rel="stylesheet">

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>body{
            background-color:#efefef;
        }
    </style>
</head>
<body>
<header>
    <div class="col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4 col-xs-12"> <!--DIV DE CENTRADO-->
        <a href="{{ route('login') }}">
            <img class="img-responsive center-block" style="width: 35%; height: 35%" src="{{asset('img/logo.png') }}" alt="">
        </a>
    </div><!--CIERRE DE DIV DE CENTRADO-->
</header>

@yield('content')

<footer>
    <div col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4 col-xs-12> <!--DIV DE CENTRADO-->
        <h6 class="text-center">Powered by IT Alvia Comercial &copy 2017.</h6>
        <h6 class="text-center">All rights reserved.</h6>
    </div><!--CIERRE DE DIV DE CENTRADO-->
</footer>
</body>

<!--   Core JS Files   -->
<script src="{{asset('js/jquery-3.1.0.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/material.min.js')}}" type="text/javascript"></script>


<!--  Notifications Plugin    -->
<script src="{{asset('js/bootstrap-notify.js')}}"></script>

<!-- Material Dashboard javascript methods -->
<script src="{{asset('js/material-dashboard.js')}}"></script>
</html>
