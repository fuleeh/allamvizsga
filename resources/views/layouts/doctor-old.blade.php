<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Doctor</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    <link href="{{asset('css/libs.css')}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


    @yield('styles')
</head>

<body id="doctor-page">

<div id="wrapper">
    @role('doctor')
    @include('includes.doctor_navbar')
    @include('sweetalert::alert')

    {{--    <div class="navbar-default sidebar" role="navigation">--}}
    {{--        <div class="sidebar-nav navbar-collapse">--}}
    {{--            <ul class="nav" id="side-menu">--}}
    {{--                <li>--}}
    {{--                    <a href="/profile"><i class="fa fa-dashboard fa-fw"></i>Profil</a>--}}
    {{--                </li>--}}

    {{--            </ul>--}}

    {{--        </div>--}}

    {{--    </div>--}}
    @endrole
</div>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"></h1>

                @yield('content')
            </div>
        </div>
    </div>
</div>


<script src="{{asset('js/libs.js')}}"></script>

@yield('scripts')

</body>

</html>
