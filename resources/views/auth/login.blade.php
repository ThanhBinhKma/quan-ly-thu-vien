@extends('auth.master')

@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="images/img-01.png" alt="IMG">
                </div>

                <form class="login100-form validate-form" action="{{ route('user.login') }}" method="POST">
                    @csrf
					<span class="login100-form-title">
						Member Login
					</span>
                    @if(session('create'))
                    <p class="text-success">Register Succuess . Please Check Mail!</p>
                    @endif
                    @if(session('change_password'))
                    <p class="text-success">Change Password Success!</p>
                    @endif
                    @if(session('confirm'))
                    <p class="text-success">Confirm Mail Success . Please Login !</p>
                    @endif
                    @if(session('not_confirm'))
                    <p class="text-danger">Please Confirm Mail !</p>
                    @endif
                    <div class="wrap-input100 ">
                        <input class="input100" type="text" name="email" placeholder="Email" value="{{ old('email') }}" >
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                        @error('email')
                        <span class="invalid-feedback show-error-validate" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="wrap-input100">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                        @error('password')
                            <span class="invalid-feedback show-error-validate" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                

                    @if(session('status'))
                        <p class="text-danger">Email or password is incorrect</p>
                    @endif
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
                        <a class="txt2" href="{{ route('user.forget') }}">
                            Username / Password?
                        </a>
                    </div>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="{{route('register')}}">
                            Create your Account
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
