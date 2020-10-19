@extends('auth.master')

@section('content')

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="images/img-01.png" alt="IMG">
                </div>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form class="login100-form validate-form" method="POST" action="{{ route('password.email') }}">
                    @csrf
					<span class="login100-form-title">
						Member Login
					</span>

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100  @error('email') is-invalid @enderror" type="text" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="wrap-input100 text-center">
                        {!! Captcha::img() !!}
                    </div>
                    <div class="wrap-input100 text-center">
                        <input type="text" class="input100 @error('captcha') is-invalid @enderror" name="captcha">
                        @error('captcha')
                        <span class="invalid-feedback show-error-validate" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                        @enderror
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
