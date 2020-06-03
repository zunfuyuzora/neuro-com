@extends('extends.template')

@section('screen')
<div class="container-fluid bg-primary">
    <div class="row justify-content-center">
        <div class="col-md-4 bg-primary">
            <div class="vh-100 p-3 d-flex align-items-center justify-content-center flex-column">
                <div class="container mb-4 text-white">
                    <div class="display-2 ">
                        Neuro Gustione
                    </div>
                    <p>Get in touch with your team.</p>
                </div>
                <div class="container mx-5">
                        <form method="POST" action="{{ route('authorize') }}">
                            @csrf

                            <div class="form-group">
                                <label for="username" class="col-form-label text-white">{{ __('E-Mail Address or Username') }}</label>

                                    <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-form-label text-white">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <div class="form-group">
                                <div class="text-left text-white">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4 text-right">
                                    <button type="submit" class="btn bg-white">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
            </div></div>
        </div>
        <div class="col-md-8 bg-white v-100">
        </div>
    </div>
</div>
@endsection
