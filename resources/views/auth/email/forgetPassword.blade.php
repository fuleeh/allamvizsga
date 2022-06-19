<h1>{{__('Forget Password Email')}}</h1>

{{__('You can reset password from bellow link:')}}
<a href="{{ route('reset.password.get', $token) }}">{{__('Reset Password')}}</a>
