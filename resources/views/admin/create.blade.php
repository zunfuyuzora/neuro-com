@extends('extends.admin',['_page'=>'newAdmin'])
@section('main-content')
    
<div class="container d-flex flex-column justify-content-center mb-4">


    <div id="metadata" class="p-4 mb-3 rounded shadow-sm bg-white">
        <div class="container">
            <div class="container">
                <h5 class="font-weight-bold">New Admin</h5>
                <form action="{{route('admin.new.save')}}" method="POST" class="form-group">
                    @csrf
                    <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="first_name" class="col-form-label ">{{ __('First Name') }}</label>

                                <input id="first_name" type="first_name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                @error('first_name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>

                    <div class="col-6">

                        <div class="form-group">
                            <label for="last_name" class="col-form-label ">{{ __('Last Name') }}</label>
    
                                <input id="last_name" type="last_name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required >
    
                                @error('last_name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    
                    <div class="col-6">
                            <div class="form-group">
                                <label for="username" class="col-form-label ">{{ __('Username') }}</label>

                                    <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required>

                                    @error('username')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                    </div>
                
                    <div class="col-6">
                    <div class="form-group">
                        <label for="email" class="col-form-label ">{{ __('E-Mail Address') }}</label>

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required>
                            @error('email')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4 text-right">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Create Admin') }}
                            </button>

                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    @if (Session::has('success'))
    <div class="bg-primary text-center p-4 text-white">
        {{Session::get('success')}}
    </div>
    @endif
    @if (Session::has('error'))
    <div class="bg-danger  text-center">
        {{Session::get('error')}}
    </div>
    @endif
</div>
@endsection