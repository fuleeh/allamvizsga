<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{__('Home')}}</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/blog-home.css')}}" rel="stylesheet">
    <link href="{{asset('css/styles.css')}}" rel="stylesheet">

</head>

<body>


<main class="py-4">
    @yield('login')
    @yield('register')
</main>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        {{--        <a class="navbar-brand" href="#">Home</a>--}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">{{__('Home')}}</a>
                </li>
                {{--    <li class="nav-item">--}}
                {{--        <a class="nav-link" href="#">About</a>--}}
                {{--    </li>--}}
                <li class="nav-item">
                    <a class="nav-link" href="#">{{__('Contact')}}</a>
                </li>
                @role('admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.invite.index')}}">{{__('Invite Doctor')}}</a>
                </li>
                @endrole
                @role('doctor')
                <li class="nav-item">
                    <a class="nav-link" href="/doctor">{{__('Doctor Dashboard')}}</a>
                </li>
                @endrole
                @role('patient')
                @if($activeDataGather)
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('patient.datagather.create')}}">{{__('Fill In Data')}}</a>
                    </li>
                @endif
                @endrole
            </ul>

            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <span class="caret">{{__('Menu')}}</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @role('patient')
                            <a class="dropdown-item" href="{{ route('profile') }}">{{__('Profile')}}</a>
                            @endrole
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                <div>
                    <select class="form-select" name="language" style="width: 100%;">
                        <option
                            value="en" {{ \Session::get('language') == 'en' ? 'selected' : '' }}>{{__('English')}}</option>
                        <option
                            value="hu" {{ \Session::get('language') == 'hu' ? 'selected' : '' }}>{{__('Hungarian')}}</option>
                    </select>
                </div>
            </ul>


        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            @yield('content')

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            @yield('side-widget')

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->


<!-- Bootstrap core JavaScript -->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('select[name=language]').change(function () {
            let lang = $(this).val();
            window.location.href = "{{ route('changeLanguage') }}?language=" + lang;
        });
    });
</script>
@stack('script')
</body>
<!-- Footer -->
<footer class="page-footer py-2 bg-dark">
@include('includes.front_footer')
<!-- /.container -->
</footer>

</html>
