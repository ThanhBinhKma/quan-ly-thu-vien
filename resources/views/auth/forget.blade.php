@extends('auth.master')

@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{asset('images/img-01.png')}}" alt="IMG">
                </div>

                <form class="login100-form validate-form" action="{{ route('user.postForget') }}" method="POST">
                    @csrf
                    <span class="login100-form-title">
						Member Forget
					</span>
                    @if(session('forget'))
                        <p class="text-success"> Please Check Mail!</p>
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


                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Send
                        </button>
                    </div>

                    <div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
                        <a class="txt2" href="{{ route('password.request') }}">
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
