@extends('extends.template')

@section('screen')
<div class="container-fluid bg-primary">
    <div class="row justify-content-center">
        <div class="col-md-7 bg-primary">
            <div class="vh-100 p-3 d-flex align-items-center justify-content-center flex-column">
                <div class="container mb-4 text-white">
                    <div class="display-2 ">
                        Signing Up
                    </div>
                    <p>Finish this up and getting close to bunch of cool features of <strong>Neuro Gustione</strong></p>
                </div>
                <div class="container mx-5">
                        <form method="POST" id="register" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="first_name" class="col-form-label text-white">{{ __('First Name') }}</label>
    
                                        <input id="first_name" type="first_name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autofocus>
    
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="last_name" class="col-form-label text-white">{{ __('Last Name') }}</label>
    
                                        <input id="last_name" type="last_name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required >
    
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                            <div class="form-group">
                                                <label for="username" class="col-form-label text-white">{{ __('Username') }}</label>
                
                                                    <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required>
                
                                                    @error('username')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                            </div>
                        <div class="col-6">

                            <div class="form-group">
                                <label for="email" class="col-form-label text-white">{{ __('E-Mail Address') }}</label>
    
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
    
                            <div class="form-group">
                                <label for="password" class="col-form-label text-white">{{ __('Password') }}</label>
    
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
    
                            <div class="form-group">
                                <label for="password-confirm" class="col-form-label text-white">{{ __('Confirm Password') }}</label>
    
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4 text-right">
                                    <button type="submit" class="btn bg-white">
                                        {{ __('Sign Up') }}
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                        </form>
                        
                        <div class="text-white">
                            <a href="{{route('login')}}" class="text-white text-underline">Already have an account?</a>
                        </div>
            </div></div>
        </div>
        <div class="col-md-5 bg-signup v-100">
        </div>
    </div>
</div>
@endsection
