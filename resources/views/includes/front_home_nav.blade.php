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
    @isset($activeDataGather)
        <li class="nav-item">
            <a class="nav-link" href="{{route('patient.datagather.create')}}">Fill In Data</a>
        </li>
    @endisset
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
                <a class="dropdown-item" href="{{ route('editProfile') }}">{{__('Profile')}}</a>
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
            <option value="en" {{ \Session::get('language') == 'en' ? 'selected' : '' }}>{{__('English')}}</option>
            <option value="hu" {{ \Session::get('language') == 'hu' ? 'selected' : '' }}>{{__('Hungarian')}}</option>
        </select>
    </div>
</ul>


