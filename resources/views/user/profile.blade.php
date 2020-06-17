@extends('extends.dashboard',['_pagename'=> 'Profile','_backLink'=>route('home')])

@section('card-content')

    {{-- 
        #####
        ##  WIDE SCREEN - GROUP SELECTION
        #####
        --}}

<div id="group-selection" class="rounded-md-10 d-none d-md-block shadow-sm bg-white">
    <div class="container py-3">
        <ul class="list-group">
            <li class="list-group-item ">
                <a href="#">Private</a>
            </li>
            <li class="list-group-item active">
                <a href="#">Grup #1</a>
            </li>
            <li class="list-group-item">
                <a href="#">Kelompok ABC</a>
            </li>
        </ul>
        <div class="form-group">
        <a href="#" class="my-2 btn btn-primary">
            Buat Grup
        </a></div>
    </div>
</div>
@endsection

@section('main-content')

<div class="container d-flex flex-column justify-content-center mb-4">


    <div id="metadata" class="p-4 mb-3 rounded shadow-sm bg-white">
        <div class="container">
            <div class="container">
                <h5 class="font-weight-bold">Biodata</h5>
                <form action="{{route('updateData', $user->id)}}" method="POST" class="form-group">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-inline mb-4 justify-content-between">
                        <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" class="col-9 form-control" value="{{$user->first_name}}">
                    </div>
                    <div class="form-inline mb-4 justify-content-between">
                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name" class="col-9 form-control" value="{{$user->last_name}}">
                    </div>
                    <div class="form-inline mb-4 justify-content-between">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" class="col-9 form-control" value="{{$user->username}}">
                    </div>
                    <div class="form-inline mb-4 justify-content-between">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" class="col-9 form-control" value="{{$user->email}}">
                    </div>
                    <div class="form-inline mb-4 justify-content-between">
                        <label for="bio">Bio</label>
                        <textarea type="text" id="bio" name="bio" class="col-9 form-control" rows="5">{{$user->bio}}</textarea>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-9 col-md-6">
                        <button type="submit" class="btn btn-primary form-control">Update</button>
                    </div>
                    </div>
                </form>
                @if (Session::has('updateData'))
                <div class="bg-primary text-white text-center">
                    {{Session::get('updateData')}}
                </div>
                @endif
                @if (Session::has('errorUpdateData'))
                <div class="bg-danger text-white text-center">
                    {{Session::get('errorUpdateData')}}
                </div>
                @endif
            </div>
        </div>
    </div>

    <div id="password" class="p-4 mb-3 rounded shadow-sm bg-white">
        <div class="container">
            <div class="container">
                <h5 class="font-weight-bold">Change Password</h5>
                <form action="{{route('changePassword', $user->id)}}" class="form-group" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-inline mb-4 justify-content-between">
                        <label for="password">New Password</label>
                        <input type="password" id="password" name="password" class="col-9 form-control" required>
                    </div>
                    <div class="form-inline mb-4 justify-content-between">
                        <label for="password-confirmation">New Password</label>
                        <input type="password" id="password-confirmation" name="password-confirmation" class="col-9 form-control" required>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-9 col-md-6">
                        <button type="submit" class="btn btn-primary form-control">Change Password</button>
                    </div>
                    </div>
                </form>

                @if (Session::has('updatePassword'))
                <div class="bg-primary text-white text-center">
                    {{Session::get('updatePassword')}}
                </div>
                @endif
                @if (Session::has('errorUpdatePassword'))
                <div class="bg-danger text-white text-center">
                    {{Session::get('errorUpdatePassword')}}
                </div>
                @endif
            </div>
        </div>
    </div>
        {{-- PROFILE PICTURE SECTION --}}
        <div id="profile-picture">
            <div id="settings-container" class="p-4 mb-3 rounded shadow-sm bg-white">

            <div class="container">
                <h5 class="font-weight-bold">Profile Picture</h5>
                <form action="{{route('changeAvatar', $user->id)}}" enctype="multipart/form-data" method="POST" id="uploadAvatar" class="form-group mb-2">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <input type="file" name="avatar" class="file-input-custom w-100" id="avatar">
                    <p style="color:gray">Maximum file upload 2 MB (in JPG/PNG format)</p>
                    <div class="text-right">
                    <button type="submit" class="btn btn-primary" form="uploadAvatar">Change Profile Picture</button>
                    </div>
                </form>
                @if (Session::has('updateAvatar'))
                <div class="bg-primary text-white text-center">
                    {{Session::get('updateAvatar')}}
                </div>
                @endif
                @if (Session::has('errorUpdateAvatar'))
                <div class="bg-danger text-white text-center">
                    {{Session::get('errorUpdateAvatar')}}
                </div>
                @endif

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
            </div>
            </div>

        </div>
</div>

@endsection