@extends('layouts.app')

@section('content')
    <section style="background-image: url({{asset('images/banner_bg_login.jpg')}});height: 100vh;">
        <div class="container pt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card" style="margin-top: 100px;background-color: rgba(0,0,0,0.5);border: 2px solid #fff;">
                        <div>
                            <i class="fas fa-search"></i>
                        </div>
                        <div class="card-header text-white" style="font-size: 50px;text-align: center;">{{ __('Login') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group row">
                                    {{--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                                    <div class="col-md-8 offset-2">
                                        <input id="email" placeholder="Username" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    {{--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                                    <div class="col-md-8 offset-2">
                                        <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="form-group row mb-0">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary form-control" style="width: 320px;border-radius: 20px;">
                                            {{ __('Login') }}
                                        </button>
                                        <br>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif


                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
